
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
                        <h3 class="page-title">Add Designation</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Designation</a></li>
                            <li class="breadcrumb-item active">Edit Designation</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Edit Designation</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('designation.update', $designation->id) }}" >
                                @csrf
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Name<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="text" name="name" class="form-control" value="{{ $designation->Name}}" placeholder="Name">
                                    </div>
                                </div>
                            
								
                                   
                                
                                <div class="text-right">
									<input type="hidden" name="hidden_id" value="{{ $designation->id }}" />
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