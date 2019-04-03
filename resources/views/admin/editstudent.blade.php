@extends('layout')
@section('container')


    <div class="col-lg-12 mb-4">
      <div class="card">
        <div class="card-body">
         <!--  {{-- success message --}}
          @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
              <strong>Sussecc:</strong> {{  Session::get('success') }}
            </div>
          @endif -->
          
          <h2 class="card-title">Add A New Student</h2>
          <form class="cmxform" enctype="multipart/form-data" id="signupForm" method="post" action="{{ URL::to('/update_student', $singlestudent->student_id )}}">
            {{csrf_field()}}
            <fieldset>
              <div class="form-group">
                <label for="student_name">Student Name</label>
                <input id="student_name" class="form-control" value="{{ $singlestudent->student_name }}" name="student_name" type="text">
              </div>
              <div class="form-group">
                <label for="student_roll">Student Roll</label>
                <input id="student_roll" class="form-control" value="{{ $singlestudent->student_roll }}" name="student_roll" type="text">
              </div>              
              <div class="form-group">
                <label for="student_fathersname">Father's Name</label>
                <input id="student_fathersname" class="form-control" value="{{ $singlestudent->student_fathersname }}" name="student_fathersname" type="text">
              </div>
              <div class="form-group">
                <label for="student_mothersname">Mother's Name</label>
                <input id="student_mothersname" class="form-control" value="{{ $singlestudent->student_mothersname }}" name="student_mothersname" type="text">
              </div>
              <div class="form-group">
                <label for="student_email">Student Email</label>
                <input id="student_email" class="form-control" value="{{ $singlestudent->student_email }}" name="student_email" type="email">
              </div>
              <div class="form-group">
                <label for="student_password">Student Password</label>
                <input id="student_password" class="form-control" value="{{ $singlestudent->student_password }}" name="student_password" type="password">
              </div>
              <div class="form-group">
                <label for="student_phone">Student Phone</label>
                <input id="student_phone" class="form-control" value="{{ $singlestudent->student_phone }}" name="student_phone" type="number">
              </div>              
              {{-- <div class="form-group">
                  <label>Upload Image</label>
                  <div class="row">
                    <div class="col-12">
                      <label for="exampleInputFile2" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-upload btn-label btn-label-left"></i>Browse</label>
                      <input type="file" name="student_image" class="form-control-file" id="exampleInputFile2" aria-describedby="fileHelp">
                      <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                    </div>
                  </div>
              </div>  --}}             
              <div class="form-group">
                <label for="department">Department</label>
                <select name="student_department" class="form-control" id="department">
                    <option value="1">CSE</option>
                    <option value="2">EEE</option>
                    <option value="3">BBA</option>
                    <option value="4">BSTE</option>
                    <option value="5">ETE</option>
                </select>
              </div>              
              <div class="form-group">
                <label for="student_address">Student Address</label>
                <textarea name="student_address" id="student_address" cols="30" rows="10" class="form-control">{{ $singlestudent->student_address }}</textarea>
              </div>
              <div class="form-group">
                <label for="student_admissionyear">Addmission Year</label>
                <input type="date" class="form-control" id="student_admissionyear" value="{{ $singlestudent->student_admissionyear }}" name="student_admissionyear">
              </div>
              <input class="btn btn-primary" type="submit" value="Submit">
            </fieldset>
          </form>
        </div>
      </div>
    </div>


@endsection