<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BBAController extends Controller
{
    public function bba(){
    	$bba_student = DB::table('tbl_student')
    	->where(['student_department' => 3])
    	->get();

    	$bba = view('admin.bba')
    			->with('bba_student_info',$bba_student);
    	return view('layout')
    			->with('bba',$bba);
    	return view('admin.bba');
    }
}
