<link rel="stylesheet" href="/css/teacher/teacher.css">

@extends('teacher.layout.dashboard')
@section('dashboard_content')



<a href="{{route('student.list')}}" class="btn btn-warning">Back</a>
&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="{{route('student.createcourse')}}" class="btn btn-success">Create</a>

<table class="table table-striped">
  <thead>
    <tr>
     
      <th scope="col">Name</th>
      <th scope="col">ID</th>
      <th scope="col">Action</th>
    
    </tr>
  </thead>
  <tbody>

  @foreach($data as $data)

    <tr>
      
      <td>{{$data->name}}</td>
      <td>{{$data->s_id}}</td>
      <td><a href="{{route('student.deletecart',['id'=>$data->id])}}" class="btn btn-danger">Remove</a></td> 
    
    </tr>
 
 @endforeach
   


  </tbody>
</table>
@endsection


