<link rel="stylesheet" href="/css/teacher/teacher.css">

@extends('teacher.layout.dashboard')
@section('dashboard_content')



<!-- <a href="{{route('student.showcart')}}" class="btn btn-primary">Selected Students</a>
&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="{{route('student.createcourse')}}" class="btn btn-success">Create Course</a> -->

<table class="table table-striped">
  <thead>
    <tr>
     
      <th scope="col">Name</th>
      <th scope="col">Section</th>
      <th scope="col">Time</th>
      <th scope="col">Capacity</th>
      <th scope="col">Enrolled Student</th>
      <th scope="col"></th>
      <th scope="col">Action</th>
      <th scope="col"></th>
    
    </tr>
  </thead>
  <tbody>

  @foreach($data as $data)

    <tr>
      
      <td>{{$data->name}}</td>
      <td>{{$data->section}}</td>
      <td>{{$data->time}}</td>
      <td>{{$data->capacity}}</td>
      <td>{{$data->fillup}}</td>
      <td><a href="{{route('course.addstudent',['id'=>$data->id])}}" class="btn btn-primary">Add Student</a>
      <a href="{{route('course.student',['id'=>$data->id])}}" class="btn btn-primary">Students</a>
      </td> 
    
    </tr>
 
 @endforeach
 
    

  </tbody>
</table>
@endsection


