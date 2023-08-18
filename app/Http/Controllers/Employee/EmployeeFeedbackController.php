<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Feedback;


class EmployeeFeedbackController extends Controller
{
    //


public function index(Employee $employee)
{
    $employee = auth()->user();
    $feedback = Feedback::where('employee_id', $employee->id)->get();

    return view('Employee.Feedback.index', [
        'feedback' => $feedback ?? []  // Provide an empty array if feedback is null
    ]);
}


}
