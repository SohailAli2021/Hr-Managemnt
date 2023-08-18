<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    //
    public function empindex(){
        return view('Employee.index');

    }
//     public function showNavigation()
// {
//     $employees = Employee::all();
//     return view('emp.layouts.app', compact('employees'));
// }
}
