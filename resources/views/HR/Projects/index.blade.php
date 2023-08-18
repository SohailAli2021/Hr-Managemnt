{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   


    <h2>Assign Project to Employee</h2>

    <form action="{{ route('admin.assign') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="project_name">Project Name:</label>
            <input type="text" name="project_name" id="project_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="deadline">Deadline:</label>
            <input type="date" name="deadline" id="deadline" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="employee">Assign to Employee:</label>
            <select name="employee" id="employee" class="form-control" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->Firstname }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Assign Project</button>
    </form>
    

    <h3>Project Progress</h3>
    @foreach($projects as $project)
        <div>
            <h4>{{ $project->name }}</h4>
            <p>Assigned to: {{ $project->employee->Firstname }}</p>
            <p>Name: {{ $project->name }}</p>
            <p>Deadline: {{ $project->deadline }}</p>
            <p>Progress: {{ $project->progress }}%</p>
            <a href="{{ route('admin.editAssign', $project->id) }}">Edit Assignment</a>
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dashboard - HR Management</title>
		
        @include('admin.partials.style')

		
		
    </head>
	
    <body>
        

        @yield('content')
		<!-- Main Wrapper -->
        
<!-- Main Wrapper -->
<!-- Main Wrapper -->
<div class="main-wrapper">
    @include('admin.partials.nav')
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
                        <h3 class="page-title">Projects</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Assign New Project</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">All Assigned Projects</h4>
                        </div>
                        <div class="card-body">
                            @if ($projects->isEmpty())
                            <p>No Projects Assigned.</p>
                                @else
                                  <ul class="list-group">
                                    @foreach($projects as $project)
                                   
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('projects.show', $project->id) }}" style="color: black; font-size: 25px">{{ $project->name }}</a>
                           
                            <div>
                                <a href="{{ route('admin.editAssign', $project->id) }}"class="btn btn-sm btn-primary mr-2">Edit</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
           
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0"> Create A New Project</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.assign') }}" method="POST">
                                @csrf
                               
                                    <div class="form-group row">
                                        <div class="col-md-10">
                                        <label for="project_name" class="col-form-label col-md-2">Project Name:<span class="text-danger">*</span></label>
                                        <input type="text" name="project_name" id="project_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-10">
                                        <label for="deadline" class="col-form-label col-md-2">Deadline:<span class="text-danger">*</span></label>
                                        <input type="date" name="deadline" id="deadline" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="employee">Assign to Employee:<span class="text-danger">*</span></label>
                                        
                                        <select name="employee" id="employee" class="form-control" required>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->Firstname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                <div class="text-right">
                                    {{-- <input type="submit" class="btn btn-primary" value="Submit Leave Request"/> --}}
                                    <button type="submit" class="btn btn-primary">Assign Project</button>
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
        		<script>
                    // Function to handle delete action with SweetAlert
                    function handleDelete(id) {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: 'You will not be able to recover this record!',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, delete it!',
                            cancelButtonText: 'No, cancel!',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // If user confirms, submit the delete form
                                document.getElementById('deleteForm_' + id).submit();
                            }
                        });
                    }
                </script>
    </body>
</html>






