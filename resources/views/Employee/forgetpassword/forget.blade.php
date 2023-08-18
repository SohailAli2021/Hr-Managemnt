{{-- <!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->

</head>

@if($errors->any())
    @foreach ($errors->all() as $error)
    <p style ="color: red" >{{$error}}</p>
    @endforeach
@endif


<body class="h-100">
<div class="authincation h-100">
<div class="container-fluid h-100">
<div class="row justify-content-center h-100 align-items-center">
<div class="col-md-6  ">
<div class="authincation-content">
<div class="row no-gutters">
<div class="col-xl-12">
<div class="auth-form">



@if(Session::has('error'))
<p class="text-danger">{{Session::get('error')}}</a>
@endif

@if(Session::has('success'))
<p class="text-green">{{Session::get('success')}}</a>
@endif

<form action="{{route('forgetpassword')}}" method="post">

@csrf
<div class="form-group">

@if($errors->has('email'))
<label><strong>{{$errors->first('email')}}</strong></label>
@endif

<input type="email" class="form-control" value="" name="email" placeholder="Enter Your Email">

</div>

    
<div class="text-center">
 <button type="submit"  class="btn btn-primary btn-block">forget password</button>
</div>
<br>
<div class="form-group">
    <a href="/" class="btn btn-primary btn btn-primary btn-block">Login</a>
</div>
</form>
                                    

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>



</body>

</html> --}}




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
                                    <form action="{{route('forgetpassword')}}" method="post">
                                    @csrf
                                        <div class="form-group">
                                            
                                       @if($errors->has('email'))
                                       <label><strong>{{$errors->first('email')}}</strong></label>
                                       @endif
                                            <input type="email" class="form-control" value="" name="email" placeholder="Enter Your Email">
                                        </div>
                                        
                                        <button type="submit"  class="btn btn-primary btn-block">Send Mail</button>
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