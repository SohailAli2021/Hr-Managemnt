<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'deadline', 'progress', 'is_completed', 'employee_id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function updates()
    {
        return $this->hasMany(ProjectUpdate::class);
    }
}
