<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Job;
use App\Models\JobApplication;


class EmployeeJobController extends Controller
{
    //

    public function index()
    {
        $jobs = Job::all();
        return view('Employee.Jobs.index', compact('jobs'));
    }

    public function applyJob(Job $job)
    {
        return view('Employee.Jobs.apply', compact('job'));
    }

    public function storeApplication(Request $request, Job $job)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $application = new JobApplication();
        $application->job_id = $job->id;
        // $employee = auth()->user(); 
        $application->employee_id = auth()->user()->id;

        $cv = $request->file('cv')->store('cv');
        $application->cv = $cv;

        $application->save();

        return redirect()->route('employee.jobs')->with('success', 'Application submitted successfully!');
    }

    public function showApplications()
    {
        $employee = auth()->user(); 
        $applications = JobApplication::where('employee_id', $employee->id)->get();
        return view('Employee.Jobs.applications', compact('applications'));
    }

    


    // public function viewJobApplications()
    // {
    //     $applications = auth()->user()->jobApplications;
    //     // $applications = Auth::user()->jobApplications;

    //     return view('employee.applications', compact('applications'));
    // }

    // public function applyForJob(Job $job)
    // {
    //     return view('employee.apply', compact('job'));
    // }

    // public function storeJobApplication(Request $request, Job $job)
    // {
    //     $request->validate([
    //         'cv' => 'required|mimes:pdf,doc,docx|max:2048',
    //     ]);

    //     $application = new JobApplication([
    //         'cv' => $request->file('cv')->store('cv', 'public'),
    //         'status' => 'pending',
    //     ]);

    //     // Auth::user()->jobApplications()->save($application);
    //     $job->applications()->save($application);

    //     return redirect()->route('jobs.index')->with('success', 'Application submitted successfully!');
    // }

}
