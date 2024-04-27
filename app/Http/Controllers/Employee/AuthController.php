<?php

namespace App\Http\Controllers\Employee;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registration()
    {
        return view('partials.Employee.auth.registration');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('partials.Employee.auth.login');
    }

    public function submit(Request $request)
    {
        $credentials  = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // return $credentials;
        if (Auth::attempt($credentials)) { //login attempt
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('message', 'Login successful!');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data['role'] = 'employee';
        $user = User::create($data);
        Employee::create(['user_id' => $user->id,'status' => 'unblocked']);
        return redirect()->route('login')->with('success','Registration successful');
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
    public function block()
    {
        return view('partials.Employee.auth.block');
    }
}
