<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Designation;

class DesignationController extends Controller
{
    //
    public function index(){
        $deg=Designation::all();
        return view('HR.Designation.index' ,compact('deg'));
     }

     public function create()
     {
        return view('HR.Designation.create');
     }



     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
         ]);
     
         Designation::create([
             'Name' => $request->input('name'),
         ]);
     
         return redirect()->route('designation.index')->with('success', 'Designation created successfully!');
     }

    //  public function store(Request $request)
    //  {
    //     $request->validate([
    //         'Name' => 'required|string|max:255',
            
    //     ]);
    //   //   dd($request->all());
    //     $designation= new Designation();
    //     $designation->Name=$request->name;
    //     $designation->save();
    //     return redirect()->route('designation.index');

    //  }
//      public function show($id)
// {
//     $department=Department::find($id);
//     return view ('HR.Department.show')->with('department',$department);
// }
public function edit($id)
{
    $designation=Designation::find($id);
    return view ('HR.Designation.edit')->with('designation',$designation);
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $designation = Designation::find($id);
    $designation->Name = $request->input('name');
    $designation->save();

    Session::flash('success', 'Designation updated successfully!');
    return redirect('designation/index');
}
// public function update(Request $request,$id)
// {
//     $designation=Designation::find($id);
//     $designation->Name=$request->input('name');
//     $designation->save();
//  return redirect('designation/index');
// }

public function destroy($id)
{
    $designation = Designation::find($id);

    if (!$designation) {
        return response()->json(['success' => false, 'message' => 'Designation not found!'], 404);
    }

    $designation->delete();

    if (request()->ajax()) {
        // For AJAX requests, return JSON response
        return response()->json(['success' => true, 'message' => 'Designation deleted successfully!']);
    } else {
        // For regular form submissions, redirect to the desired route
        return redirect()->route('designation.index')->with('success', 'Designation deleted successfully!');
    }
}
}
