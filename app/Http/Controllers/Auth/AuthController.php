<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\PasswordReset;
use App\Mail\ForgetPasswordMail;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{
    //
    public function showRegister(){
        return view('auth.register');
    }

    public function postRegister(Request $request){
        $request->validate([
            'name'=>'required',
         
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        return redirect('/');
        
    }

    public function showlogin(){
        return view('auth.login');
    }
    
    public function postlogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
         
        ]);
  
        $credentials=$request->only('email','password');
        if(Auth::attempt($credentials))
        {
          if(Auth::user()->usertype == '1'){
            return redirect('adminindex');
          }
          else{
            return redirect('empindex');
          }
        }
        else
        {
            return redirect('/')->with('success','Either Email or Password did not match, Please Try again');
        }
    }



    public function forgetpasswordload()
    {
        return view('Employee.forgetpassword.forget');
    }


public function forgetpassword(Request $request)
{
    $user = user::getEmailSingle($request->email);
    if(!empty($user))
    {
        $user->remember_token=Str::random(30);
        $user->save();
        Mail::to($user->email)->send(new ForgetPasswordMail($user));
       
        return redirect()->back()->with('success', ' Please Check Your Email And reset your Password');

    }
    else
    {
      return redirect()->back()->with('error', 'Email not found');
    }
}

public function resetpasswordload($remember_token)
{
    $user =User::getTokenSingle($remember_token);
    if(!empty($user))
    {
      $data['user'] = $user;
      return view('Employee.forgetpassword.resetpassword' , $data);
    }
    else
    {
        abort(404);
    }
}

public function resetpassword($token ,Request $request)
{
  if($request->password == $request->password_confirmation)
  {
    $user =User::getTokenSingle($token);
    $user->password=Hash::make($request->password);
    $user->remember_token=Str::random(30); 
    $user->save(); 
    return redirect(url('/'))->with('success', 'Passowrd Changed Successfully');
  }
  else
  {
    return redirect()->back()->with('error', 'Passowrd Not Match');
  }


}



    public function logout(){
        \Session::flush();
        \Auth::logout();
        return redirect('/');
    }

 
}