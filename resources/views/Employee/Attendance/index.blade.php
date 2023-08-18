
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
        
        @include('emp.partials.style')

        
        
    </head>
    
<body>

@yield('content')
        
<!-- Main Wrapper -->
<div class="main-wrapper">

    @include('emp.partials.nav')

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
                     <div class="row">
                         <div class="col-sm-12">
                             <h3 class="page-title">TimeIn/TimeOut Records</h3>
                             <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                 <li class="breadcrumb-item active">TimeIn/TimeOut Records</li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <!-- /Page Header -->
                 <div class="col-md-6 col-6 text-center">
                    <div class="stats-box">
                        <p style="font-size: 15px">Current Date:</p>
                        <h6 style="font-size: 20px">{{ now()->toDateString() }}</h6>
                    </div>
                </div>

                <div class="col-md-6 col-6 text-center">
                    <div class="stats-box">
                        <br>
                        <p style="font-size: 20px">Mark Attendance</p><br>
                        @if($timeRecord)
                        <div class="text-center">
                            <p style="font-size: 20px">Time In: {{ $timeRecord->time_in }}</p>
                            <br>
                            @if($timeRecord->time_out)
                                <p style="font-size: 20px"> Time Out: {{ $timeRecord->time_out }}</p>
                            @else
                                <form method="post" action="{{ route('employee.attendance.time-out') }}">
                                    @csrf
                                    <div class="punch-btn-section">
                                        <input type="submit" class="btn btn-primary punch-btn" value="Time Out" />
                                    </div>
                                   
                                </form>
                            @endif
                        </div>
                    @else
                        <form method="post" action="{{ route('employee.attendance.time-in') }}">
                            @csrf
                            <div class="punch-btn-section">
                            <input type="submit" class="btn btn-primary punch-btn" value="Time In"/>
                            </div>
                        </form>
                    @endif
                    
                    </div>
                </div>


   
         </div>
         <!-- Page Wrapper -->
        
    
        <!-- /Delete Leave Modal -->
        
    </div>
    <!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->
@include('emp.partials.script')

<script>
function showSuccessAlert(message) {
             Swal.fire({
                 icon: 'success',
                 title: 'Success',
                 text: message,
                 showConfirmButton: false,
                 timer: 2000 // 2 seconds
             });
         }
         function showErrorAlert(message) {
             Swal.fire({
                 icon: 'error',
                 title: 'Error',
                 text: message
             });
         }
     </script>
     
    
     @if(session('success'))
         <script>showSuccessAlert('{{ session('success') }}');</script>
     @endif
     
     @if($errors->any())
         <script>showErrorAlert('{{ $errors->first() }}');</script>
     @endif

    </body>
</html>







