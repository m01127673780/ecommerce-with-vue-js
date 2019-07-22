<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Mail\AdminResetPassword;
use DB;
use Carbon\Carbon;
class AdminAuth extends Controller
{
     public function login ()
    {
    	return view('admin.login'); 
    } 
    public function dologin (){
     	$rememberme = request('rememberme') == 1 ?true:false; 
    	if (admin()->attempt(['email'=> Request('email'),'password'=> Request('password')],$rememberme))
    	{
    	return redirect('admin'); 
    	} else{
    		session()->flash('error', trans('admin.inccorrect_information_login'));
    		    	return redirect(aurl('login'))  ; 
    	}
    }
    public function logout(){
    	 auth()->guard('admin')->logout();
    	     		    	return redirect(aurl('login'))  ; 

    }
    public function forgot_password()
    {
      return  view('admin.forgot_password');	
    }
    public function forgot_password_post ()
    {
 	$admin = Admin::where('email' ,request('email'))->first();
 	if(!empty($admin))
 	 {
 	 	$token = app('auth.password.broker')->createToken($admin);
 	 $data = DB::table('password_resets')->insert([
 	 	'email' => $admin->email,
 	 	'token' => $token,
 	 	'created_at' => Carbon::now(),
 	 ]); 
 	 	return new  AdminResetPassword(['data'=>$admin,'token'=>$token]);

 	  }
 	  return back();
    }
 }