<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deduction;

class DeductionController extends Controller
{
    //

    public function index()
    {
        $deductions = Deduction::all();
        return view('HR.Deduction.index', compact('deductions'));
    }

    public function create()
    {
        return view('HR.Deduction.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tax_percent' => 'required|numeric',
            'fund_percent' => 'required|numeric',
        ]);

        Deduction::create($data);

        return redirect()->route('deductions.index')->with('success', 'Deduction created successfully.');
    }

    public function edit(Deduction $deduction)
    {
        return view('HR.Deduction.edit', compact('deduction'));
    }

    public function update(Request $request, Deduction $deduction)
    {
        $data = $request->validate([
            'tax_percent' => 'required|numeric',
            'fund_percent' => 'required|numeric',
        ]);

        $deduction->update($data);

        return redirect()->route('deductions.index')->with('success', 'Deduction updated successfully.');
    }
}
