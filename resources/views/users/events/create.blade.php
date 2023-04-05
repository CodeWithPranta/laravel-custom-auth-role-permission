@extends('layouts.main')
@section('content')
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <form action="{{route('events.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label  class="form-label">ঘটনার টাইটেল লিখুন</label>
                    <input type="text" name="title" class="form-control" value="{{old('title')}}">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="description" placeholder="সম্পন্ন, চলছে, হবে এমন জানা ঘটনা সম্পর্কে বিস্তারিত লিখুন (স্থান, কাল ও সত্যতা সহ)" rows="10">{{old('description')}}</textarea>
                    <label for="exampleFormControlTextarea1" class="mt-2">পোস্ট ইভেন্ট</label>
                </div>

                <button type="submit" class="btn btn-success">সাবমিট</button>
            </form>
        </div>
    </div>
</div>
@endsection
