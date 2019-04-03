<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ETEController extends Controller
{
    public function ete(){
    	$ete_student = DB::table('tbl_student')
    	->where(['student_department' => 5])
    	->get();

    	$ete = view('admin.ete')
    			->with('ete_student_info',$ete_student);
    	return view('layout')
    			->with('ete',$ete);
    	return view('admin.ete');
    }
}
