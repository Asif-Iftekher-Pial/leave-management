<?php

namespace App\Http\Controllers\Admin;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;

class LeaveManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaves = LeaveRequest::with('user')->orderBy('id','desc')->get();
        return view('partials.Admin.leave_manage.index',compact('leaves'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $review = LeaveRequest::with('user')->findOrFail($id);
        return view('partials.Admin.leave_manage.review',compact('review'));
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
        $data =$request->validate([
            'admin_comment' => 'required|string',
            'leave_status' => 'required|in:pending,approved,rejected'
        ]);

        $leave = LeaveRequest::with('user')->findOrFail($id);
        $leave->fill($data)->save();
        $user_email = $leave->user->email;
        Mail::to($user_email)->send(new NotificationMail($leave));

        return redirect()->route('leave-request-manage.index')->with('success','Leave request updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
