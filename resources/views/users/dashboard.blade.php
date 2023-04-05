@extends('layouts.main')
@section('content')
<div class="container mt-5">
    <h4>ড্যাশবোর্ড ম্যানেজমেন্ট</h4>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-3">
        <div class="col">
          <div class="card h-100 border-0 rounded-3 shadow-sm">
            <div class="card-body">
              <h5 class="card-title"><a href="{{route('events.index')}}" class="card-link text-success">ইভেন্ট পোস্টিং</a></h5>
              <p class="card-text">আপনার বাড়ির কোনো অনুষ্ঠান, আপনার জানা সম্পন্ন, চলমান ও আসন্ন ঘটনাপ্রবাহ নিয়ে পোস্ট করুন।</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 border-0 rounded-3 shadow-sm">
            <div class="card-body">
              <h5 class="card-title"><a href="#" class="card-link text-success">খাবার ও পণ্য</a></h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consequat velit non facilisis malesuada.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 border-0 rounded-3 shadow-sm">
            <div class="card-body">
              <h5 class="card-title"><a href="#" class="card-link text-success">প্রফেশনাল সার্ভিস</a></h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consequat velit non facilisis malesuada.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 border-0 rounded-3 shadow-sm">
            <div class="card-body">
              <h5 class="card-title"><a href="#" class="card-link text-success">জমি ও জায়গা সংক্রান্ত</a></h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consequat velit non facilisis malesuada.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 border-0 rounded-3 shadow-sm">
            <div class="card-body">
              <h5 class="card-title"><a href="#" class="card-link text-success">মতামত ও অভিযোগ</a></h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consequat velit non facilisis malesuada.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 border-0 rounded-3 shadow-sm">
            <div class="card-body">
              <h5 class="card-title"><a href="#" class="card-link text-success">ডোনেশন ও চাঁদা</a></h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consequat velit non facilisis malesuada.</p>
            </div>
          </div>
        </div>
    </div>

</div>
@endsection
