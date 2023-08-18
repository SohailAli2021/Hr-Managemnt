<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'overtime_date', 'hours_worked', 'cost'];

    public function employee()
{
    return $this->belongsTo(Employee::class);
}
}
