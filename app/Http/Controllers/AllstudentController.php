<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Session;
use DB;
session_start();


class AllstudentController extends Controller
{
    public function allstudent(){

        $allstudent_info = DB::table('tbl_student')->get();
        $namage_student = view('admin.allstudent')->with('allstudent_info',$allstudent_info);
        return view('layout')->with('allstudent',$namage_student);
    }

    //delete a specific student from student table
    public function deletestudent($delid){
    	DB::table('tbl_student')
    	->where('student_id',$delid)
    	->delete();
    	Session::flash('success','Student Deleted Successfully!!!!');
    	return Redirect::to('/allstudent');
    }

    //Edit student function
    public function editstudent($studentid){
        $allstudent_info = DB::table('tbl_student')
        ->where('student_id', $studentid)
        ->first();
        $namage_student = view('admin.editstudent')->with('singlestudent',$allstudent_info);
        return view('layout')->with('editstudent',$namage_student);
    }

    //update method are here
    public function update_student(Request $request, $studentid){

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


        $update = DB::table('tbl_student')
            ->where('student_id', $studentid)
            ->update($data);
        if ($update) {
            Session::flash('success','Student updateded Successfully!!!');
            return Redirect::to('/allstudent');           
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
    public function viewstudent($studentid){
        $allstudent_info = DB::table('tbl_student')
        ->where('student_id', $studentid)
        ->first();
        $namage_student = view('admin.viewstudent')->with('singlestudent',$allstudent_info);
        return view('layout')->with('viewstudent',$namage_student);
    }






    // $student = DB::table('tbl_student')
    //         ->where('student_id', $studentid)
    //         ->get();
    //     $manage_student = view('admin.viewstudent')->with('single_student', $student);

    //     return view('layout')->with('viewstudent', $manage_student);

    public function studentlogin(Request $request){

        $email = $request->student_email;
        $password = $request->student_password;
        $result = DB::table('tbl_student')
            ->where('student_email',$email)
            ->where('student_password', $password)
            ->first();
        if ($result) {
            Session::put('student_email',$result->student_email);
            Session::put('student_id',$result->student_id);
            Session::put('student_name',$result->student_name);
            Session::put('student_image',$result->student_image);
            Session::put('student_department',$result->student_department);
            return Redirect::to('/student_dashboard');
        } else {
            Session::flash('error','Email or Password does not match!!!');
            return Redirect::to('/');
        }        
    } 
    public function student_dashboard() {
        return view('student.studentdashboard');
    }

    //student logout
    public function studentlogout(){
        Session::put('student_name', null);
        Session::put('student_id', null);
        Session::put('student_email', null);
        Session::put('student_image', null);
        return Redirect::to('/');  
    }

    //profile method
    public function studentprofile($studentid){
        $allstudent_info = DB::table('tbl_student')
        ->where('student_id', $studentid)
        ->first();
        $namage_student = view('student.profile')->with('singlestudent',$allstudent_info);
        return view('student_layout')->with('profile',$namage_student);        
    }

    //student settings
    public function student_settings($studentid){

        $student_info = DB::table('tbl_student')
        ->where('student_id', $studentid)
        ->first();
        $manage_student = view('student.studentsettings')->with('singlestudent', $student_info);
        return view('student_layout')->with('studentsettings', $manage_student);
    }

    //update student profile
    public function update_student_profile(Request $request, $studentid){
        $data = array();
        $data['student_password'] = $request->student_password;
        $data['student_email'] = $request->student_email;
        $data['student_phone'] = $request->student_phone;

        $result = DB::table('tbl_student')->where('student_id', $studentid)
        ->update($data);
        if($result){
            Session::flash('success', 'Your profile updated Successfully!!!');
            return Redirect::to('/student_settings/'.$studentid);
        } else {
            Session::flash('error', 'Your profile not updated!!!');
            return Redirect::to('/student_settings/'.$studentid);
        }
    }
}
