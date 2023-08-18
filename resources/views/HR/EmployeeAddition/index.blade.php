{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Employee Salary Addition</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Basic Salary</th>
                <th>Bonus</th>
                <th>Allowance</th>
                <th>Conveyance</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->Firstname }}</td>
                    <td>{{ $employee->additions->sum('basic_salary') }}</td>
                    <td>{{ $employee->additions->sum('bonus') }}</td>
                    <td>{{ $employee->additions->sum('allowance') }}</td>
                    <td>{{ $employee->additions->sum('conveyance') }}</td>
                    <td>
                        <a href="{{ route('additions.create', $employee->id) }}" class="btn btn-primary">Add Additions</a>
                        <a href="{{ route('additions.edit', ['employee' => $employee->id, 'addition' => $employee->additions->first()->id]) }}" class="btn btn-secondary">Edit</a>
                        <a href="{{ route('additions.generate-slip', $employee->id) }}" class="btn btn-success">Generate Slip</a>
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
						<h3 class="page-title">All Employee Salary</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
							<li class="breadcrumb-item active">Employee  Salary</li>
						</ul>
					</div>
					<div class="col-auto">
						<a href="{{  route('additions.download-pdf-report') }}" target="_blank" class="btn btn-primary"> Download PDF</a>
					</div>
					{{-- <div class="col-auto">
						<a href="{{ route('employee.generate.list.pdf') }}" target="_blank" class="btn btn-primary"> Download PDF</a>
					</div> --}}
				
				</div>
			</div>

			
	
	 
			<!-- /Page Header -->
		<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-striped custom-table mb-0 datatable">
							<thead>
								<tr>
                                    <th>Name</th>
                                    <th>Basic Salary</th>
                                    <th>Bonus</th>
                                    <th>Allowance</th>
                                    <th>Conveyance</th>
				<th class="text-right">Actions</th>
									
								</tr>
							</thead>
							<tbody>
								@foreach($employees as $employee)
									<tr>
										<td>
											<h2 class="table-avatar">
												<a href="" class="avatar"><img alt="" src="{{ asset('images/' . $employee->avatar) }}"></a>
												<a href="{{ route('employee.show', $employee->id) }}">{{ $employee->Firstname }}</a>
											</h2>
										</td>
										@if ($employee->additions->count() > 0) 
											<td>{{ $employee->additions->sum('basic_salary') }}</td>
											<td>{{ $employee->additions->sum('bonus') }}</td>
											<td>{{ $employee->additions->sum('allowance') }}</td>
											<td>{{ $employee->additions->sum('conveyance') }}</td>
										@else
											<td>N/A</td>
											<td>N/A</td>
											<td>N/A</td>
											<td>N/A</td>
										@endif
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a href="{{ route('additions.create', $employee->id) }}" class="dropdown-item">Add Addition</a>
													@if ($employee->additions->count() > 0)
														<a href="{{ route('additions.edit', ['employee' => $employee->id, 'addition' => $employee->additions->first()->id]) }}" class="dropdown-item">Edit</a>
														<a href="{{ route('additions.generate-slip', ['employee' => $employee->id]) }}" class="dropdown-item">Generate Slip</a>
													@endif
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
		
		{{-- <a href="{{ route('employee.generate.list.pdf') }}" target="_blank">Download Employee List Report</a> --}}

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




