<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\File;
use Illuminate\Support\Facades\Auth;


class FileManagerController extends Controller
{
    //

    public function index(Employee $employee)
    {
        $employee = auth()->user();
        $files = File::latest()->paginate(10);
        return view('Employee.Filemanager.index', compact('files','employee'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048',
       ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('uploads', 'public');

        $employeeId = auth()->user()->id;
        File::create([
            'Name' => $fileName,
            'Path' => $filePath,
            'Mime_type' => $file->getClientMimeType(),
            'Size' => $file->getSize(),
            'employee_id' => $employeeId,
        ]);

        return redirect()->route('filemanager.index')->with('success', 'File uploaded successfully.');
    }

    public function delete(File $file)
    {
        Storage::disk('public')->delete($file->Path);
        $file->delete();
        return redirect()->route('filemanager.index')->with('success', 'File deleted successfully.');
    }

}
