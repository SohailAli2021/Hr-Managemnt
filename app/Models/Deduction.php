<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    use HasFactory;

    protected $fillable = [ 'tax_percent', 'fund_percent'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
