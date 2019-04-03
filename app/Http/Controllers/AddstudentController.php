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

class AddstudentController extends Controller
{
    //show add student page
    public function add_students() {
        return view('admin.addstudent');
    }
    
    //add student to database
    public function savestudent(Request $request){
    	$permited  = array('jpg', 'jpeg', 'png', 'gif');
        $data = array();
        $data['student_name'] = $request->student_name;
        $data['student_roll'] = $request->student_roll;
        $data['student_fathersname'] = $request->student_fathersname;
        $data['student_mothersname'] = $request->student_mothersname;
        $data['student_email'] = $request->student_email;
        $data['student_phone'] = $request->student_phone;
        $data['student_password'] = $request->student_password;
        $data['student_admissionyear'] = $request->student_admissionyear;
        $data['student_department'] = $request->student_department;
        $data['student_address'] = $request->student_address;
        //$image = $request->file('student_image');
       // $data['student_image'] = $image;
        $image = time().'.'.request()->student_image->getClientOriginalExtension();
        $div = explode('.', $image);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "images/".$unique_image;
        
        if (empty($image)) {
            Session::flash('success','Image must be inserted!!!');
        } elseif (in_array($file_ext, $permited) === false) {
            Session::flash('success','You can upload only:-'.implode(', ', $permited));
        } else {
            $move = request()->student_image->move(public_path('images'), $unique_image);
                if ($move) {
                    $data['student_image'] = $uploaded_image;
                    DB::table('tbl_student')->insert($data);
                    Session::flash('success','Ok');
                    return Redirect::to('/addstudents');
                } else {
                    Session::flash('success','Something worng!!!');
                    return Redirect::to('/addstudents');
                }
            }

       }
}
