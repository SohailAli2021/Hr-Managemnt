{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Additions for {{ $employee->Firstname }}</h1>

    <form action="{{ route('additions.update', ['employee' => $employee->id, 'addition' => $addition->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="basic_salary">Basic Salary</label>
            <input type="number" name="basic_salary" id="basic_salary" class="form-control" value="{{ $addition->basic_salary }}" required>
        </div>
        <div class="form-group">
            <label for="bonus">Bonus</label>
            <input type="number" name="bonus" id="bonus" class="form-control" value="{{ $addition->bonus }}" required>
        </div>
        <div class="form-group">
            <label for="allowance">Allowance</label>
            <input type="number" name="allowance" id="allowance" class="form-control" value="{{ $addition->allowance }}" required>
        </div>
        <div class="form-group">
            <label for="conveyance">Conveyance</label>
            <input type="number" name="conveyance" id="conveyance" class="form-control" value="{{ $addition->conveyance }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
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
                        <h3 class="page-title">Edit Salary Additions</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Salary Additions</a></li>
                            <li class="breadcrumb-item active">Edit Salary Additions</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Edit Salary Additions for {{ $employee->Firstname }}</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('additions.update', ['employee' => $employee->id, 'addition' => $addition->id]) }}" >
                                @csrf
                                @method('PUT')
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Bssic Salary<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="number" name="basic_salary" id="basic_salary" class="form-control" value="{{ $addition->basic_salary }}" required>
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Bonus<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="number" name="bonus" id="bonus" class="form-control" value="{{ $addition->bonus }}" required>
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Allowance<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="number" name="allowance" id="allowance" class="form-control" value="{{ $addition->allowance }}" required>
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Conveyance<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="number" name="conveyance" id="conveyance" class="form-control" value="{{ $addition->conveyance }}" required>
                                    </div>
                                </div>
								
                                   
                                
                                <div class="text-right">
									{{-- <input type="hidden" name="hidden_id" value="{{ $deduction->id }}" /> --}}
									<input type="submit" class="btn btn-primary" value="Update"/>
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