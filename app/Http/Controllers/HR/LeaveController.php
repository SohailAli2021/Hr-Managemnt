<?php

namespace App\Http\Controllers\HR;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Leave;

class LeaveController extends Controller
{
    //
    public function showLeaveRequests()
    {
        $leaveRequests = Leave::with('employee')->get();
        return view('HR.Leave.leave_requests', compact('leaveRequests'));
    }

    public function approveLeave($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status = 'Approved';
        $leave->save();

        $employee = $leave->employee;
        $leaveCount = $employee->leaveCount();
        // Send notification to employee
        // Mail::to($leave->employee->email)->send(new LeaveStatusNotification($leave->status));

        return redirect()->route('admin.leave', compact('leaveCount'))->with('success', 'Leave request approved successfully.');
    }

    public function rejectLeave($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status = 'Rejected';
        $leave->save();

        // Send notification to employee
        // Mail::to($leave->employee->email)->send(new LeaveStatusNotification($leave->status));

        return redirect()->route('admin.leave')->with('success', 'Leave request rejected successfully.');
    }


    public function generateLeavesPdf()
    {
        $leaveRequests = Leave::with('employee')->get();

        $pdf = PDF::loadView('HR.Leave.leaves_pdf', compact('leaveRequests'));

        return $pdf->download('leave_requests.pdf');
    }
}
