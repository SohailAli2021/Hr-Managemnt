



{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
  
    <h1>File Manager</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="{{ route('fileupload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="file" name="file" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    @if($files->count() > 0)
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Size</th>
                <th>Mime Type</th>
                
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($files as $file)
                <tr>
                    <td>{{ $file->Name }}</td>
                    <td>{{ $file->Size }} bytes</td>
                    <td>{{ $file->Mime_type }}</td>
                    
                    <td>
                        <form action="{{ route('filedelete', $file) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this file?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $files->links() }}
    @else
        <p>No files uploaded yet.</p>
    @endif

    
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
                        <h3 class="page-title">All Files</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Files</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">All Files</h4>
                        </div>
                        <div class="card-body">
                            @if($files->count() > 0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Size</th>
                                    <th>Mime Type</th>
                                    
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($files as $file)
                                    <tr>
                                        <td>{{ $file->Name }}</td>
                                        <td>{{ $file->Size }} bytes</td>
                                        <td>{{ $file->Mime_type }}</td>
                                        
                                        <td>
                                            <form action="{{ route('filedelete', $file) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this file?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $files->links() }}
                        @else
                            <p>No files uploaded yet.</p>
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
                            <h4 class="card-title mb-0"> Upload File</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('fileupload') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Choose File<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="file" name="file" class="form-control">
                                    </div>
                                </div>
                                
                               
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Upload</button>
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






