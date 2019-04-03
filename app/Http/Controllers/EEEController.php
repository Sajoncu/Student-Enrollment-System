<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

class EEEController extends Controller
{
    public function eee(){
    	$eee_student = DB::table('tbl_student')
    	->where(['student_department' => 2])
    	->get();

    	$eee = view('admin.eee')
    			->with('eee_student_info',$eee_student);
    	return view('layout')
    			->with('eee',$eee);
    	return view('admin.eee');
    }
}
