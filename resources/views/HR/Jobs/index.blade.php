
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/HR/Jobs/index.blade.php -->


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>All Jobs</h1>
                <ul class="list-group">
                    @foreach($jobs as $job)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a>
                            <div>
                                <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4">
                <h2>Create a New Job</h2>
                <form action="{{ route('jobs.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="requirements">Requirements</label>
                        <textarea class="form-control" id="requirements" name="requirements" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="application_deadline">Application Deadline</label>
                        <input type="date" class="form-control" id="application_deadline" name="application_deadline" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Job</button>
                </form>
            </div>
        </div>
    </div>


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

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">All Jobs</h4>
                        </div>
                        <div class="card-body">
                            @if ($jobs->isEmpty())
                            <p>No Jobs found.</p>
                                @else
                                  <ul class="list-group">
                    @foreach($jobs as $job)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('jobs.show', $job->id) }}" style="color: black; font-size: 25px">{{ $job->title }}</a>
                           
                            <div>
                                <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                                <a  class="btn btn-sm btn-primary mr-2" onclick="handleDelete({{ $job->id }})">Delete</a>
                                <form id="deleteForm_{{ $job->id }}" action="{{ route('jobs.destroy', $job->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <button type="submit" class="btn btn-sm btn-danger">Delete</button> --}}
                                </form>
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
                            <h4 class="card-title mb-0"> Create A New Job</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('jobs.store') }}" method="POST">
                                @csrf
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Title<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="title" name="title" required class="form-control" placeholder="Title">
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Description<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" id="description" name="description" rows="4" required placeholder="Description" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Requirements<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" id="requirements" name="requirements" rows="4" required placeholder="Requirements" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Application Deadline<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control" id="application_deadline" name="application_deadline" required placeholder="Deadline">
                                    </div>
                                </div>
                               
                                <div class="text-right">
                                    {{-- <input type="submit" class="btn btn-primary" value="Submit Leave Request"/> --}}
                                    <button type="submit"class="btn btn-primary">Create Job</button>
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






