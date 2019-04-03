@extends('layout')
@section('container')


@extends('layout')
@section('container')


          <h1 class="page-title">All students</h1>
                    {{-- success message --}}
          @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
              <strong>Sussecc:</strong> {{  Session::get('success') }}
            </div>
          @endif
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <table id="order-listing" class="table table-striped" style="width:100%;">
                    <thead>
                      <tr>
                          <th>St-Roll</th>
                          <th>St-Name</th>
                          <th>Phone</th>
                          <th>Image</th>
                          <th width="5%">Department</th>
                          <th>Address</th>
                          <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    	@foreach ($allteacher_info as $value)
                    		{{-- expr --}}
                    	
                      <tr>
                          <td>{{ $value->teacher_id }}</td>
                          <td>{{ $value->teacher_name }}</td>
                          <td>{{ $value->teacher_phone }}</td>
                          <td><img src="{{ URL::to($value->teacher_image) }}" height="50" width="50"  alt=""></td>
                          <td>
                          	
                          	@if ($value->teacher_department == 1)
                          		<span class="label label-success">{{ 'CSE' }}</span>
                          	@elseif($value->student_department == 2)
                          		<span class="label label-success">{{ 'EEE' }}</span>
                          	@elseif($value->student_department == 3)
                          		<span class="label label-success">{{ 'BBA' }}</span>
                          	@elseif($value->student_department == 4)
                          		<span class="label label-success">{{ 'BSTE' }}</span>
                          	@elseif($value->student_department == 5)
                          		<span class="label label-success">{{ 'ETE' }}</span>
                          	@else
                          		<span class="label label-success">{{ 'Not Defined' }}</span>
                          	@endif

                          </td>
                          <td>{{ $value->teacher_address }}</td>
                          <td>
                            <a href="{{ URL::to('/viewteacher/'.$value->teacher_id)}}"><button class="btn btn-outline-primary">View</button></a>&nbsp;&nbsp;
                            <a href="{{ URL::to('/teacher_edit/'.$value->teacher_id)}}"><button class="btn btn-outline-success">Edit</button></a>&nbsp;&nbsp;
                            <a href="{{ URL::to('/teacher_delete/'.$value->teacher_id)}}" id="delete"><button class="btn btn-outline-danger">Delete</button></a>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>



@endsection



@endsection
