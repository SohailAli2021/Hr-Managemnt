{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Trainers List</h2>

    <table>
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainers as $trainer)
                <tr>
                    <td>{{ $trainer->employee->Firstname }}</td>
                    <td>{{ $trainer->description }}</td>
                    <td>
                        <a href="{{ route('trainers.edit', $trainer->id) }}">Edit</a>
                        <form action="{{ route('trainers.destroy', $trainer->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this trainer?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Assign Employee as Trainer</h2>
    <form action="{{ route('trainers.store') }}" method="POST">
        @csrf
        
        <label for="employee_id">Select Employee:</label>
        <select name="employee_id" id="employee_id">
            @foreach ($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->Firstname }}</option>
            @endforeach
        </select>
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4"></textarea>
        <button type="submit">Assign as Trainer</button>
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
                        <h3 class="page-title">Trainers</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create New Trainers</li>
                        </ul>
                    </div>
                </div>
            </div>

       	<!-- /Page Header -->
		<div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>Trainer</th>
            <th>Description</th>
           
            <th class="text-right">Actions</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainers as $trainer)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="" class="avatar"><img alt="" src="{{ asset('images/' . $trainer->employee->avatar) }}"></a>
                                        <a href="#">{{ $trainer->employee->Firstname }}</a>
                                    </h2>
                                </td>
                                <td>{{ $trainer->description }}</td>
                                
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            {{-- <a href="{{ route('employee.show', $row->id) }}" class="dropdown-item"   data-target="#edit_leave"><i class="fa fa-eye m-r-5"></i>View</a> --}}
                                            <a href="{{ route('trainers.edit', $trainer->id) }}" class="dropdown-item"   data-target="#edit_leave">Edit</a>
                                            <a href="#" class="dropdown-item" onclick="handleDelete({{ $trainer->id}})">Delete</a>
                                            <!-- Delete Form -->
                                            <form id="deleteForm_{{ $trainer->id }}" action="{{ route('trainers.destroy', $trainer->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
   <br>
   <br>
   <br>
    <!-- /Page Content -->
           
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0"> Assign Employee as Trainer</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('trainers.store') }}" method="POST">
                                @csrf
                               
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Employee<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <select  name="employee_id" id="employee_id" class="from-control">
                                            <option value="">------------Select Employee-----------</option>
                                            @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->Firstname }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Description<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" id="description" name="description" rows="4" required placeholder="Description" ></textarea>
                                    </div>
                                </div>
                                <div class="text-right">
                                    {{-- <input type="submit" class="btn btn-primary" value="Submit Leave Request"/> --}}
                                    <button type="submit"class="btn btn-primary">Assign as Trainer</button>
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
