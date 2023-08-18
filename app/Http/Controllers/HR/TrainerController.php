<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Trainer;

class TrainerController extends Controller
{
    //
    public function index()
    {
        $trainers = Trainer::with('employee')->get();
        $employees = Employee::all();

        return view('HR.Trainers.index', compact('trainers', 'employees'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id' => 'required|exists:employees,id',
            'description'=> 'required|string',
        ]);

        Trainer::create([
            'employee_id' => $request->employee_id,
           'description'=> $request->description,
        ]);

        return redirect()->route('trainers.index')->with('success', 'Employee assigned as trainer.');
    }

    public function edit($id)
{
    $trainer = Trainer::findOrFail($id);
    $employees = Employee::all();

    return view('HR.Trainers.edit', compact('trainer', 'employees'));
}
public function update(Request $request, $id)
{
    $this->validate($request, [
        'employee_id' => 'required|exists:employees,id',
        'description'=> 'required|string',
    ]);

    $trainer = Trainer::findOrFail($id);
    $trainer->update([
        'employee_id' => $request->employee_id,
        'description'=> $request->description,
    ]);

    return redirect()->route('trainers.index')->with('success', 'Trainer details updated.');
}
public function destroy($id)
{
    $trainer = Trainer::findOrFail($id);
    $trainer->delete();

    return redirect()->route('trainers.index')->with('success', 'Trainer deleted.');
}
    
}
