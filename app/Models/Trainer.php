<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'description',];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }
}
