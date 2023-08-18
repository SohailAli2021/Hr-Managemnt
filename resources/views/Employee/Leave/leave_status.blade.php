{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <h1>Welcome, {{ Auth::user()->Firstname }}!</h1>

    <h2>Your Leave Requests:</h2>
    @if ($leaveRequests->isEmpty())
        <p>No leave requests found.</p>
    @else
        <ul>
            @foreach ($leaveRequests as $leave)
                <li>
                    Leave Type: {{ ucfirst($leave->leave_type) }}<br>
                    Dates: {{ $leave->start_date }} to {{ $leave->end_date }}<br>
                    Reason: {{ $leave->reason }}<br>
                    Status: {{ $leave->status }}
                </li>
            @endforeach
        </ul>
    @endif

    <h2>Request Leave:</h2>
    <form action="{{ route('employee.requestleave.submit') }}" method="POST">
        @csrf
        <div>
            <label for="leave_type">Leave Type:</label>
            <select name="leave_type" id="leave_type">
                <option value="casual">Casual</option>
                <option value="maternity">Maternity</option>
                <option value="sick">Sick</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div>
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" required>
        </div>
        <div>
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" required>
        </div>
        <div>
            <label for="reason">Reason:</label>
            <textarea name="reason" id="reason" rows="4" required></textarea>
        </div>
        <button type="submit">Submit Leave Request</button>
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
        <title>Dashboard - HR Management</title>
		
        @include('emp.partials.style')

		
		
    </head>
	
    <body>
        

        @yield('content')
		<!-- Main Wrapper -->
        
<!-- Main Wrapper -->
<!-- Main Wrapper -->
<div class="main-wrapper">
    @include('emp.partials.nav')
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
                        <h3 class="page-title">Leave Application</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Leave</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Leave Detail</h4>
                        </div>
                        <div class="card-body">
                            @if ($leaveRequests->isEmpty())
                            <p>No leave requests found.</p>
                                @else
                                <ul>
                                    @foreach ($leaveRequests as $leave)
                                        <li>
                                            Leave Type: {{ ucfirst($leave->leave_type) }}<br>
                                            Dates: {{ $leave->start_date }} to {{ $leave->end_date }}<br>
                                            Reason: {{ $leave->reason }}<br>
                                            Status: {{ $leave->status }} 
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
           
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">New Leave</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('employee.requestleave.submit') }}" method="POST">
                                @csrf
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Start Date<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="date" name="start_date" id="start_date" required class="form-control">
                                    </div>
                                </div>
                                
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">End Date<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="date" name="end_date" id="end_date" required class="form-control">
                                    </div>
                                </div>
                               
                              
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Leave Reason<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="reason" id="reason" rows="4" required placeholder="Reason" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label name="leave_type" id="leave_type" class="col-form-label col-md-2">Leave Type<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <select class="from-control"name="leave_type" id="leave_type">
                                            <option value="">------------Select Leave-----------</option>
                                            <option value="casual">Casual</option>
                                             <option value="maternity">Maternity</option>
                                             <option value="sick">Sick</option>
                                             <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="text-right">
                                    {{-- <input type="submit" class="btn btn-primary" value="Submit Leave Request"/> --}}
                                    <button type="submit"class="btn btn-primary">Submit Leave Request</button>
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
        
		
			
			
			
        
		
        @include('emp.partials.script')
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






