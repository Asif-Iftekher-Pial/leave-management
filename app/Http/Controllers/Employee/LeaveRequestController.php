<?php

namespace App\Http\Controllers\Employee;

use Carbon\Carbon;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaves = LeaveRequest::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        return view('partials.Employee.leave_request.index',compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('partials.Employee.leave_request.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'leave_type' => 'required|in:casual,sick,emergency',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|max:255',
        ]);

        $validatedData['start_date'] = Carbon::parse($request->start_date)->format('d-m-Y');;
        $validatedData['end_date'] = Carbon::parse($request->end_date)->format('d-m-Y');
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['employee_id'] = auth()->user()->employee->id;
        DB::beginTransaction();
        try {
            LeaveRequest::create($validatedData);
            DB::commit();
            return redirect()->route('employee-leave-request.index')->with('success','Leave request created successfully');
        } catch (\Exception $e) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
