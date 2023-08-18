<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Dashboard - Employee Management</title>
		
        @include('emp.partials.style')

		
		
    </head>
	
    <body>
        @yield('content')
		<!-- Main Wrapper -->
        <div class="main-wrapper">
            <div class="page-wrapper">

        @include('emp.partials.nav')
		
     <br>
     
     <br>
    
        @include('emp.partials.welcomeemp')
		
      
        </div>
        </div>
		<!-- /Main Wrapper -->
		
        @include('emp.partials.script')
    </body>
</html>