{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Overtime Entry Details</h1>

    <p><strong>Employee:</strong> {{ $overtime->employee->Firstname }}</p>
    <p><strong>Overtime Date:</strong> {{ $overtime->overtime_date }}</p>
    <p><strong>Hours Worked:</strong> {{ $overtime->hours_worked }}</p>
    <p><strong>Cost:</strong> {{ $overtime->cost }}</p>
    <a href="{{ route('overtimes.edit', $overtime->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('overtimes.destroy', $overtime->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</button>
    </form>
</body>
</html>





 --}}

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
                            <h4 class="card-title mb-0">Overtime Entry Details</h4>
                        </div>
                        <div class="card-body">
                            

                            <p><strong>Employee:</strong> {{ $overtime->employee->Firstname }}</p>
                            <p><strong>Employee:</strong> {{ $overtime->employee->Email }}</p>
                            <p><strong>Employee:</strong> {{ $overtime->employee->start_date }}</p>
                            <p><strong>Overtime Date:</strong> {{ $overtime->overtime_date }}</p>
                            <p><strong>Hours Worked:</strong> {{ $overtime->hours_worked }}</p>
                            <p><strong>Cost:</strong> {{ $overtime->cost }}</p>
                            <a href="{{ route('overtimes.edit', $overtime->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('overtimes.destroy', $overtime->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <br>
                             {{-- <br>
                             <br>
                             <a href="{{ route('jobs.index') }}">Back to Jobs</a> --}}
           
        
        </div>			
    </div>
    <!-- /Main Wrapper -->

</div>
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



