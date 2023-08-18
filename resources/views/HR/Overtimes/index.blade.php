{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Overtime Entries</h1>

    <a href="{{ route('overtimes.create') }}" class="btn btn-primary">Create Overtime Entry</a>

    <table class="table">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Overtime Date</th>
                <th>Hours Worked</th>
                <th>Cost</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($overtimes as $overtime)
                <tr>
                    <td>{{ $overtime->employee->Firstname }}</td>
                    <td>{{ $overtime->overtime_date }}</td>
                    <td>{{ $overtime->hours_worked }}</td>
                    <td>{{ $overtime->cost }}</td>
                    <td>
                        <a href="{{ route('overtimes.edit', $overtime->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('overtimes.destroy', $overtime->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
<div class="main-wrapper">

	@include('admin.partials.nav')

	<!-- Page Wrapper -->
	<div class="page-wrapper">
		<!-- Page Content -->

		<div class="content container-fluid">
			@if(session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif
		
			<!-- Page Header -->
			<div class="page-header">
				<div class="row align-items-center">
					<div class="col">
						<h3 class="page-title">All Employees Overtime</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
							<li class="breadcrumb-item active">Employees Overtime</li>
						</ul>
					</div>
                				
					<div class="col-auto float-right ml-auto">
						<a href="{{ route('overtimes.create') }}"  class="btn add-btn"  data-target="#add_leave"><i class="fa fa-plus"></i> Add Overtime Entry</a>
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
                                    <th>Employee Name</th>
                                    <th>Overtime Date</th>
                                    <th>Hours Worked</th>
                                    <th>Cost</th>
				<th class="text-right">Actions</th>
									
								</tr>
							</thead>
							<tbody>
                                @foreach ($overtimes as $overtime)
								<tr>
									<td>
										<h2 class="table-avatar">
											<a href="" class="avatar"><img alt="" src="{{ asset('images/' . $overtime->employee->avatar) }}"></a>
											<a href="{{ route('employee.show', $overtime->employee->id) }}">{{ $overtime->employee->Firstname }}</a>
										</h2>
									</td>
                                    {{-- <td>{{ $overtime->employee->Firstname }}</td> --}}
                                    <td>{{ $overtime->overtime_date }}</td>
                                    <td>{{ $overtime->hours_worked }}</td>
                                    <td>{{ $overtime->cost }}</td>
						{{-- <td>{{ ucfirst($row->job_status) }}</td> --}}
									
									<td class="text-right">
										<div class="dropdown dropdown-action">
											<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
											<div class="dropdown-menu dropdown-menu-right">
												{{-- <a href="{{ route('employee.show', $row->id) }}" class="dropdown-item"   data-target="#edit_leave"><i class="fa fa-eye m-r-5"></i>View</a> --}}
								                <a href="{{ route('overtimes.edit', $overtime->id) }}" class="dropdown-item"   data-target="#edit_leave">Edit</a>
                                                <a href="{{ route('overtimes.show', $overtime->id) }}" class="dropdown-item"   data-target="#edit_leave">Show</a>
												<a href="#" class="dropdown-item" onclick="handleDelete({{ $overtime->id }})">Delete</a>
												<!-- Delete Form -->
												<form id="deleteForm_{{ $overtime->id }}" action="{{ route('overtimes.destroy', $overtime->id) }}" method="post">
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
		</div>
		<!-- /Page Content -->
		
	

		<!-- /Delete Leave Modal -->
		
	</div>
	<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->
        
		
			
			
			
        
		
        @include('admin.partials.script')
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




