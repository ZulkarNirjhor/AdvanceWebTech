<link rel="stylesheet" href="/css/teacher/teacher.css">

@extends('teacher.layout.dashboard')
@section('dashboard_content')



<div class="search">
    <div class="row height d-flex justify-content-center align-items-center">
    
        <div class="col-md-8">
            <div class="search">
              <form action="{{route('student.searchstudent')}}" method="get">
              <i class="fa fa-search"></i> 
            <input type="text" class="form-control" name='search' placeholder="Search by Name">
             <button type="submit" class="btn btn-primary">Search</button> 
            </div>
             </form> 
        </div>
        
    </div>
   
</div>


<a href="{{route('student.showcart')}}" class="btn btn-primary">Selected Students</a>
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
      <td><a href="{{route('student.addtocart',['id'=>$data->id])}}" class="btn btn-primary">Add Student</a></td> 
    
    </tr>
 
 @endforeach
 
    

  </tbody>
</table>
@endsection


