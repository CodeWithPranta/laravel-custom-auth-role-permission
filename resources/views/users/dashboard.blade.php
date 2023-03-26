@extends('layouts.main')
@section('content')
<div class="container">
    <h2>Your Dashboard</h2>

    <form action="{{route('user.logout')}}" method="post">
        @csrf
        <button type="submit" class="link">Logout</button>
    </form>
</div>
@endsection
