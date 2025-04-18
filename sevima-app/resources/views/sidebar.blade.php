@extends('layout')

@section('sidebar')


<div class="sidebar d-flex flex-column">
    <div class="mb-4 text-center">
      <h4>InstaApp</h4>
    </div>

    <div class="text-center mb-3">
      {{-- <img src="https://via.placeholder.com/60" alt="Profile" class="profile-pic mb-2"> --}}
      <div><strong>{{Session::get('loggedIn')}}</strong></div>
    </div>

    <nav class="nav flex-column">
      <a class="nav-link active" href="#">Home</a>
      <a class="nav-link" href="#">Explore</a>
      <a class="nav-link" href="#">Messages</a>
      <a class="nav-link" href="#">Notifications</a>
      <a class="nav-link" href="#">Profile</a>
      <a class="nav-link text-danger mt-auto" href="{{route('logout')}}">Logout</a>
    </nav>
  </div>
@endsection
