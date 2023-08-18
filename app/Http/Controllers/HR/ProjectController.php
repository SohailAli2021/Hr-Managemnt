<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Employee;

class ProjectController extends Controller
{
    //

    public function index()
    {
        $projects = Project::all();
        $employees = Employee::all();

        return view('HR.Projects.index', compact('projects', 'employees'));
    }

   

    public function assignProject(Request $request)
    {
        $this->validate($request, [
            'project_name' => 'required|string',
            'deadline' => 'required|date',
            'employee' => 'required|exists:employees,id',
        ]);

        // Create a new project
        $project = new Project();
        $project->name = $request->project_name;
        $project->deadline = $request->deadline;
        $project->employee_id = $request->employee;
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project assigned successfully.');
    }

    public function show($id)
    {
       
        $project=Project::find($id);
        return view ('HR.Projects.show')->with('project',$project);
    }
    

    public function editAssign(Project $project)
    {
        $employees = Employee::all();
        return view('HR.Projects.edit', compact('project', 'employees'));
    }

    public function updateAssign(Request $request, Project $project)
    {
        $this->validate($request, [
            'employee' => 'required|exists:employees,id',
            'project_name' => 'required|string',
            'deadline' => 'required|date',
        ]);

        $employee = Employee::find($request->employee);
        $project->update(['employee_id' => $employee->id]);
        $project->name = $request->input('project_name');
        $project->deadline = $request->input('deadline');
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Assignment updated successfully.');
    }

}
