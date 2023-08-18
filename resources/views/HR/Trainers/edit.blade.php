{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Edit Trainer</h2>
    <form action="{{ route('trainers.update', $trainer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="employee_id">Select Employee:</label>
        <select name="employee_id" id="employee_id">
            @foreach ($employees as $employee)
                <option value="{{ $employee->id }}" {{ $employee->id === $trainer->employee_id ? 'selected' : '' }}>
                    {{ $employee->Firstname }}
                </option>
            @endforeach
        </select>

        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4">{{ $trainer->description }}</textarea>

        <button type="submit">Update Trainer</button>
    </form>

    <form action="{{ route('trainers.destroy', $trainer->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this trainer?')">Delete Trainer</button>
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
                        <h3 class="page-title">Jobs</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Post New Job</li>
                        </ul>
                    </div>
                </div>
            </div>

       	<!-- /Page Header -->
	
    <!-- /Page Content -->
           
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0"> Edit Employee as Trainer</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('trainers.update', $trainer->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Employee<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <select  name="employee_id" id="employee_id" class="from-control">
                                            <option value="">------------Select Employee-----------</option>
                                            @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}" {{ $employee->id === $trainer->employee_id ? 'selected' : '' }}>
                                                {{ $employee->Firstname }}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Description<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" id="description" name="description" rows="4" required placeholder="Description" >{{ $trainer->description }}</textarea>
                                        
                                    </div>
                                </div>
                                <div class="text-right">
                                    {{-- <input type="submit" class="btn btn-primary" value="Submit Leave Request"/> --}}
                                    <button type="submit"class="btn btn-primary">Update Trainer</button>
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
