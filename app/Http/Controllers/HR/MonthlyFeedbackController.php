<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Feedback;
use App\Models\Project;
use App\Models\Attendance;
use Carbon\Carbon;

class MonthlyFeedbackController extends Controller
{
    //
    public function index()
    {
        $employees = Employee::all();
        return view('HR.Feedback.index', compact('employees'));
    }

    public function create(Employee $employee)
    {
        $projects = $employee->projects;
        $attendances = $employee->attendances;

        return view('HR.Feedback.create', compact('employee', 'projects', 'attendances'));
    }

    public function store(Request $request, Project $project,Employee $employee ,Attendance $attendance)
    {
        // Validate the form data
        $request->validate([
            'project_rating' => 'required|in:good,poor,excellent',
            'attendance_rating' => 'required|in:good,poor,excellent',
            'team_feedback_rating' => 'required|in:good,poor,excellent',
            'comments' => 'nullable|string',
            'month' => 'nullable|string',
        ]);

            Feedback::create([
                'project_rating' => $request->input('project_rating'),
                'attendance_rating' => $request->input('attendance_rating'),
                'team_feedback_rating' => $request->input('team_feedback_rating'),
                'comments' => $request->input('comments'),
                'month' => $request->input('month'),
                'employee_id' => $employee->id,
                'project_id' => $project->id,
                'attendance_id' => $attendance->id,
            ]);

        return redirect()->route('admin.monthly-feedback.index', $employee->id)->with('success', 'Feedback sent successfully.');
    }

}
