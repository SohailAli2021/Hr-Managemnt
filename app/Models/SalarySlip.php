<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalarySlip extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'basic_salary', 'bonus', 'allowance', 'conveyance',
        'total_salary','total_deductions', 'tax', 'fund', 'overtime_earnings', 'net_salary','month',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function overtimes()
    {
        return $this->belongsTo(Overtime::class);
    }
    
    public function deductions()
    {
        return $this->belongsTo(Deduction::class);
    }
}
