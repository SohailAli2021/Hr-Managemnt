


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
                        <h3 class="page-title">Add Employee</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Employee</a></li>
                            <li class="breadcrumb-item active">Add Employee</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">New Employee</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('employee.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Firstname<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="text" name="Firstname" class="form-control" placeholder="Firstname">
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Email<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="text" name="Email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Joining Date<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="date" name="start_date" class="form-control" placeholder="start date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Avatar<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="avatar" type="file">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Department<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <select name="department" class="from-control">
                                            <option value="">------------Select Department-----------</option>
                                            @foreach ($emp as $emp)
                                            <option value="{{$emp->id}}">{{$emp->DepName}}</option>  
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Designation<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <select name="designation" class="from-control">
                                            <option value="">------------Select Designation-----------</option>
                                            @foreach ($deg as $degs)
                                            <option value="{{$degs->id}}">{{$degs->Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Status<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <select name="emp_status" class="from-control">
                                            <option value="">------------Select Status-----------</option>
                                            @foreach ($emp_status as $statuses)
                                            <option value="{{$statuses->id}}">{{$statuses->status}}</option>  
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label name="job_status" id="job_status" class="col-form-label col-md-2">Job Status<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <select name="job_status" class="form-control">
                                        <option value="">------------Select Job Status-----------</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="resigned">Resigned</option>
                                        <option value="terminated">Terminated</option>
                                    </select>
                                    </div>
                                </div>
                            
                                
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">UserType<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <select name="user" class="from-control">
                                            <option value="">------------Select User Type-----------</option>
                                            @foreach ($user as $users)
                                            <option value="{{$users->id}}">{{$users->usertype}}</option>
                                            @endforeach
                                        </select>
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




