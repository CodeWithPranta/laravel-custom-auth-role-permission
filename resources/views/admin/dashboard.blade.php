@extends('layouts.root')

@section('content')
  <!-- Page content -->
<div class="container mt-3">
    <h1>Welcome to the Admin Dashboard</h1>
    <p class="lead">Here's where you can manage your users and posts.</p>
    <hr>
    <div class="row">
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">View and manage users in the system.</p>
                    <a href="#" class="btn btn-primary">View Users</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Posts</h5>
                    <p class="card-text">View and manage posts in the system.</p>
                    <a href="#" class="btn btn-primary">View Posts</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

