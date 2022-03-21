<link rel="stylesheet" href="/css/teacher/changepicture.css">

@extends('teacher.layout.dashboard')
@section('dashboard_content')
<form enctype="multipart/form-data" action="{{route('course.addcourse')}}" method="post">
{{csrf_field()}}

<div class="form-group">
    <label for="name">Course Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Enter Course Name:">
    @error('name')
                <span class="text-danger">{{$message}}</span>
     @enderror
  </div>

  <div class="form-group">
    <label for="name">Section </label>
    <input type="text" class="form-control" id="section" name="section" value="{{old('section')}}" placeholder="Enter Section Name:">
    @error('section')
                <span class="text-danger">{{$message}}</span>
     @enderror
  </div>


  <div class="form-group">
    <label for="time">Choose Time</label>
    <input type="time" class="form-control" id="time" name="time" value="{{old('time')}}" placeholder="Time:">
    @error('time')
                <span class="text-danger">{{$message}}</span>
     @enderror
  </div>


  <div class="form-group">
    <label for="name">Max Capacity </label>
    <input type="number" class="form-control" id="capacity" name="capacity" value="{{old('capacity')}}" placeholder="Max Capacity:">
    @error('capacity')
                <span class="text-danger">{{$message}}</span>
     @enderror
  </div>
 
  
 
  


 
  <button type="submit" class="btn btn-primary">Next</button>
</form>
@endsection