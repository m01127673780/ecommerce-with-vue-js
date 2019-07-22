<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
 
class AdminAuth extends Controller
{
     public function login ()
    {
    	return view('admin.login'); 
    } 
    public function dologin (){
     	$rememberme = request('rememberme') == 1 ?true:false; 
    	if (auth()->guard('admin')->attempt(['email'=> Request('email'),'password'=> Request('password')],$rememberme))
    	{
    	return redirect('admin'); 
    	} else{
    		session()->flash('error', trans('admin.inccorrect_information_login'));
    		    	return redirect('admin/login'); 
    	}
    }
    public function logout(){
    	 auth()->guard('admin')->logout();
    	     		    	return redirect('admin/login'); 

    }
 }