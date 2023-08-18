{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Salary Slip - Month: {{ date('F', mktime(0, 0, 0, $selectedMonth, 1)) }}</h1>
    <a href="{{ route('additions.download-pdf-report') }}" class="btn btn-primary">Download PDF Salary Slip Report</a>




    <h3>Employee Details:</h3>
    <p>Name: {{ $employee->Firstname }}</p>
    <p>Email: {{ $employee->Email }}</p>
    <p>Designation: {{ $employee->designation->Name }}</p>

    <h3>Salary Breakdown:</h3>
    <p>Basic Salary: {{ $additions->basic_salary }}</p>
    <p>Bonus: {{ $additions->bonus }}</p>
    <p>Allowance: {{ $additions->allowance }}</p>
    <p>Conveyance: {{ $additions->conveyance }}</p>
    <p>Total Salary: {{ $totalSalary }}</p>

    <h3>Deductions:</h3>
    <p>Tax ({{ $deductions->tax_percent }}%): {{ $tax }}</p>
    <p>Fund ({{ $deductions->fund_percent }}%): {{ $fund }}</p>
    <p>Total deductions: {{ $totalDeductions}}</p>
    <h3>Overtime:</h3>
    <p>Overtime Hours: {{ $overtime }}</p>
    <p>Overtime Earnings: {{ $overtime * 150 }} ( 1 hour = 150 rupees)</p>

    <h3>Net Salary: {{ $netSalary }}</h3>
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
						<h3 class="page-title">Payslip</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Payslip</li>
								</ul>
					</div>
					
                    <div class="col-auto">
						<a href="{{ route('additions.download-salary-slip', ['employee' => $employee->id]) }}" class="btn btn-primary"> Download PDF</a>
					</div>
				</div>
			</div>

			
	
	 
			<!-- /Page Header -->
			<div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="payslip-title">Salary Slip - Month: {{ date('F', mktime(0, 0, 0, $selectedMonth, 1)) }}</h4>
                            <div class="row">
                                <div class="col-sm-6 m-b-20">
                                    <img src="{{ asset('images/' . $employee->avatar) }}" class="inv-logo" alt="">
                                    <ul class="list-unstyled mb-0">
                                        <li><h5 class="mb-0">Name: <strong>{{ $employee->Firstname }}</strong></h5></li>
                                        <li>Email: {{ $employee->Email }}</li>
                                        <li>Designation: {{ $employee->designation->Name }}</li>
                                        <li>Email: {{ $employee->start_date }}</li>
                                    </ul>
                                </div>
                               
                            </div>
                           
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>Earnings</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Basic Salary</strong> <span class="float-right">{{ $additions->basic_salary }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Bonus</strong> <span class="float-right">${{ $additions->bonus }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Conveyance</strong> <span class="float-right">{{ $additions->conveyance }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Allowance</strong> <span class="float-right">{{ $additions->allowance }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total Earnings</strong> <span class="float-right"><strong>{{ $totalSalary }}</strong></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>Deductions</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Tax Deducted at Source (T.D.S.)</strong> <span class="float-right">({{ $deductions->tax_percent }}%): {{ $tax }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Provident Fund</strong> <span class="float-right">({{ $deductions->fund_percent }}%): {{ $fund }}</span></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><strong>Total Deductions</strong> <span class="float-right"><strong>{{ $totalDeductions}}</strong></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>Overtimes</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Overtime Hours</strong> <span class="float-right"> {{ $overtime }}</span></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><strong>Overtime Earnings</strong> <span class="float-right"><strong>{{ $overtime * 150 }} ( 1 hour = 150 rupees)</strong></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <h4><strong>Net Salary:  Rs. {{ $netSalary }}</strong></h4>
                                </div>
                            </div>
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
		
    </body>
</html>




