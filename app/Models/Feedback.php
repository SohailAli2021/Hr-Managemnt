<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';
    protected $fillable = ['employee_id', 'project_id', 'attendance_id', 'project_feedback', 'attendance_feedback', 'team_feedback','month','comments'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    
    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }
}

