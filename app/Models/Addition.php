<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addition extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'basic_salary', 'bonus', 'allowance', 'conveyance', 'month'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    
}
