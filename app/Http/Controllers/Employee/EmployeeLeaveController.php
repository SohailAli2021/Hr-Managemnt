<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Leave;

class EmployeeLeaveController extends Controller
{
    //

    public function showLeaveStatus()
    {
        $employee = auth()->user(); 
        // $user = Auth::user();
        $leaveRequests = Leave::where('employee_id', $employee->id)->get();
        return view('Employee.Leave.leave_status', compact('leaveRequests'));
    }

    public function showLeaveRequestForm()
    {
        return view ('Employee.Leave.request_form');
    }

    public function submitLeaveRequest(Request $request)
    {
        $request->validate([
            'leave_type' => 'required|in:casual,maternity,sick,other',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|max:255',
        ]);

        // $user = Auth::user();
        $employee = auth()->user(); 

        Leave::create([
            'employee_id' => $employee->id,
            'leave_type' => $request->input('leave_type'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'reason' => $request->input('reason'),
            'status' => 'Pending',
        ]);

        return redirect('employee/leave')->with('success', 'Leave request submitted successfully.');
    }
}
