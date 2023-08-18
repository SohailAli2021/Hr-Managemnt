<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\EmployeeAttendance;
use Carbon\Carbon;

class EmployeeAttendanceController extends Controller
{

    public function index()
    {
        // $employee = auth()->user(); // Assuming the employee data is available through the authenticated user
        // $timeRecord = EmployeeAttendance::where('employee_id', $employee->id)->latest()->first();

        // return view('Employee.Attendance.index', compact('employee', 'timeRecord'));
    $employee = auth()->user();
    $date = now()->toDateString(); // Get current date

    // Fetch the time record for the current date
    $timeRecord = EmployeeAttendance::where('employee_id', $employee->id)
        ->where('date', $date)
        ->first();

    return view('Employee.Attendance.index', compact('timeRecord'));
    }

    // public function timeIn(Request $request, Employee $employee)
    // {
    //     $date = now()->toDateString();
    //     $timeIn = Carbon::now()->format('H:i:s'); // Format the time using Carbon
    
    //     $timeRecord = EmployeeAttendance::where('employee_id', $employee->id)
    //         ->where('date', $date)
    //         ->first();
    
    //     if (!$timeRecord) {
    //         $timeRecord = new EmployeeAttendance();
    //         $timeRecord->employee_id = $employee->id;
    //         $timeRecord->date = $date;
    //     }
    
    //     $timeRecord->time_in = $timeIn;
    //     $timeRecord->save();
    
    //     return redirect()->route('employee.attendance')->with('success', 'Time In marked successfully!');
    // }
    
    // public function timeOut(Request $request, Employee $employee)
    // {
    //     $date = now()->toDateString();
    //     $timeOut = Carbon::now()->format('H:i:s'); // Format the time using Carbon
    
    //     $timeRecord = EmployeeAttendance::where('employee_id', $employee->id)
    //         ->where('date', $date)
    //         ->first();
    
    //     if ($timeRecord) {
    //         $timeRecord->time_out = $timeOut;
    //         $timeRecord->save();
    //     }
    
    //     return redirect()->route('employee.attendance')->with('success', 'Time Out marked successfully!');
    // }

    public function timeIn(Request $request)
    {
        $employee = auth()->user();
        $date = now()->toDateString();
        $timeIn = now()->toTimeString(); // Current time

        $timeRecord = new EmployeeAttendance();
        $timeRecord->employee_id = $employee->id;
        $timeRecord->date = $date;
        $timeRecord->time_in = $timeIn;
        $timeRecord->save();

        return redirect()->route('employee.attendance')->with('success', 'Time In marked successfully!');
    }

    public function timeOut(Request $request)
    {
        $employee = auth()->user();
        $date = now()->toDateString();
        $timeOut = now()->toTimeString(); // Current time

        $timeRecord = EmployeeAttendance::where('employee_id', $employee->id)
            ->whereDate('date', $date)
            ->first();

        if ($timeRecord) {
            $timeRecord->time_out = $timeOut;
            $timeRecord->save();
        }

        return redirect()->route('employee.attendance')->with('success', 'Time Out marked successfully!');
    }
    // public function submit(Request $request, Employee $employee)
    // {
    //     $timeIn = Carbon::parse($request->input('time_in'));
    //     $timeOut = Carbon::parse($request->input('time_out'));

    //     // Ensure that time out is after time in
    //     if ($timeOut->isBefore($timeIn)) {
    //         return redirect()->back()->with('error', 'Time Out cannot be before Time In.');
    //     }

    //     // Insert time in and time out records
    //     $attendance = new EmployeeAttendance();
    //     $attendance->employee_id = $employee->id;
    //     $attendance->date = $timeIn->toDateString();
    //     $attendance->time_in = $timeIn->toTimeString();
    //     $attendance->time_out = $timeOut->toTimeString();
    //     $attendance->save();

    //     return redirect()->route('employee.attendance')->with('success', 'Time In and Time Out recorded successfully!');
    // }

    
    // public function timeIn(Request $request, Employee $employee)
    // {
    //     $currentDateTime = $request->input('current_date_time');
        
    //     $timeRecord = new EmployeeAttendance();
    //     $timeRecord->employee_id = $employee->id;
    //     $timeRecord->date = Carbon::parse($currentDateTime)->toDateString();
    //     $timeRecord->time_in = Carbon::parse($currentDateTime)->format('H:i:s');
    //     $timeRecord->save();

    //     return redirect()->route('employee.attendance')->with('success', 'Time In marked successfully!');
    // }

    // public function timeOut(Request $request, Employee $employee)
    // {
    //     $currentDateTime = $request->input('current_date_time');
        
    //     $timeRecord = EmployeeAttendance::where('employee_id', $employee->id)
    //         ->where('date', Carbon::parse($currentDateTime)->toDateString())
    //         ->first();

    //     if ($timeRecord) {
    //         $timeRecord->time_out = Carbon::parse($currentDateTime)->format('H:i:s');
    //         $timeRecord->save();
    //     }

    //     return redirect()->route('employee.attendance')->with('success', 'Time Out marked successfully!');
    // }
    
    
    
    
    // public function timeIn()
    // {
    //     $employee = auth()->user(); // Assuming the employee data is available through the authenticated user
    //     $employeeAttendance = new EmployeeAttendance();
    //     $employeeAttendance->employee_id = $employee->id;
    //     $employeeAttendance->time_in = now();
    //     $employeeAttendance->save();

    //     return redirect()->route('employee.attendance')->with('success', 'Time in recorded successfully!');
    // }

    // public function timeOut()
    // {
    //     $employee = auth()->user(); // Assuming the employee data is available through the authenticated user
    //     $employeeAttendance = EmployeeAttendance::where('employee_id', $employee->id)->latest()->first();

    //     if (!$employeeAttendance) {
    //         return redirect()->route('employee.attendance')->with('error', 'No time in record found for you.');
    //     }

    //     $employeeAttendance->time_out = now();
    //     $employeeAttendance->save();

    //     return redirect()->route('employee.attendance')->with('success', 'Time out recorded successfully!');
    // }

    // public function show($id)
    // {
    //     $employee = Employee::findOrFail($id);
    //     $timeRecord = EmployeeAttendance::where('employee_id', $employee->id)->latest()->first();

    //     return view('employees.show', compact('employee', 'timeRecord'));
    // }


}
