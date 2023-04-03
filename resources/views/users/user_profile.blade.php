@extends('layouts.main')
@section('content')
<div class="container mt-5">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img src="{{ asset('files/avatars/' . $profile->avatar) }}" alt="Avatar" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">{{ $user->phone }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            Profile Information
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Father Name:</strong> {{ $user->father_name }}</p>
                <p><strong>Mother Name:</strong> {{ $user->mother_name }}</p>
                <p><strong>Birth Date:</strong> {{ $profile->birth_date }}</p>
                <p><strong>Gender:</strong> {{ $profile->gender }}</p>
                <p><strong>Blood Group:</strong> {{ $profile->blood_group }}</p>
              </div>
              <div class="col-md-6">
                <p><strong>Address:</strong> {{ $user->address }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
