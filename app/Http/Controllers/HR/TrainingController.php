<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingType;
use App\Models\Trainer;
use App\Models\Employee;
use App\Models\Training;

class TrainingController extends Controller
{
    //
    public function index()
    {
        // $trainingTypes = TrainingType::where('active', true)->get();
        $trainingTypes = TrainingType::all();
        $trainers = Trainer::all();
        $employees = Employee::all();
        $trainings = Training::with(['trainingType', 'trainer', 'employees'])->get();

        return view('HR.Trainings.index', compact('trainingTypes', 'trainers', 'employees', 'trainings'));
    }
    public function create()
    {
        $trainingTypes = TrainingType::all();
        $trainers = Trainer::all();
        $employees = Employee::all();
    
        return view('HR.Trainings.create', compact('trainingTypes', 'trainers', 'employees'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'training_type_id' => 'required',
            'trainer_id' => 'required',
            'selected_employees' => 'required|array|min:1',
            'status' => 'required|in:active,inactive',
            'num_of_employees' => 'required|integer|min:1',
        ]);

        $training = Training::create([
            'training_type_id' => $request->training_type_id,
            'trainer_id' => $request->trainer_id,
            'status' => $request->status,
            'num_of_employees' => $request->num_of_employees,
        ]);

        $training->employees()->attach($request->selected_employees);

        return redirect()->route('trainings.index')->with('success', 'Training created successfully.');
    }


    public function edit($id)
{
    $training = Training::with('employees')->findOrFail($id);
    $trainingTypes = TrainingType::all();
    $trainers = Trainer::all();
    $employees = Employee::all();

    return view('HR.Trainings.edit', compact('training', 'trainingTypes', 'trainers', 'employees'));
}
public function update(Request $request, $id)
{
    $this->validate($request, [
        'training_type_id' => 'required',
        'trainer_id' => 'required',
        'selected_employees' => 'required|array|min:1',
        'status' => 'required|in:active,inactive',
        'num_of_employees' => 'required|integer|min:1',
    ]);

    $training = Training::findOrFail($id);

    $training->update([
        'training_type_id' => $request->training_type_id,
        'trainer_id' => $request->trainer_id,
        'status' => $request->status,
        'num_of_employees' => $request->num_of_employees,
    ]);

    $training->employees()->sync($request->selected_employees);

    return redirect()->route('trainings.index')->with('success', 'Training updated successfully.');
}
public function destroy($id)
{
    $training = Training::findOrFail($id);
    $training->employees()->detach(); // Detach employees associated with this training
    $training->delete();

    return redirect()->route('trainings.index')->with('success', 'Training deleted successfully.');
}


    // public function create()
    // {
    //     $trainingTypes = TrainingType::where('active', true)->get();
    //     $trainers = Trainer::all();
    //     $employees = Employee::all();

    //     return view('trainings.create', compact('trainingTypes', 'trainers', 'employees'));
    // }

    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'training_type_id' => 'required',
    //         'trainer_id' => 'required',
    //         'selected_employees' => 'required|array|min:1',
    //         'status' => 'required|in:active,inactive',
    //         'num_of_employees' => 'required|integer|min:1',
    //     ]);

    //     $training = Training::create([
    //         'training_type_id' => $request->training_type_id,
    //         'trainer_id' => $request->trainer_id,
    //         'status' => $request->status,
    //         'num_of_employees' => $request->num_of_employees,
    //     ]);

    //     $training->employees()->attach($request->selected_employees);

    //     return redirect()->route('trainings.index')->with('success', 'Training created successfully.');
    // }

    // public function index()
    // {
    //     $trainings = Training::with(['trainingType', 'trainer', 'employees'])->get();
    //     return view('trainings.index', compact('trainings'));
    // }

}
