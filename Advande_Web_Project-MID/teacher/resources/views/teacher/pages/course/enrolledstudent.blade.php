<link rel="stylesheet" href="/css/teacher/teacher.css">

@extends('teacher.layout.dashboard')
@section('dashboard_content')





<table class="table table-striped">
  <thead>
    <tr>
     
      <th scope="col">Name</th>
      <th scope="col">ID</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
    
    </tr>
  </thead>
  <tbody>

  @foreach($data->students as $data)

    <tr>
      
      <td>{{$data->name}}</td>
      <td>{{$data->s_id}}</td>
      <td>{{$data->address}}</td>
      <td>{{$data->email}}</td>
      <td>{{$data->phone}}</td>
     
      
    
    </tr>
 
 @endforeach
 
    

  </tbody>
</table>
@endsection


