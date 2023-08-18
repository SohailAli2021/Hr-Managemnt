<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingType extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'start_date',
        'end_date',
       
    ];

    public function trainingList(){
        return $this->hasMany(TrainingList::class);
    }
}
