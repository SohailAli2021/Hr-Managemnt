



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
                     <div class="row">
                         <div class="col-sm-12">
                             <h3 class="page-title">Attendance Records</h3>
                             <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                 <li class="breadcrumb-item active">Attendance Records</li>
                             </ul>
                         </div>
                         <div class="col-auto float-right ml-auto">
                            <a href="{{ route('attendance.generate.pdf', ['id' => $employee->id]) }}" target="_blank" class="btn btn-primary" > Download PDF</a>
                        </div>
                     </div>
                 </div>
                 <!-- /Page Header -->
                 @if($employee->attendances->isEmpty())
                 <p>No attendance records found.</p>
             @else
               
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="table-responsive">
                             <table class="table table-striped custom-table table-nowrap mb-0">
                                 <thead>
                                     <tr>
                                         <th>Employee</th>
                                         <th>Date</th>
                                         <th>Status</th>
                                         
                                     </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($employee->attendances as $record)
                                     <tr>
                                         <td>
                                             <h2 class="table-avatar">
                                                 <a href="" class="avatar"><img alt="" src="{{ asset('images/' . $employee->avatar) }}"></a>
                                                 <a href="#">{{ $employee->Firstname }}<span>{{ $employee->designation->Name }}</span></a>
                                             </h2>
                                         </td>
                                         <td>{{ $record->date }}</td>
                                         <td>{{ $record->status }}</td>
                                     
                                     </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                             @endif
                             <br>
                             <br>
                             <br>
                             <a href="{{ route('attendance.index') }}">Back to Attendance</a>
                         </div>
                     </div>
                 </div>
             </div>
         
             <!-- /Page Content -->
             
         
             
         </div>
         <!-- Page Wrapper -->
        
    
        <!-- /Delete Leave Modal -->
        
    </div>
    <!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->
@include('admin.partials.script')

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





