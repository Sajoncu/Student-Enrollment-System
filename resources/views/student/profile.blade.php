@extends('student_layout')

@php
	function convert_department($value)
	{
		$values = [
			1 => 'CSE',
			2 => 'EEE',
			3 => 'BBA',
			4 => 'BSTE',
			5 => 'ETE'
		];
		return $values[$value];
	}
@endphp

@section('container')

	<h1 class="page-title">My Profile</h1>
          <div class="row user-profile">
            <div class="col-sm-12 side-left">
              <div class="card mb-8">
                <div class="card-body avatar">
                  <h2 class="card-title">Info</h2>
                  <img src="{{URL::to($singlestudent->student_image)}}" alt="">
                  <p class="name">{{$singlestudent->student_name}}</p>
                  <p class="designation">{{"Roll: ".$singlestudent->student_roll}}</p>
                  <a class="email" href="#">{{$singlestudent->student_email}}</a>
                  <a class="number" href="#">{{$singlestudent->student_phone}}</a>
                </div>
              </div>
              <div class="card mb-8" style="margin-top:20px">
                <div class="card-body overview">
                  <ul class="achivements">
                    <li><p>34</p><p>Total Credit</p></li>
                    <li><p>23</p><p>Credit Complete</p></li>
                    <li><p>29</p><p>Due</p></li>
                  </ul>
                  <div class="wrapper about-user">
                    <h2 class="card-title mt-4 mb-3">About</h2>
                    <p>Student Information are given bellow.</p>
                  </div>
                  <div class="info-links">
                    <a class="website">
                      <i class="icon-globe icon">Father's Name:</i>
                      <span>{{$singlestudent->student_fathersname}}</span>
                    </a>
                    <a class="social-link">
                      <i class="icon-social-facebook icon">Mother's Name:</i>
                      <span>{{$singlestudent->student_mothersname}}</span>
                    </a>
                    <a class="social-link">
                      <i class="icon-social-linkedin icon">Address:</i>
                      <span>{{$singlestudent->student_address}}</span>
                    </a>                    
                    <a class="social-link">
                      <i class="icon-social-linkedin icon">Department:</i>
                      <span>{{convert_department($singlestudent->student_department)}}</span>
                    </a>                    
                    <a class="social-link">
                      <i class="icon-social-linkedin icon">Admissionyear:</i>
                      <span>{{$singlestudent->student_admissionyear}}</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection