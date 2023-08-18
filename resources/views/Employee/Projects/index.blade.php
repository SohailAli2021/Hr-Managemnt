{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Assigned Projects</h3>
    @foreach($assignedProjects as $project)
        <div>
            <h4>{{ $project->name }}</h4>
            <p>Deadline: {{ $project->deadline }}</p>
            <p>Progress: {{ $project->progress }}%</p>
            <form action="{{ route('employeeproject.update', $project->id) }}" method="POST">
                @csrf
                <label for="progress">Update Progress:</label>
                <input type="number" name="progress" id="progress" min="0" max="100" value="{{ $project->progress }}">
                <button type="submit">Update</button>
            </form>
            @if ($project->progress >= 100)
                <form action="{{ route('employee.done', $project->id) }}" method="POST">
                    @csrf
                    <button type="submit">Mark as Done</button>
                </form>
            @endif
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

                            @foreach($assignedProjects as $project)
        <div>
            <h3>Project Name:{{ $project->name }}</h3>
            <h4>Deadline: {{ $project->deadline }}</h4>
            <h4>Progress: {{ $project->progress }}%</h4>
            <form action="{{ route('employeeproject.update', $project->id) }}" method="POST">
                @csrf
                <label for="progress">Update Progress:</label>
                <input type="number" name="progress" id="progress" min="0" max="100" value="{{ $project->progress }}">
                <button type="submit" class="btn btn-primary">Update</button>
               <br>
                        
            </form>
            @if ($project->progress >= 100)
                <form action="{{ route('employee.done', $project->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-primary">Mark as Done</button>
                </form>

                <br>
                <br>
            @endif
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