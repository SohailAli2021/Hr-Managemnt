<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'Firstname',
        'Email',
        'start_date',
        'avatar',
        'department_id',
        'designation_id',
        'emp_status_id',
        'user_id',
        'job_status'

       
    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function emp_status(){
        return $this->belongsTo(EmpStatus::class);
    }

    public function designation(){
        return $this->belongsTo(Designation::class);
    }

    public function user(){
        return $this->belongsTo(user::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'employee_id');
    }
    
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function attendanceCount()
    {
        return $this->attendances()->count();
    }

    public function employeeAttendances()
    {
        return $this->hasMany(EmployeeAttendance::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }
    public function leaveCount()
    {
        return $this->leaves()->count();
    }
    public function projects()
{
    return $this->hasMany(Project::class, 'employee_id');
}

public function additions()
{
    return $this->hasMany(Addition::class);
}

public function overtimes()
{
    return $this->hasMany(Overtime::class);
}

public function salarySlip()
    {
        return $this->hasMany(SalarySlip::class);
    }

}
