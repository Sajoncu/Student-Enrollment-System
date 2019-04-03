<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use DB;
use Session;
session_start();

class TeachersController extends Controller
{
    //show add student page
    public function add_teachers() {
        return view('admin.addteacher');
    }
    
    //add teacher to database
    public function saveteacher(Request $request){
    	$permited  = array('jpg', 'jpeg', 'png', 'gif');
        $data = array();
        $data['teacher_name'] = $request->teacher_name;
        $data['teacher_email'] = $request->teacher_email;
        $data['teacher_phone'] = $request->teacher_phone;
        $data['teacher_password'] = $request->teacher_password;
        $data['teacher_department'] = $request->teacher_department;
        $data['student_address'] = $request->student_address;
        // $data['student_fathersname'] = $request->student_fathersname;
        // $data['student_mothersname'] = $request->student_mothersname;
        // $data['student_email'] = $request->student_email;
        //$data['student_admissionyear'] = $request->student_admissionyear;
        //$image = $request->file('student_image');
       // $data['student_image'] = $image;
        $image = time().'.'.request()->teacher_image->getClientOriginalExtension();
        $div = explode('.', $image);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "images/".$unique_image;
        
        if (empty($image)) {
            Session::flash('success','Image must be inserted!!!');
        } elseif (in_array($file_ext, $permited) === false) {
            Session::flash('success','You can upload only:-'.implode(', ', $permited));
        } else {
            $move = request()->teacher_image->move(public_path('images'), $unique_image);
                if ($move) {
                    $data['teacher_image'] = $uploaded_image;
                    DB::table('tbl_teachers')->insert($data);
                    Session::flash('success','Teacher added successfully!!!!');
                    return Redirect::to('/addteachers');
                } else {
                    Session::flash('success','Something worng!!!');
                    return Redirect::to('/addteachers');
                }
            }

       }

    public function allteacher(){

        $allteacger_info = DB::table('tbl_teachers')->get();
        $namage_teacher = view('admin.allteacher')->with('allteacher_info',$allteacger_info);
        return view('layout')->with('allteacher',$namage_teacher);
    }

 //delete a specific student from student table
    public function deleteteacher($delid){
    	DB::table('tbl_teachers')
    	->where('teacher_id',$delid)
    	->delete();
    	Session::flash('success','Teacher Deleted Successfully!!!!');
    	return Redirect::to('/allteacher');
    }

    //Edit student function
    public function editteacher($teacherid){
        $allteacher_info = DB::table('tbl_teachers')
        ->where('teacher_id', $teacherid)
        ->first();
        $namage_teacher = view('admin.editteacher')->with('singleteacher',$allteacher_info);
        return view('layout')->with('editteacher',$namage_teacher);
    }

    //update method are here
    public function update_teacher(Request $request, $teacherid){

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $data = array();
        $data['teacher_name'] = $request->teacher_name;
        $data['teacher_email'] = $request->teacher_email;
        $data['teacher_phone'] = $request->teacher_phone;
        $data['teacher_password'] = $request->teacher_password;
        $data['teacher_department'] = $request->teacher_department;
        $data['teacher_address'] = $request->teacher_address;


        $update = DB::table('tbl_teachers')
            ->where('teacher_id', $teacherid)
            ->update($data);
        if ($update) {
            Session::flash('success','Teacher updateded Successfully!!!');
            return Redirect::to('/allteacher');           
        }
        //$image = $request->file('student_image');
       // $data['student_image'] = $image;
        // $image = time().'.'.request()->student_image->getClientOriginalExtension();
        // $div = explode('.', $image);
        // $file_ext = strtolower(end($div));
        // $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        // $uploaded_image = "images/".$unique_image;
        
        // if (empty($image)) {
        //     Session::flash('success','Image must be inserted!!!');
        // } elseif (in_array($file_ext, $permited) === false) {
        //     Session::flash('success','You can upload only:-'.implode(', ', $permited));
        // } else {
        //     $move = request()->student_image->move(public_path('images'), $unique_image);
        //         if ($move) {
                    // $data['student_image'] = $uploaded_image;
                    // DB::table('tbl_student')->up($data);
                    // Session::flash('success','Ok');
                    // return Redirect::to('/allstudent');
            //     } else {
            //         Session::flash('success','Something worng!!!');
            //         return Redirect::to('/addstudents');
            //     }
            // }

    }


    //show a specife student info method here
    public function viewteacher($teacherid){
        $allteacher_info = DB::table('tbl_teachers')
        ->where('teacher_id', $teacherid)
        ->first();
        $namage_teacher = view('admin.viewteacher')->with('singlestudent',$allteacher_info);
        return view('layout')->with('viewteacher',$namage_teacher);
    }    
}
