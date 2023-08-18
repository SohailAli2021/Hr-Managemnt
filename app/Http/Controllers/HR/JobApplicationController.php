<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Job;
use App\Models\JobApplication;
use Symfony\Component\HttpFoundation\Response;

class JobApplicationController extends Controller
{
    //

    public function index()
    {
        $jobApplications = JobApplication::with('job')->get();
        return view('HR.JobApplications.index', compact('jobApplications'));
    }

    public function approve(JobApplication $application)
    {
        $application->update(['status' => 'approved']);
        return redirect()->route('job_applications.index')->with('success', 'Application approved!');
    }

    public function reject(JobApplication $application)
    {
        $application->update(['status' => 'rejected']);
        return redirect()->route('job_applications.index')->with('success', 'Application rejected!');
    }

    public function showCv(JobApplication $jobApplication)
    {
        $cvPath = $jobApplication->cv;
    
        // Check if the CV file exists in storage.
        if (Storage::exists($cvPath)) {
            // Get the original name of the CV file.
            $originalName = pathinfo($cvPath, PATHINFO_FILENAME);
    
            // Get the MIME type of the CV file.
            $mimeType = Storage::mimeType($cvPath);
    
            // Read the CV file's contents.
            $cvContents = Storage::get($cvPath);
    
            // Generate the response to download the CV file.
            return new Response($cvContents, 200, [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'attachment; filename="' . $originalName . '.pdf"', // Change the extension based on the actual file format.
            ]);
        } else {
            // CV file not found in storage. You can handle this case accordingly (e.g., show an error message).
            // For now, let's redirect back with an error message.
            return redirect()->back()->with('error', 'CV not found.');
        }
    }

    // public function show(JobApplication $application)
    // {
    //     return view('jobs.applications.show', compact('application'));
    // }

    // public function approve(JobApplication $application)
    // {
    //     $application->update(['status' => 'approved']);

    //     return redirect()->route('jobs.applications.show', $application)->with('success', 'Application approved!');
    // }

    // public function reject(JobApplication $application)
    // {
    //     $application->update(['status' => 'rejected']);

    //     return redirect()->route('jobs.applications.show', $application)->with('success', 'Application rejected!');
    // }
}
