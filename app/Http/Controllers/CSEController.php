<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CSEController extends Controller
{
   	public function cse(){
    	$cse_student = DB::table('tbl_student')
    	->where(['student_department' => 1])
    	->get();

    	$cse = view('admin.cse')
    			->with('cse_student_info',$cse_student);
    	return view('layout')
    			->with('cse',$cse);
    	return view('admin.cse');
    }
}
