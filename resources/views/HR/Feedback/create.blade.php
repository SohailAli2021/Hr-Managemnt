 {{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h2>Give Feedback to {{ $employee->Firstname }}</h2>

    <form method="POST" action="{{ route('admin.employee.feedback.store', ['employee' => $employee]) }}">
        @csrf

        <h3>Employee: {{ $employee->Firstname }}</h3>
        
        <h4>Projects:</h4>
        <ul>
            @foreach($projects as $project)
                <li>{{ $project->name }}  : {{ $project->progress }}%</li>
               
            @endforeach
        </ul>

        <h4>Attendance:</h4>
        <ul>
            @php
                $presentDaysCount = $attendances->count(); // Count present days
            @endphp
            <li>Present Days: {{ $presentDaysCount }}</li>
            @foreach($attendances as $attendanceRecord)
                <li>{{ $attendanceRecord->date }}</li>
            @endforeach
        </ul>

        <!-- Rating dropdowns for project, attendance, and team feedback -->
        <label for="project_rating">Project Rating:</label>
        <select name="project_rating" id="project_rating">
            <option value="good">Good</option>
            <option value="poor">Poor</option>
            <option value="excellent">Excellent</option>
        </select>

        <label for="attendance_rating">Attendance Rating:</label>
        <select name="attendance_rating" id="attendance_rating">
            <option value="good">Good</option>
            <option value="poor">Poor</option>
            <option value="excellent">Excellent</option>
        </select>

        <label for="team_feedback_rating">Team Feedback Rating:</label>
        <select name="team_feedback_rating" id="team_feedback_rating">
            <option value="good">Good</option>
            <option value="poor">Poor</option>
            <option value="excellent">Excellent</option>
        </select>


        <label for="comments">Month:</label>
        <input type="text" name="month" id="month">
        <!-- Textarea for comments -->
        <label for="comments">Comments:</label>
        <textarea name="comments" id="comments" rows="4"></textarea>

        <button type="submit">Submit Feedback</button>
    </form>


    
    
</body>
</html> --}}






<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Dashboard - HR Management</title>
		
        @include('admin.partials.style')

		
		
    </head>
	
    <body>
        

        @yield('content')
		<!-- Main Wrapper -->
        

<!-- Main Wrapper -->
<div class="main-wrapper">
    @include('admin.partials.nav')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
    
        <div class="content container-fluid">
        
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Feedback Employee</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Feedback</a></li>
                            <li class="breadcrumb-item active">Feedback Employee</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Give Feedback to {{ $employee->Firstname }}</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.employee.feedback.store', $employee->id) }}" enctype="multipart/form-data">
                                @csrf
                                <h4>Projects:</h4>
                                <ul>
                                    @foreach($projects as $project)
                                        <li>{{ $project->name }}  : {{ $project->progress }}%</li>
                                    @endforeach
                                </ul>
                                <h4>Attendance:</h4>
                                <ul>
                                    @php
                                        $presentDaysCount = $attendances->count(); // Count present days
                                    @endphp
                                    <li>Present Days: {{ $presentDaysCount }}</li>
                                    @foreach($attendances as $attendanceRecord)
                                        <li>{{ $attendanceRecord->date }}</li>
                                    @endforeach
                                </ul>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2" for="project_rating">Project Rating<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <select name="project_rating" id="project_rating" class="form-control">
                                            <option value="good">Good</option>
                                            <option value="poor">Poor</option>
                                            <option value="excellent">Excellent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2" for="attendance_rating">Attendance Rating<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <select name="attendance_rating" id="attendance_rating" class="form-control" required>
                                                <option value="good">Good</option>
                                                <option value="poor">Poor</option>
                                                <option value="excellent">Excellent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2" for="team_feedback_rating">Team Feedback Rating<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <select name="team_feedback_rating" id="team_feedback_rating"class="form-control" required>
                                                <option value="good">Good</option>
                                                <option value="poor">Poor</option>
                                                <option value="excellent">Excellent</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Month<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="text"  name="month" id="month" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Comment<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="comments" id="comments" rows="4" required  ></textarea>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <input type="submit" class="btn btn-primary" value="Submit Feedback"/>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        
        </div>			
    </div>
    <!-- /Main Wrapper -->

</div>
<!-- /Main Wrapper -->
<!-- /Main Wrapper -->
        
		
			
			
			
        
		
        @include('admin.partials.script')
        <script>
            // Function to display SweetAlert success message
            // function showSuccessAlert(message) {
            //     Swal.fire({
            //         icon: 'success',
            //         title: 'Success',
            //         text: message,
            //         showConfirmButton: false,
            //         timer: 2000 // 2 seconds
            //     });
            // }
        
            // Function to display SweetAlert error message
            function showErrorAlert(message) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: message
                });
            }
        
            // Check for the presence of success message in the session
            const successMessage = '{{ session('success') }}';
            if (successMessage) {
                showSuccessAlert(successMessage);
            }
        </script>
    </body>
</html>




