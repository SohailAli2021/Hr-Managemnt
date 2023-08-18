<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Employee;
use App\Models\ProjectUpdate;

class EmployeeProjectController extends Controller
{
    
    public function index(Employee $employee)
{
    // $employee = auth()->user();
    // $user = auth()->user();
    // $employee = $user->employee;
    $employee = auth()->user();
    $assignedProjects = Project::where('employee_id', $employee->id)->get();
    // $assignedProjects = $employee->projects;
   
    // dd($employee); // Debug line
    return view('Employee.Projects.index', compact('assignedProjects'));
}
// public function index()
// {

//     $user = auth()->user();
//     $employee = $user->employee; // Access the employee relationship

//     if ($employee) {
//         $assignedProjects = $employee->projects;
//         return view('Employee.Projects.index', compact('assignedProjects'));
//     } else {
//         // Handle the case when the employee is not associated with the user
//         // Redirect to login or show an error message
//         return redirect()->route('login');
//     }
//     // $user =  auth()->user();

//     // if ($user && $user->employee) {
//     //     $assignedProjects = $user->employee->projects;
//     //     return view('Employee.Projects.index', compact('assignedProjects'));
//     // } else {
//     //     // Redirect to login page
//     //     return redirect()->route('login');
//     // }
// }

    public function updateProgress(Request $request, Project $project)
    {
        $this->validate($request, [
            'progress' => 'required|numeric|min:0|max:100',
        ]);

        $project->update(['progress' => $request->progress]);

        return redirect()->back()->with('success', 'Progress updated successfully.');
    }

    public function markDone(Project $project)
    {
        $project->update(['is_completed' => true]);

        return redirect()->back()->with('success', 'Project marked as done.');
    }

}
