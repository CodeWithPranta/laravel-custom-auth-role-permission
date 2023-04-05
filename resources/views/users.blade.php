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
                            <h5 class="card-title">নাম: {{ $user->name }}</h5>
                            <h5 class="card-title">পিতা: {{ $user->father_name }}</h5>
                            @if ($user->is_baruikati == 'বারুইকাটি')
                                {{__('ঠিকানা: বারুইকাটি')}}
                            @else
                            <p>ঠিকানা: {{$user->address}}</p>
                            @endif
                            @if (!empty($user->profile->profession))
                            <p>পেশা: {{$user->profile->profession}}</p>
                            @endif
                            @if (!empty($user->profile->blood_group))
                            <p>রক্তের গ্রুপ: {{$user->profile->blood_group}}</p>
                            @endif
                        </div>
                        <a href="{{url('chatify/' . $user->id)}}" class="btn btn-success">Live Chat</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
