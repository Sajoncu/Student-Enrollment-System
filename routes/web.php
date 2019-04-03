<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//**************************admin login part**************************
Route::get('/', function () {
    return view('student_login');
});

//**************************admin logout part**************************
Route::get('/logout','AdminController@admin_logout');


Route::get('/backend', function () {
    return view('admin.admin_login');
});

//**************************Admin login**************************
Route::post('/adminlogin','AdminController@login_dashboard');
Route::get('/admin_dashboard','AdminController@admin_dashboard');

//**************************student login**************************
Route::post('/studentlogin','AllstudentController@studentlogin');
Route::get('/student_dashboard','AllstudentController@student_dashboard');

//******************STUDENT LOGOUT**************************
Route::get('/studentlogout','AllstudentController@studentlogout');

//**************************student**************************
Route::get('/addstudents','AddstudentController@add_students');//redirect add student page
Route::post('/savestudent','AddstudentController@savestudent');// save student information to database
Route::get('/allstudent','AllstudentController@allstudent');
Route::get('/viewstudent/{student_id}','AllstudentController@viewstudent');
Route::get('/student_delete/{student_id}','AllstudentController@deletestudent');
Route::get('/student_edit/{student_id}','AllstudentController@editstudent');
Route::post('//update_student/{student_id}','AllstudentController@update_student');
Route::get('/view_profile','AdminController@viewProfile');
Route::get('/setting','AdminController@setting');
Route::get('/student_profile/{student_id}','AllstudentController@studentprofile');
Route::get('/student_settings/{student_id}','AllstudentController@student_settings');
Route::post('/update_student_profile/{student_id}','AllstudentController@update_student_profile');

//**************************teacher route**************************
Route::get('/addteachers','TeachersController@add_teachers');
Route::post('/saveteacher','TeachersController@saveteacher');
Route::get('/allteacher','TeachersController@allteacher');
Route::get('/viewstudent/{teacher_id}','TeachersController@viewteacher');
Route::get('/teacher_delete/{teacher_id}','TeachersController@deleteteacher');
Route::get('/teacher_edit/{student_id}','TeachersController@editteacher');
Route::post('//update_teacher/{teacher_id}','TeachersController@update_teacher');
Route::get('/view_profile','TeachersController@viewProfile');

//**************************all department route**************************
Route::get('/CSE','CSEController@cse');
Route::get('/BBA','BBAController@bba');
Route::get('/EEE','EEEController@eee');
Route::get('/BSTE','BSTEController@bste');
Route::get('/ETE','ETEController@ete');

