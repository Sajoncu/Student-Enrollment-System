@extends('layout')

@section('container')

<div class="row">
            <div class="col-sm-6 col-md-3 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Students</h2>
                  @php
                      $student = 0;
                      $student = DB::table('tbl_student')->count('student_id');
                  @endphp
                  <p style="font-size: 25px; font-weight: bold;text-align: center; font-family: cursive;">{{ $student }}</p>
                </div>
                <div class="dashboard-chart-card-container">
                  <div id="dashboard-card-chart-1" class="card-float-chart"></div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Teachers</h2>
                                    @php
                      $teacher = 0;
                      $teacher = DB::table('tbl_teachers')->count('teacher_id');
                  @endphp
                  <p style="font-size: 25px; font-weight: bold; text-align: center; font-family: cursive;">{{$teacher}}</p>
                </div>
                <div class="dashboard-chart-card-container">
                  <div id="dashboard-card-chart-2" class="card-float-chart"></div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Tution Fee</h2>
                  <p style="font-size: 25px; font-weight: bold; text-align: center; font-family: cursive;">Monthly:2333 taka</p>

                </div>
                <div class="dashboard-chart-card-container">
                  <div id="dashboard-card-chart-3" class="card-float-chart"></div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Revenue</h2>
                </div>
                <div class="dashboard-chart-card-container">
                  <div id="dashboard-card-chart-4" class="card-float-chart"></div>
                </div>
              </div>
            </div>
          </div>
@endsection