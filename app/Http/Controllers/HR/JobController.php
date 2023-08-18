<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Job;
use App\Models\JobApplication;

class JobController extends Controller
{
    //
    public function index()
    {
        $jobs = Job::all();
        return view('HR.Jobs.index', compact('jobs'));
    }

    public function create()
{
    return view('HR.Jobs.create');
}

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'application_deadline' => 'required|date',
        ]);

        Job::create($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job posted successfully!');
    }

    public function show(Job $job)
    {
        return view('HR.Jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        return view('HR.Jobs.edit', compact('job'));
    }

    // public function update(Request $request, Job $job)
    // {
    //     $request->validate([
    //         'title' => 'required|string',
    //         'description' => 'required|string',
    //         'requirements' => 'required|string',
    //         'application_deadline' => 'required|date',
    //     ]);

    //     $job->update($request->all());

    //     return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
    // }
    public function update(Request $request, Job $job)
{
    $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'requirements' => 'required|string',
        'application_deadline' => 'required|date',
    ]);

    $job->fill($request->all());
    $job->save();

    return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
}

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully!');
    }
}
