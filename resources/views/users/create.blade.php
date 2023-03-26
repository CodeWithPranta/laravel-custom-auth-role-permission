@extends('layouts.auth')

@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-12 col-md-6">

        <h4 class="mt-3">আপনার তথ্য প্রদান করে রেজিস্ট্রশন করুন  </h4> <span>অথবা</span> <a href="{{route('home')}}">পুনরায় মূল পেজে যান</a>
        <form class="mt-5" action="{{route('user.store')}}" method="post">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="mb-3">
                <label for="exampleInputName" class="form-label">নিজের নাম লিখুন</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputFatherName" class="form-label">পিতার নাম লিখুন</label>
                <input type="text" name="father_name" class="form-control" value="{{old('father_name')}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputMotherName" class="form-label">মাতার নাম লিখুন</label>
                <input type="text" name="mother_name" class="form-control" value="{{old('mother_name')}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputPhone" class="form-label">মোবাইল নম্বর</label>
              <input type="text" name="phone" class="form-control" id="exampleInputPhone" aria-describedby="phoneHelp" value="{{old('phone')}}">
              <div id="phoneHelp" class="form-text">আপনার অনুমতি ব্যতীত মোবাইল নম্বরটি কাউকে দেওয়া হবে না।</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">পাসওয়ার্ড দিন (কমপক্ষে ৮ ডিজিট)</label>
              <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">পাসওয়ার্ডটি পুনরায় লিখুন</label>
                <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword2">
            </div>
            <button type="submit" class="btn btn-success">সাবমিট</button>

            <h6 class="mt-3">পূর্বে রেজিস্ট্রেশন সম্পন্ন হয়ে থাকলে লগিন করতে ক্লিক করুন</h6>
            <a href="{{route('user.login')}}">লগিন</a>
        </form>
    </div>
</div>
@endsection
