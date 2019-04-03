<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class BSTEController extends Controller
{
    public function bste(){
    	$bste_student = DB::table('tbl_student')
    	->where(['student_department' => 4])
    	->get();

    	$bste = view('admin.ete')
    			->with('ete_student_info',$bste_student);
    	return view('layout')
    			->with('bste',$bste);
    	return view('admin.bste');
    }
}
