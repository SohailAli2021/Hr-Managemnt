<?php

namespace App\Http\Controllers\HR;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Employee;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index()
{
    $employees = Employee::with('attendances')->get();
    return view('HR.Attendance.attendance_index', compact('employees'));
}

public function store(Request $request)
{
    $attendanceData = $request->input('attendance');

        foreach ($attendanceData as $employeeId => $status) {
            $employee = Employee::find($employeeId);

            if ($employee) {
                $attendance = $employee->attendances()->where('date', now()->toDateString())->first();

                if (!$attendance) {
                    $attendance = new Attendance();
                    $attendance->employee_id = $employee->id;
                    $attendance->date = now()->toDateString();
                }

                $attendance->status = $status;
                $attendance->save();
            }
        }
        $employee = Employee::find($employeeId);
        $attendanceCount = $employee->attendanceCount();
        // Session::flash('success', 'Attendance marked successfully.');
        // return redirect('attendance/index');
    return redirect()->route('attendance.index', compact('attendanceCount'))->with('success', 'Attendance marked successfully!');
}

public function show($id)
{
    $employee = Employee::findOrFail($id);
    $attendance = $employee->attendances;
    return view('HR.Attendance.attendance_detail', compact('employee', 'attendance'));
}

public function generateAttendancePdf($id)
{
    $employee = Employee::findOrFail($id);
    $attendance = $employee->attendances;
    
    $pdf = PDF::loadView('HR.Attendance.attendance_pdf', compact('employee', 'attendance'));

    return $pdf->download('attendance_report.pdf');
}   
    
}
