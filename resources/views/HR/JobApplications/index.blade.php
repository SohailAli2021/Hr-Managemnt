{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- admin.job_applications.index.blade.php -->

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Job Applications</h1>
                @foreach ($jobApplications as $application)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Applicant: {{ $application->employee->Firstname }}</h5>
                            <p class="card-text">Job: {{ $application->job->title }}</p>
                            <p class="card-text">CV: <a href="{{ asset($application->cv)  }}" target="_blank">View CV</a></p>
                            <p class="card-text">Status: {{ ucfirst($application->status) }}</p>
                            @if ($application->status === 'pending')
                                <form action="{{ route('job_applications.approve', ['application' => $application]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                                <form action="{{ route('job_applications.reject', ['application' => $application]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-link">Reject</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

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
						<h3 class="page-title">All Applicants</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
							<li class="breadcrumb-item active">Applicants</li>
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
									<th>Applicants</th>
				<th>Job</th>
				<th>CV </th>
				<th>Status</th>
				<th>Select Status</th>
									
								</tr>
							</thead>
							<tbody>
                                @foreach ($jobApplications as $application)
								<tr>
                                    <td>
                                    <h2 class="table-avatar">
                                        <a href="" class="avatar"><img alt="" src="{{ asset('images/' . $application->employee->avatar) }}"></a>
                                        <a href="#">{{ $application->employee->Firstname }}</a>
                                    </h2>
                                </td>
									{{-- <td>{{ $application->employee->Firstname }}</td> --}}
									<td>{{ $application->job->title }}</td>
									<td><a href="{{ route('job_applications.cv', ['jobApplication' => $application]) }}" target="_blank">Download CV</a>
									</td>
						<td>{{ ucfirst($application->status) }}</td>
                        <td >
                            <div class="dropdown action-label">
                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-dot-circle-o text-info"></i> Select
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @if ($application->status === 'pending')
                                    <form action="{{ route('job_applications.approve', ['application' => $application]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn  btn-link btn-sm"><i class="fa fa-dot-circle-o text-success"></i>Approved</button>
                                    </form>
                                    
                                    <form action="{{ route('job_applications.reject', ['application' => $application]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn  btn-link btn-sm"><i class="fa fa-dot-circle-o text-danger"></i>Reject</button>
                                    </form>
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




