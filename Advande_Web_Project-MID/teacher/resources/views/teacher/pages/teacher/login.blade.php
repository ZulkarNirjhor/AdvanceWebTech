<link rel="stylesheet" href="/css/teacher/login.css">


@extends('teacher.layout.app')
@section('content')
<form action="{{route('teacher.login')}}" method="post">
{{csrf_field()}}
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email"  placeholder="Enter Email">
    @error('email')
                <span class="text-danger">{{$message}}</span>
     @enderror
     @if($errors->has('errors_email'))
    <span class="text-danger">{{$errors->first('errors_email') }}</span>
     @endif
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    @error('password')
                <span class="text-danger">{{$message}}</span>
     @enderror
     @if($errors->has('errors_password'))
     <span class="text-danger">{{$errors->first('errors_password') }}</span>
     @endif

  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection