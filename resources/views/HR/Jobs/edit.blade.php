{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
 

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Edit Job - {{ $job->title }}</h1>
                <form action="{{ route('jobs.update', $job->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $job->title }}" required>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="4" required>{{ $job->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Requirements</label>
                        <textarea class="form-control @error('requirements') is-invalid @enderror" name="requirements" id="requirements" rows="4" required>{{ $job->requirements }}</textarea>
                        @error('requirements')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="application_deadline">Application Deadline</label>
                        <input type="date" class="form-control @error('application_deadline') is-invalid @enderror" name="application_deadline" id="application_deadline" value="{{ $job->application_deadline }}" required>
                        @error('application_deadline')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update Job</button>
                </form>
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
                        <h3 class="page-title">Edit Job</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Jobs</a></li>
                            <li class="breadcrumb-item active">Edit Jobs</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Edit Job</h4>
                        </div>
                        <div class="card-body">
                            <form  action="{{ route('jobs.update', $job->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Title<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $job->title }}" required placeholder="Title">
                                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Description<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="4"  placeholder="description" required>{{ $job->description }}</textarea>
                                    </div>
                                </div>
								<div class="form-group row" >
                                    <label class="col-form-label col-md-2">Requirements<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <textarea class="form-control @error('requirements') is-invalid @enderror" name="requirements" id="requirements" rows="4" placeholder="requirements" required>{{ $job->requirements }}</textarea>
                                        @error('requirements')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-form-label col-md-2">Application Deadline<span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control @error('application_deadline') is-invalid @enderror" name="application_deadline" id="application_deadline" value="{{ $job->application_deadline }}" required>
                                        @error('application_deadline')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                               
                                <div class="text-right">
									<button type="submit" class="btn btn-primary">Update Job</button>
									{{-- <input type="submit" class="btn btn-primary" value="Edit"/> --}}
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

