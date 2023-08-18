<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HR\EmployeeController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// regiter
Route::get('register','Auth\AuthController@showRegister')->name('register');
Route::post('register','Auth\AuthController@postRegister')->name('register.post');

// login
Route::get('/','Auth\AuthController@showlogin')->name('login');
Route::post('login','Auth\AuthController@postlogin')->name('login.post');
Route::get('logout','Auth\AuthController@logout')->name('logout');

Route::get('adminindex','AdminController@adminindex');
Route::get('empindex','EmployeeController@empindex');

// forget password
route::get('/forget' ,'Auth\AuthController@forgetpasswordload')->name('forget');
route::post('/forgetpassword' ,'Auth\AuthController@forgetpassword')->name('forgetpassword');
// forget password

//reset password
route::get('/reset/{token}' ,'Auth\AuthController@resetpasswordload');
route::post('/reset/{token}' ,'Auth\AuthController@resetpassword')->name('resetPassword');
//reset password


Route::group(['middleware'=>['web','checkadmin']],function()
{
   
    route::get('employee/index','HR\EmployeeController@index')->name('employee.index');
    route::get('employee/create','HR\EmployeeController@create')->name('employee.create');
    route::post('employee/store','HR\EmployeeController@store')->name('employee.store');
    route::get('employee/{id}/edit','HR\EmployeeController@edit')->name('employee.edit');
    route::post('employee/{id}/update','HR\EmployeeController@update')->name('employee.update');
    route::delete('employee/{id}/destroy','HR\EmployeeController@destroy')->name('employee.destroy');
    route::get('employee/{id}/show','HR\EmployeeController@show')->name('employee.show');
    Route::get('employee/{employee}/generate-pdf', 'HR\EmployeeController@generatePdf')
        ->name('employee.generate.pdf');
    Route::get('employee/generate-list-pdf', 'HR\EmployeeController@generateEmployeeListPdf')
        ->name('employee.generate.list.pdf');


route::get('department/index','HR\DepartmentController@index')->name('department.index');
route::get('department/create','HR\DepartmentController@create')->name('department.create');
route::post('department/store','HR\DepartmentController@store')->name('department.store');
route::get('department/{id}/edit','HR\DepartmentController@edit')->name('department.edit');
route::post('department/{id}/update','HR\DepartmentController@update')->name('department.update');
route::delete('department/{id}/destroy','HR\DepartmentController@destroy')->name('department.destroy');
// route::get('department/{id}/show','HR\DepartmentController@show')->name('department.show');



route::get('designation/index','HR\DesignationController@index')->name('designation.index');
route::get('designation/create','HR\DesignationController@create')->name('designation.create');
route::post('designation/store','HR\DesignationController@store')->name('designation.store');
route::get('designation/{id}/edit','HR\DesignationController@edit')->name('designation.edit');
route::post('designation/{id}/update','HR\DesignationController@update')->name('designation.update');
route::delete('designation/{id}/destroy','HR\DesignationController@destroy')->name('designation.destroy');
// route::get('department/{id}/show','HR\DepartmentController@show')->name('department.show');

route::get('attendance/index','HR\AttendanceController@index')->name('attendance.index');
route::post('attendance/store','HR\AttendanceController@store')->name('attendance.store');
route::get('attendance/{id}/show','HR\AttendanceController@show')->name('attendance.show');
Route::get('attendance/{id}/generate-pdf', 'HR\AttendanceController@generateAttendancePdf')
    ->name('attendance.generate.pdf');


    Route::get('admin/leave', 'HR\LeaveController@showLeaveRequests')->name('admin.leave');
Route::post('/admin/leave/approve/{id}', 'HR\LeaveController@approveLeave')->name('admin.leave.approve');
Route::post('/admin/leave/reject/{id}', 'HR\LeaveController@rejectLeave')->name('admin.leave.reject');
Route::get('leave/generate-pdf','HR\LeaveController@generateLeavesPdf')
    ->name('leave.generate.pdf');



Route::get('/job_applications/index', 'HR\JobApplicationController@index')->name('job_applications.index');
Route::post('/job_applications/{application}/approve', 'HR\JobApplicationController@approve')->name('job_applications.approve');
Route::post('/job_applications/{application}/reject', 'HR\JobApplicationController@reject')->name('job_applications.reject');
Route::get('/job-applications/{jobApplication}/cv', 'HR\JobApplicationController@showCv')->name('job_applications.cv');


Route::get('/jobs/index', 'HR\JobController@index')->name('jobs.index');
Route::get('/jobs/create', 'HR\JobController@create')->name('jobs.create');
Route::post('/jobs/store', 'HR\JobController@store')->name('jobs.store');
Route::get('/jobs/{job}/edit', 'HR\JobController@edit')->name('jobs.edit');
Route::put('/jobs/{job}', 'HR\JobController@update')->name('jobs.update');
Route::delete('/jobs/{job}', 'HR\JobController@destroy')->name('jobs.destroy');
Route::get('/jobs/{job}', 'HR\JobController@show')->name('jobs.show');




route::get('trainingtype/index','HR\TrainingTypeController@index')->name('trainingtype.index');
route::get('trainingtype/create','HR\TrainingTypeController@create')->name('trainingtype.create');
route::post('trainingtype/store','HR\TrainingTypeController@store')->name('trainingtype.store');
route::get('trainingtype/{id}/edit','HR\TrainingTypeController@edit')->name('trainingtype.edit');
route::post('trainingtype/{id}/update','HR\TrainingTypeController@update')->name('trainingtype.update');
route::delete('trainingtype/{id}/destroy','HR\TrainingTypeController@destroy')->name('trainingtype.destroy');



Route::get('/trainers', 'HR\TrainerController@index')->name('trainers.index');
Route::get('/trainings/create', 'HR\TrainingController@create')->name('trainings.create');
Route::get('/trainers/{id}/edit', 'HR\TrainerController@edit')->name('trainers.edit');
Route::put('/trainers/{id}', 'HR\TrainerController@update')->name('trainers.update');
Route::delete('/trainers/{id}', 'HR\TrainerController@destroy')->name('trainers.destroy');
Route::post('/trainers', 'HR\TrainerController@store')->name('trainers.store');


Route::get('/trainings', 'HR\TrainingController@index')->name('trainings.index');
Route::post('/trainings', 'HR\TrainingController@store')->name('trainings.store');
Route::get('/trainings/{id}/edit', 'HR\TrainingController@edit')->name('trainings.edit'); // Edit route
Route::put('/trainings/{id}', 'HR\TrainingController@update')->name('trainings.update'); // Update route
Route::delete('/trainings/{id}', 'HR\TrainingController@destroy')->name('trainings.destroy');

Route::get('/projects', 'HR\ProjectController@index')->name('projects.index');
Route::post('assign', 'HR\ProjectController@assignProject')->name('admin.assign');
Route::get('assign/{project}/edit', 'HR\ProjectController@editAssign')->name('admin.editAssign'); // Edit route
Route::post('assign/{project}/update', 'HR\ProjectController@updateAssign')->name('admin.updateAssign'); // Update route
Route::get('/projects/{id}', 'HR\ProjectController@show')->name('projects.show');


Route::get('/employee/{employee}/feedback/create', 'HR\MonthlyFeedbackController@create')->name('admin.employee.feedback.create');
Route::post('/employee/{employee}/feedback/store', 'HR\MonthlyFeedbackController@store')->name('admin.employee.feedback.store');
Route::get('/monthly-feedback', 'HR\MonthlyFeedbackController@index')->name('admin.monthly-feedback.index');



Route::get('addition', 'HR\EmployeeAdditionController@index')->name('addition.index');
Route::get('employees/{employee}/additions/create','HR\EmployeeAdditionController@create')->name('additions.create');
Route::post('employees/{employee}/additions', 'HR\EmployeeAdditionController@store')->name('additions.store');
Route::get('employees/{employee}/additions/{addition}/edit','HR\EmployeeAdditionController@edit')->name('additions.edit');
Route::put('employees/{employee}/additions/{addition}', 'HR\EmployeeAdditionController@update')->name('additions.update');
Route::get('employees/{employee}/generate-slip', 'HR\EmployeeAdditionController@generateSlip')->name('additions.generate-slip');
Route::get('download-pdf-report', 'HR\EmployeeAdditionController@downloadPdfReport')->name('additions.download-pdf-report');
Route::get('employees/{employee}/download-salary-slip', 'HR\EmployeeAdditionController@downloadEmployeeSalarySlip')->name('additions.download-salary-slip');



Route::get('overtimes', 'HR\OvertimeController@index')->name('overtimes.index');
Route::get('overtimes/create', 'HR\OvertimeController@create')->name('overtimes.create');
Route::post('overtimes', 'HR\OvertimeController@store')->name('overtimes.store');
Route::get('overtimes/{id}', 'HR\OvertimeController@show')->name('overtimes.show');
Route::get('overtimes/{id}/edit', 'HR\OvertimeController@edit')->name('overtimes.edit');
Route::put('/overtimes/{id}', 'HR\OvertimeController@update')->name('overtimes.update');
Route::delete('overtimes/{id}', 'HR\OvertimeController@destroy')->name('overtimes.destroy');



Route::get('deductions',  'HR\DeductionController@index')->name('deductions.index');
Route::get('deductions/create', 'HR\DeductionController@create')->name('deductions.create');
Route::post('deductions', 'HR\DeductionController@store')->name('deductions.store');
Route::get('deductions/{deduction}/edit', 'HR\DeductionController@edit')->name('deductions.edit');
Route::put('deductions/{deduction}', 'HR\DeductionController@update')->name('deductions.update');


});



