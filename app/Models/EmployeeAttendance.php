<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAttendance extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'time_in', 'time_out' , 'date'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
