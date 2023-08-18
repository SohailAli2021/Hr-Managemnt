{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Edit Project Assignment</h2>

    <form action="{{ route('admin.updateAssign', $project->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="project_name">Project Name:</label>
            <input type="text" name="project_name" id="project_name" class="form-control" required value="{{ $project->name }}">
        </div>
        <div class="form-group">
            <label for="deadline">Deadline:</label>
            <input type="date" name="deadline" id="deadline" class="form-control" required value="{{ $project->deadline }}">
        </div>
        <div class="form-group">
            <label for="employee">Assign to Employee:</label>
            <select name="employee" id="employee" class="form-control">
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $project->employee_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->Firstname }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Assignment</button>
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
                        <h3 class="page-title">Edit Project</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Project</a></li>
                            <li class="breadcrumb-item active">Edit Project</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Edit Project</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.updateAssign', $project->id) }}" >
                             
                                @csrf
                                <div class="form-group">
                                    <label for="project_name">Project Name:</label>
                                    <input type="text" name="project_name" id="project_name" class="form-control" required value="{{ $project->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="deadline">Deadline:</label>
                                    <input type="date" name="deadline" id="deadline" class="form-control" required value="{{ $project->deadline }}">
                                </div>
                                <div class="form-group">
                                    <label for="employee">Assign to Employee:</label>
                                    <select name="employee" id="employee" class="form-control">
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}" {{ $project->employee_id == $employee->id ? 'selected' : '' }}>
                                                {{ $employee->Firstname }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Update Assignment</button>
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
    </body>
</html>