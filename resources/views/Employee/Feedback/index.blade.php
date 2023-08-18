{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    {{-- <h2>Your Feedback</h2>
    @if ($variable)
    
    @foreach($feedback as $feedbackItem)
    <div>
        <h3>Feedback Date: {{ $feedbackItem->created_at }}</h3>
        <p>Project Rating: {{ $feedbackItem->project_rating }}</p>
        <p>Attendance Rating: {{ $feedbackItem->attendance_rating }}</p>
        <p>Team Feedback Rating: {{ $feedbackItem->team_feedback_rating }}</p>
        <p>Comments: {{ $feedbackItem->comments }}</p>
    </div>
@endforeach


@else
    <p>No data available.</p>
@endif
    --}}


    {{-- @foreach($feedback as $feedbackItem)
    <div>
        <h3>By Admin</h3>
        <h3>Feedback Date: {{ $feedbackItem->created_at }}</h3>
        <p>Project Rating: {{ $feedbackItem->project_rating }}</p>
        <p>Attendance Rating: {{ $feedbackItem->attendance_rating }}</p>
        <p>Team Feedback Rating: {{ $feedbackItem->team_feedback_rating }}</p>
        <p>Comments: {{ $feedbackItem->comments }}</p>
    </div>
@endforeach

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
		
        @include('emp.partials.style')

		
		
    </head>
	
    <body>
        

        @yield('content')
		<!-- Main Wrapper -->
        
<!-- Main Wrapper -->
<!-- Main Wrapper -->
<div class="main-wrapper">
    @include('emp.partials.nav')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
    
        <div class="content container-fluid">
            @if(session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif
        
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Your Feedback</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Feedbacks</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Feedbacks</h4>
                        </div>
                        <div class="card-body">

                            @foreach($feedback as $feedbackItem)
                            <div>
                                <h3>By Admin</h3>
                                <h3>Feedback Date: {{ $feedbackItem->created_at }}</h3>
                                <p>Project Rating: {{ $feedbackItem->project_rating }}</p>
                                <p>Attendance Rating: {{ $feedbackItem->attendance_rating }}</p>
                                <p>Team Feedback Rating: {{ $feedbackItem->team_feedback_rating }}</p>
                                <p>Comments: {{ $feedbackItem->comments }}</p>
                            </div>
                        @endforeach
                          
                            
                        </div>
                    </div>
                
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <br>
                             <br>
                             <br>
                             {{-- <a href="{{ route('jobs.index') }}">Back to Jobs</a> --}}
           
        
        </div>			
    </div>
    <!-- /Main Wrapper -->

</div>
<!-- /Main Wrapper -->
        @include('emp.partials.script')
        <script>
            // Function to display SweetAlert success message
            function showSuccessAlert(message) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: message,
                    showConfirmButton: false,
                    timer: 2000 // 2 seconds
                });
            }
        
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