<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{

    use HasFactory;


    protected $fillable = [
        'Name',
       
    ];

    public function employees(){
        return $this->hasMany(Employee::class);
    }  

}
