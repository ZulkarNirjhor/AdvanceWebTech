<link rel="stylesheet" href="/css/teacher/changepicture.css">

@extends('teacher.layout.dashboard')
@section('dashboard_content')
<form action="{{route('teacher.changeinformation')}}" method="post">
{{csrf_field()}}

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$entity['name']}}" placeholder="Enter Name">
    @error('name')
                <span class="text-danger">{{$message}}</span>
     @enderror
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone" value="{{$entity['phone']}}"  placeholder="Enter Phone">
    @error('phone')
                <span class="text-danger">{{$message}}</span>
     @enderror
  </div>

  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" name="address" value="{{$entity['address']}}"  placeholder="Enter Address">
    @error('address')
                <span class="text-danger">{{$message}}</span>
     @enderror
  </div>


 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection