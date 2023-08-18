{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- admin.dashboard.blade.php -->
<h1>Welcome, Admin!</h1>

<h2>Leave Requests:</h2>
@foreach ($leaveRequests as $leave)
    <p>
        Employee: {{ $leave->employee->Firstname }}<br>
        Leave Type: {{ ucfirst($leave->leave_type) }}<br>
        Dates: {{ $leave->start_date }} to {{ $leave->end_date }}<br>
        Reason: {{ $leave->reason }}<br>
        Status: {{ $leave->status }}
    </p>
    <form action="{{ route('admin.leave.approve', ['id' => $leave->id]) }}" method="POST">
        @csrf
        <button type="submit">Approve</button>
    </form>
    <form action="{{ route('admin.leave.reject', ['id' => $leave->id]) }}" method="POST">
        @csrf
        <button type="submit">Reject</button>
    </form>
    <hr>
@endforeach

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
						<h3 class="page-title">Leave Requests</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
							<li class="breadcrumb-item active">Leaves</li>
						</ul>
					</div>
					<div class="col-auto">
						<a href="{{ route('leave.generate.pdf') }}" target="_blank" class="btn btn-primary"> Download PDF</a>
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
									<th>Employee</th>
				<th>Leave Type</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Reason</th>
				<th>Status</th>
				<th class="text-right">Action</th>
				<th class="text-right">Action</th>
				<th>No. of Leaves</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($leaveRequests as $leave)
								<tr>
									<td>
										<h2 class="table-avatar">
											<a href="" class="avatar"><img alt="" src="{{ asset('images/' . $leave->employee->avatar) }}"></a>
											<a href="#">{{ $leave->employee->Firstname }}</a>
										</h2>
									</td>
									<td>{{ ucfirst($leave->leave_type) }}</td>
									<td>{{ $leave->start_date }}</td>
									<td>{{ $leave->end_date }}</td>
						<td>{{ $leave->reason }}</td>
						<td> {{ $leave->status }}</td>
						
									
									<td class="text-right">
                                        <form action="{{ route('admin.leave.approve', ['id' => $leave->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                        </td>
                                        </form>
                                        <td class="text-right">
                                        <form action="{{ route('admin.leave.reject', ['id' => $leave->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                        </form>
									</td>
									<td>
										@php
											$leaveCount = $leave->employee->leaves->count();
										@endphp
										{{ $leaveCount }}
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




