@extends('layouts.auth')

@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-12 col-md-6">
        <h4 class="mt-3">আপনার তথ্য প্রদান করে লগিন করুন  </h4> <span>অথবা</span> <a href="{{route('home')}}">পুনরায় মূল পেজে যান</a>
        <form class="mt-5" action="{{route('user.authenticate')}}" method="post">
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
              <label for="exampleInputEmail1" class="form-label">রেজিস্টারকৃত মোবাইল নম্বর দিন</label>
              <input type="text" name="phone" class="form-control" id="exampleInputPhone" aria-describedby="emailHelp">
              <div id="phoneHelp" class="form-text">আমাদের নিকট আপনার সকল তথ্যই নিরাপদ।</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">পাসওয়ার্ড দিন</label>
              <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-success">লগিন</button>
            <h6 class="mt-3">রেজিস্ট্রেশন না করলে রেজিস্ট্রেশন করতে ক্লিক করুন</h6>
            <a href="{{route('user.register')}}">রেজিস্ট্রেশন</a>
        </form>
        <h6 class="mt-3">আপনি কি আপনার লগিন ডিটেইলস ভূলে গেছেন? ফিরে পেতে যোগাযোগ করুন</h6>
        <a href="http://wa.me/8801518480999" target="_blank" rel="noopener noreferrer">একাউন্ট রিকাভারি</a>
    </div>
</div>
@endsection
