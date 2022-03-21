<link rel="stylesheet" href="/css/dashboard.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@extends('teacher.layout.app')
@section('content')


<div class="sidebar-container">
  <div class="sidebar-logo">
  <a href="#" class="d-flex align-items-center text-light text-decoration-none " id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
  
  @if(Session::has('teacher.image'))
  @php
  $image= Session::get('teacher.image')
  @endphp
 
  <img src="{{asset('/storage/uploads/'. $image .'')}}" alt="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNL_ZnOTpXSvhf1UaK7beHey2BX42U6solRA&usqp=CAU" width="40" height="40" class="rounded-circle me-2">
 @else
  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNL_ZnOTpXSvhf1UaK7beHey2BX42U6solRA&usqp=CAU" alt="" width="32" height="32" class="rounded-circle me-2">
  @endif
   <strong> 
   @if(Session::has('teacher.name'))
     {{Session::get('teacher.name')}}
     @endif
 </strong> 
</a>
  </div>

  <ul class="sidebar-navigation " >
    <li class="header">Navigation</li>
    <li>
      <a href="#" style="text-decoration: none">
        <i class="fa fa-home" aria-hidden="true"></i> Homepage
      </a>
    </li>
    <li>
      <a href="{{route('course.addcourse')}}" style="text-decoration: none">
        <i class="fa fa-plus-square-o" aria-hidden="true"></i> Add Course
      </a>
    </li>
    <li>
      <a href="{{route('course.seecourse')}}" style="text-decoration: none">
        <i class="fa fa-info-circle" aria-hidden="true"></i>Courses
      </a>
    </li>
    <li class="header">Another Menu</li>
    <li>
      <a href="{{route('teacher.changeinformation')}}" style="text-decoration: none">
        <i class="fa fa-address-card" aria-hidden="true"></i> Change Information
      </a>
    </li>
    <li>
      <a href="{{route('teacher.changepassword')}}" style="text-decoration: none">
        <i class="fa fa-unlock" aria-hidden="true"></i> Change Password
      </a>
    </li>
  
    <li>
      <a href="{{route('teacher.signout')}}" style="text-decoration: none">
      <i class="fa fa-sign-out"></i>Sign out
      </a>
    </li>
  </ul>
</div>

<div class="content-container">

  <div class="container-fluid">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
    @yield('dashboard_content')

    </div>

  </div>
</div>



@endsection

