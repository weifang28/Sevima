@extends('layout')

@section('sidebar')


<div class="sidebar d-flex flex-column">
    <div class="mb-4 text-center">
      <h4>InstaApp</h4>
    </div>

    <div class="text-center mb-3">
      <div><strong>{{Session::get('loggedIn')}}</strong></div>
    </div>

    <nav class="nav flex-column">
      <a class="nav-link" href="#">Home</a>
      <a class="nav-link" href="{{route('addPost')}}">Add Post</a>
      <a class="nav-link" href="{{route('findFriends')}}">Find Friends</a>
      <a class="nav-link text-danger mt-auto" href="{{route('logout')}}">Logout</a>
    </nav>
  </div>
@endsection
