@extends('layouts.main')
@section('content')
<div class="container mt-5">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img src="{{ asset('storage/files/avatars/' . $profile->avatar) }}" alt="Avatar" class="card-img-top">
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
                <p><strong>পিতার নাম:</strong> {{ $user->father_name }}</p>
                <p><strong>মাতার নাম:</strong> {{ $user->mother_name }}</p>
                <p><strong>জন্মতারিখ:</strong> {{ $profile->birth_date }}</p>
                <p><strong>জেন্ডার:</strong> {{ $profile->gender }}</p>
                <p><strong>রক্তের গ্রুপ:</strong> {{ $profile->blood_group }}</p>
                <p><strong>পেশা:</strong> {{ $profile->profession }}</p>
                <p><strong>ঠিকানা:</strong> @if ($user->is_baruikati == 'বারুইকাটি')
                    {{__('বারুইকাটি')}}
                    @else
                    {{$user->address}}
                @endif</p>
              </div>
              <div class="col-md-6">
                <p><strong>বায়োগ্রাফি:</strong> {{$profile->bio}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
