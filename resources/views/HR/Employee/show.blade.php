{{-- 
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    
        
    <br>
    <br>
    <br>
   
    <div class="container">
      <div class="row">
       <div class="col-sm">
         <h1 class="jumbotron bg-dark text-center text-white">Department Detail</h1>
         
         <table class="table table-bordered table-striped table-hover">
           <thead>
             
               <tr>
                   <th>ID</th>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Image</th>
                   <th>Department Name</th>
                   <th>Designation Name</th>
                   <th>Usertype</th>
                   
                 
               </tr>
           </thead>
           <tbody>
              
             
             
             
             <tr>
               <td>{{$emp['id']}}</td>
               <td>{{$emp['Firstname']}}</td>
               <td>{{$emp['Email']}}</td>
               <td>{{$emp['avatar']}}</td>
               <td>{{$emp['DepName']}}</td>
               <td>{{$emp['Name']}}</td>
               <td>{{$emp['usertype']}}</td>
               <td></td>
               <td></td>
              
              </tr>
<td> 
              <form action="{{action('App\Http\Controllers\HR\EmployeeController@destroy', $emp['id'])}}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" value="Delete" class="btn btn-danger" alert()>
                </form>
              </td>
           </tbody>
         </table>
       </div>
       </div>   
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
<div class="main-wrapper">

	@include('admin.partials.nav')

	<!-- Page Wrapper -->
	<div class="page-wrapper">
		<!-- Page Content -->
		<div class="content container-fluid">
		

		<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-striped custom-table mb-0 datatable">
							<thead>
								<tr>
                  <tr>
                    
      	<th>Name</th>
				<th>Email</th>
				<th>Start Date</th>
				<th>Department Name</th>
				<th>Designation Name</th>
				<th>Status</th>
				<th>Job Status</th>
				<th>UserType</th>
			
                </tr>
							</thead>
							<tbody>
							
								<tr>
                 <td>
										<h2 class="table-avatar">
											<a href="" class="avatar"><img alt="" src="{{ asset('images/' . $emp['avatar']) }}"></a>
											<a href="#">{{ $emp['Firstname']}}<span>{{ $emp['Name']}}</span></a>
										</h2>
									</td>
									<td>{{$emp['Email']}}</td>
									<td>{{$emp['start_date']}}</td>
									<td>{{$emp->department->DepName}}</td>
						<td>{{$emp->designation->Name}}</td>
            <td>{{$emp->emp_status->status}}</td>
						<td>{{$emp['job_status']}}</td>
					
						<td>{{$emp->user->usertype}}</td>
								</tr>
							
						</tbody>
						</table>

            <a href="{{ route('employee.generate.pdf', ['employee' => $emp]) }}" target="_blank">Generate PDF</a>
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




