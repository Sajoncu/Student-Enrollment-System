<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class AdminController extends Controller
{
	public function admin_dashboard() {
		return view('admin.dashboard');
	}

    //login method
    public function login_dashboard(Request $request){

    	echo $email = $request->admin_email;
    	echo $password = $request->admin_password;
    	$result = DB::table('tbl_admin')
    		->where('admin_email',$email)
    		->where('admin_password', $password)
    		->first();
    	if ($result) {
    		Session::put('admin_email',$result->admin_email);
    		Session::put('admin_id',$result->admin_id);
    		Session::put('admin_name',$result->admin_name);
    		return Redirect::to('/admin_dashboard');
    	} else {
    		return Redirect::to('/backend');
    	}
    	// return view('admin.dashboard');
    }

    //admin logout method
    public function admin_logout(){
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/backend');
    }

    //profile view function
    public function viewProfile(){
        return view('admin.profile');
    }
    //setting view function and update password or profile here
    public function setting(){
        return view('admin.setting');
    }    
}
