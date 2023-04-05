@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($users as $user)
                <div class="col">
                    <div class="card">
                        @if (!empty($user->profile->avatar))
                        <img src="{{ asset('storage/files/avatars/' . $user->profile->avatar) }}" class="card-img-top rounded-circle" alt="{{ $user->name }} Avatar" width="50%">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">{{ $user->phone }}</p>
                        </div>
                        <a href="{{url('chatify/' . $user->id)}}" class="btn btn-sucesss">Live Chat</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
