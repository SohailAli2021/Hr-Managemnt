{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

    <div class="training-sessions-list">
        <h2>Training Sessions List</h2>

        <table>
            <thead>
                <tr>
                    <th>Training Type</th>
                    <th>Trainer</th>
                    <th>Employees</th>
                    <th>Number of Employees</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trainings as $training)
                    <tr>
                        <td>{{ $training->trainingType->title }}</td>
                        <td>{{ $training->trainer->employee->Firstname }}</td>
                        <td>
                            <ul>
                                @foreach ($training->employees as $employee)
                                    <li>{{ $employee->Firstname }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $training->num_of_employees }}</td>
                        <td>{{ $training->status }}</td>
                        <td>
                            <a href="{{ route('trainings.edit', $training->id) }}">Edit</a>
                            <form action="{{ route('trainings.destroy', $training->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
                        <h3 class="page-title">Training Sessions List</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Training Sessions List</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
						<a href="{{ route('trainings.create') }}" class="btn add-btn"  data-target="#add_leave"><i class="fa fa-plus"></i> Add Trainings</a>
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
                                <th>Training Type</th>
                                <th>Trainer</th>
                                <th>Employees</th>
                                <th>Number of Employees</th>
                                <th>Status</th>
                              
           
            <th class="text-right">Actions</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainings as $training)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="" class="avatar"><img alt="" src="{{ asset('images/' . $training->trainer->employee->avatar) }}"></a>
                                        <a href="#">{{ $training->trainer->employee->Firstname }}</a>
                                    </h2>
                                </td>
                                <td>{{ $training->trainingType->title }}</td>
                                <td>
                                    <ul>
                                        @foreach ($training->employees as $employee)
                                            <li>{{ $employee->Firstname }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ $training->num_of_employees }}</td>
                        <td>{{ $training->status }}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            {{-- <a href="{{ route('employee.show', $row->id) }}" class="dropdown-item"   data-target="#edit_leave"><i class="fa fa-eye m-r-5"></i>View</a> --}}
                                            <a href="{{ route('trainings.edit', $training->id) }}" class="dropdown-item"   data-target="#edit_leave">Edit</a>
                                            <a href="#" class="dropdown-item" onclick="handleDelete({{ $training->id}})">Delete</a>
                                            <!-- Delete Form -->
                                            <form id="deleteForm_{{ $training->id }}" action="{{ route('trainings.destroy', $training->id) }}" method="post">
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
