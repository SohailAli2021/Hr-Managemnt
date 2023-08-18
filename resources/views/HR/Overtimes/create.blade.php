{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create Overtime Entry</h1>

    <form action="{{ route('overtimes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="employee_id">Employee</label>
            <select name="employee_id" id="employee_id" class="form-control">
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->Firstname }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="overtime_date">Overtime Date</label>
            <input type="date" name="overtime_date" id="overtime_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="hours_worked">Hours Worked</label>
            <input type="number" name="hours_worked" id="hours_worked" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</body> --}}
{{-- </html> --}}











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
                        <h3 class="page-title">Add Create Overtime Entry</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Create Overtime Entry</a></li>
                            <li class="breadcrumb-item active">Add Create Overtime Entry</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Create Overtime Entry</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('overtimes.store') }}" >
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Select Employee<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <select name="employee_id" id="employee_id" class="form-control">
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->Firstname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Overtime Date<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="date" name="overtime_date" id="overtime_date" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Hours Worked<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="number" name="hours_worked" id="hours_worked" class="form-control" >
                                    </div>
                                </div>

                                <div class="text-right">
                                    <input type="submit" class="btn btn-primary" value="Submit"/>
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




