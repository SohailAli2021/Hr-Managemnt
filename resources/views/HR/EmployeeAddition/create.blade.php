







<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dashboard - HR Management</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		
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
                        <h3 class="page-title">Add Salary Additions</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Salary Additions</a></li>
                            <li class="breadcrumb-item active">Add Salary Additions</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Create Salary Additions for {{ $employee->Firstname }}</h4>
                            <P style="color: red">Do not create Salary Additions if you already have</P>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('additions.store', $employee->id) }}" >
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Select Month<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <select name="month" class="form-control" required>
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">Octuber</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Basic Salary<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="number" name="basic_salary" id="basic_salary" class="form-control" required placeholder="Basic Salary">
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Bonus<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="number" name="bonus" id="bonus" class="form-control" required placeholder="Bonus">
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Allowance<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="number" name="allowance" id="allowance" class="form-control" required placeholder="Allowance">
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Conveyance<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="number" name="conveyance" id="conveyance" class="form-control" required placeholder="Conveyance">
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




