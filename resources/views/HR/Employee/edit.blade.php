



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
                            <li class="breadcrumb-item active">Edit Employee</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Edit Employee</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('employee.update', $emp->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Firstname<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="text" name="Firstname" class="form-control" value="{{ $emp->Firstname}}" placeholder="Firstname">
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Email<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="text" name="Email" class="form-control" value="{{$emp->Email}}" placeholder="Email">
                                    </div>
                                </div>
								<div class="form-group row" >
                                    <label class="col-form-label col-md-2">Start Date<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="date" name="start_date" class="form-control" placeholder="start date" value="{{ $emp->start_date}}" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Avatar<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
										<input type="file" name="avatar" class="form-control"/>
					                     <br />
					                    <img src="{{ asset('images/' . $emp->avatar) }}" width="100" class="img-thumbnail" />
					                    <input type="hidden" name="hidden_image" value="{{$emp->avatar}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Department<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <select name="department" class="from-control">
											<option>{{$emp->department->DepName}}</option>
											@foreach ($dept as $departments)
											<option value="{{$departments->id}}"{{$departments->id == $emp->department_id ?"selected":""}}
											  >{{$departments->DepName}}</option>										
											@endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Designation<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
										<select name="designation" class="from-control">
											<option>{{$emp->designation->Name}}</option>
											@foreach ($deg as $designations)
											<option value="{{$designations->id}}"{{$designations->id == $emp->designation_id ?"selected":""}}
											  >{{$designations->Name}}</option>											
											@endforeach
                                        </select>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-form-label col-md-2">Status<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
										<select name="emp_status" class="from-control">
											<option>{{$emp->emp_status->status}}</option>
											@foreach ($emp_status as $statuses)
											<option value="{{$statuses->id}}"{{$statuses->id == $emp->emp_status_id ?"selected":""}}
											  >{{$statuses->status}}</option>											
											@endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Job Status<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <select name="job_status" class="form-control">
                                           
                                            <option value="active" {{ $emp->job_status === 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ $emp->job_status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                            <option value="resigned" {{ $emp->job_status === 'resigned' ? 'selected' : '' }}>Resigned</option>
                                            <option value="terminated" {{ $emp->job_status === 'terminated' ? 'selected' : '' }}>Terminated</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">UserType<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <select name="user" class="from-control">
											<option>{{$emp->user->usertype}}</option>
											@foreach ($user as $users)
											<option value="{{$users->id}}"{{$users->id == $emp->user_id ?"selected":""}}
											  >{{$users->usertype}}</option>											
											@endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="text-right">
									<input type="hidden" name="hidden_id" value="{{ $emp->id }}" />
									<input type="submit" class="btn btn-primary" value="Edit"/>
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
    </body>
</html>