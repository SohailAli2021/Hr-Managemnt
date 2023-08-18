

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    @include('Admin.partials.style')
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Enter Your Email</h4>
                                    @if(Session::has('error'))
                                    <p class="text-danger">{{Session::get('error')}}</a>
                                    @endif
                                    @if(Session::has('success'))
                                    <p class="text-danger">{{Session::get('success')}}</a>
                                    @endif
                                    <form action="" method="post">
                                    @csrf
                                       
                                            
                                            <div class="form-group">
                                                <label><strong> New Password</strong></label>
                                                <input type="password" class="form-control" name="password" placeholder="Passoword">
                                             </div>
                                                
                                                <div class="form-group">
                                                <label><strong> Confirm Password</strong></label>
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                                </div>
                                        
                                        <button type="submit"  class="btn btn-primary btn-block">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


  @include('Admin.partials.script')

</body>

</html>