<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['Name', 'Path', 'Mime_type', 'Size', 'employee_id'];


    public function employee()
{
    return $this->belongsTo(Employee::class);
}

}
