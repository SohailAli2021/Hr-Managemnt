


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
                        <h3 class="page-title">Add Training Type</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Training Type</a></li>
                            <li class="breadcrumb-item active">Add Training Type</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">New Training Type</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('trainingtype.store') }}" >
                                @csrf
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Title<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="text" name="title" class="form-control" placeholder="Title">
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Description<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="text" name="description" class="form-control" placeholder="Description">
                                    </div>
                                </div>
                           
                            <div class="form-group row" >
                                <label class="col-form-label col-md-2">Price<span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" name="price" class="form-control" placeholder="Price">
                                </div>
                            </div>
                            <div class="form-group row" >
                                <label class="col-form-label col-md-2">Start Date<span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="date" name="start_date" class="form-control" placeholder="Start Date">
                                </div>
                            </div>
                        
                        <div class="form-group row" >
                            <label class="col-form-label col-md-2">End Date<span class="text-danger">*</span></label>
                            <div class="col-md-10">
                                <input type="date" name="end_date" class="form-control" placeholder="End Date">
                            </div>
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




