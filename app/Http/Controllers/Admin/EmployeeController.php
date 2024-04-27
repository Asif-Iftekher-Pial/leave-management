<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('user')->orderBy('id','desc')->get();
        return view('partials.Admin.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('partials.Admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'age' => 'required|integer',
            'address' => 'required|string',
            'password' => 'required|string|min:6',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules for the photo as needed
        ]);

        DB::beginTransaction();
        try {
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();
    
            $employee = new Employee;
            $employee->age = $request->input('age');
            $employee->address = $request->input('address');
            $employee->photo = $request->file('photo')->store('photos', 'public');
            $employee->user_id = $user->id;
            $employee->save();

            DB::commit();
            return redirect()->route('employee.index')->with('success', 'Employee created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to create employee. Error: '.$e);
        }
        
        
    }

    /**
     * Display the specified resource.
     */
    public function block_user($id,$status)
    {
        $employee = Employee::findOrFail($id);
        $employee->update(['status' => $status]);
        return back()->with('success','User '. $status. ' successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::with('user')->findOrFail($id);
        return view('partials.Admin.employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validate the request data
         $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'address' => 'required|string',
           
        ]);
        DB::beginTransaction();
        try {
        $employee = Employee::with('user')->findOrFail($id);

        $employee->user->name = $request->input('name');
        $employee->age = $request->input('age');
        $employee->address = $request->input('address');

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            
            if ($employee->photo) {
                Storage::disk('public')->delete($employee->photo); 
            }
            // Store the new photo
            $employee->photo = $request->file('photo')->store('photos','public');
        }
        $employee->user->save();
        $employee->save();
        DB::commit();
        return redirect()->route('employee.index')->with('success','Employee updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to create employee. Error: '.$e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try{
            
        // Find the employee
        $employee = Employee::with('user')->findOrFail($id);

        // Delete the photo if it exists
        if ($employee->photo) {
            Storage::disk('public')->delete($employee->photo);
        }

        // Delete the employee
        $employee->user->delete();
        $employee->delete();
        DB::commit();
        return redirect()->route('employee.index')->with('error', 'Employee deleted successfully');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('employee.index')->with('error', 'Employee deleted failed. Error: '.$e);
        }
    }
}