Route::group(['middleware'=>['web','checkuser']],function()
{
   

Route::post('filemanager/upload', 'Employee\FileManagerController@upload')->name('fileupload');
Route::get('filemanager/index', 'Employee\FileManagerController@index')->name('filemanager.index');
Route::delete('filemanager/{file}', 'Employee\FileManagerController@delete')->name('filedelete');

});


Route::get('employee/attendance', 'Employee\EmployeeAttendanceController@index')->name('employee.attendance');
Route::post('attendance/time-in', 'Employee\EmployeeAttendanceController@timeIn')->name('employee.attendance.time-in');
Route::post('attendance/time-out', 'Employee\EmployeeAttendanceController@timeOut')->name('employee.attendance.time-out');


Route::get('employee/leave', 'Employee\EmployeeLeaveController@showLeaveStatus')->name('employee.leave');
Route::get('employee/requestleave', 'Employee\EmployeeLeaveController@showLeaveRequestForm')->name('employee.requestleave.form');
Route::post('employee/requestleave', 'Employee\EmployeeLeaveController@submitLeaveRequest')->name('employee.requestleave.submit');

Route::get('employee/jobs', 'Employee\EmployeeJobController@index')->name('employee.jobs');
Route::get('employee/jobs/{job}/apply', 'Employee\EmployeeJobController@applyJob')->name('employee.jobs.apply');
Route::post('employee/jobs/{job}/apply', 'Employee\EmployeeJobController@storeApplication')->name('employee.jobs.storeApplication');
Route::get('employee/applications', 'Employee\EmployeeJobController@showApplications')->name('employee.applications');


Route::get('employee/project', 'Employee\EmployeeProjectController@index')->name('employee.project');
Route::post('update/{project}', 'Employee\EmployeeProjectController@updateProgress')->name('employeeproject.update');
Route::post('done/{project}', 'Employee\EmployeeProjectController@markDone')->name('employee.done');




Route::get('/employee/feedback', 'Employee\EmployeeFeedbackController@index')->name('employee.feedback.index');