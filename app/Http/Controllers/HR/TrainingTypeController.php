<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\TrainingType;


class TrainingTypeController extends Controller
{
    //
    public function index(){
        $train=TrainingType::all();
        return view('HR.TrainingType.index' ,compact('train'));
     }

     public function create()
     {
        return view('HR.TrainingType.create');
     }
     public function store(Request $request)
     {
         $request->validate([
             'title' => 'required|string|max:255',
             'description' => 'required|string|max:255',
             'price' => 'required|string|max:255',
             'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
         ]);
     
         TrainingType::create([
             'title' => $request->input('title'),
             'description' => $request->input('description'),
             'price' => $request->input('price'),
             'start_date' => $request->input('start_date'),
             'end_date' => $request->input('end_date'),
         ]);
     
         return redirect()->route('trainingtype.index')->with('success', 'Training Type created successfully!');
     }

public function edit($id)
{
    $trainingtype=TrainingType::find($id);
    return view ('HR.TrainingType.edit')->with('trainingtype',$trainingtype);
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
             'description' => 'required|string|max:255',
             'price' => 'required|string|max:255',
             'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    $trainingtype = TrainingType::find($id);
    $trainingtype->title = $request->input('title');
    $trainingtype->description = $request->input('description');
    $trainingtype->price = $request->input('price');
    $trainingtype->start_date = $request->input('start_date');
    $trainingtype->end_date = $request->input('end_date');
   
    $trainingtype->save();

    Session::flash('success', 'Training Type updated successfully!');
    return redirect('trainingtype/index');
}


public function destroy($id)
{
    $trainingtype = TrainingType::find($id);

    if (!$trainingtype) {
        return response()->json(['success' => false, 'message' => 'Training Type not found!'], 404);
    }

    $trainingtype->delete();

    if (request()->ajax()) {
        // For AJAX requests, return JSON response
        return response()->json(['success' => true, 'message' => 'Training Type deleted successfully!']);
    } else {
        // For regular form submissions, redirect to the desired route
        return redirect()->route('TrainingType.index')->with('success', 'Training Type deleted successfully!');
    }
}
}
