<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = ['trainer_id', 'training_type_id','num_of_employees','status'];

    public function trainingType()
    {
        return $this->belongsTo(TrainingType::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

   
}
