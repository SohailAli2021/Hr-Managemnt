<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = ['job_id',
    'employee_id','cv', 'status'];

    // Define the many-to-one relationship with jobs
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    // Define the many-to-one relationship with users (representing employees)
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
