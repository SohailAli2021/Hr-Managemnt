<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;

class DepartmentController extends Controller
{
    //
    
    public function index(){
        $dep=Department::all();
        return view('HR.Department.index' ,compact('dep'));
     }

     public function create()
     {
        return view('HR.Department.create');
     }
     public function store(Request $request)
     {
         $request->validate([
             'depname' => 'required|string|max:255',
             'head' => 'required|string|max:255',
         ]);
     
         Department::create([
             'DepName' => $request->input('depname'),
             'Head' => $request->input('head'),
         ]);
     
         return redirect()->route('department.index')->with('success', 'Department created successfully!');
     }
    //  public function store(Request $request)
    //  {
    //   //   dd($request->all());
    //     $department= new Department();
    //     $department->DepName=$request->depname;
    //     $department->Head=$request->head;
    //     $department->save();
    //     return redirect()->route('department.index');

    //  }
//      public function show($id)
// {
//     $department=Department::find($id);
//     return view ('HR.Department.show')->with('department',$department);
// }
public function edit($id)
{
    $department=Department::find($id);
    return view ('HR.Department.edit')->with('department',$department);
}

public function update(Request $request, $id)
{
    $request->validate([
        'depname' => 'required|string|max:255',
        'head' => 'required|string|max:255',
    ]);

    $department = Department::find($id);
    $department->DepName = $request->input('depname');
    $department->Head = $request->input('head');
    $department->save();

    Session::flash('success', 'Department updated successfully!');
    return redirect('department/index');
}


// public function update(Request $request,$id)
// {
//     $department=Department::find($id);
//     $department->DepName=$request->input('depname');
//     $department->Head=$request->input('head');
//     $department->save();
//  return redirect('department/index');
// }
public function destroy($id)
{
    $department = Department::find($id);

    if (!$department) {
        return response()->json(['success' => false, 'message' => 'Department not found!'], 404);
    }

    $department->delete();

    if (request()->ajax()) {
        // For AJAX requests, return JSON response
        return response()->json(['success' => true, 'message' => 'Department deleted successfully!']);
    } else {
        // For regular form submissions, redirect to the desired route
        return redirect()->route('department.index')->with('success', 'Department deleted successfully!');
    }
}
// public function destroy($id)
// {
//     $department=Department::find($id);
//     $department->delete();
//     return redirect('department/index');
// }
}
