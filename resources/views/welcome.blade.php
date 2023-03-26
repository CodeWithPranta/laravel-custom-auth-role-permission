@extends('layouts.main')
@section('content')

@if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        // Close alert after 5 seconds
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 5000);
    </script>
@endif

<!-- Hero section -->
<section class="hero-section mt-5">
    <div class="container">
      <h2>আমাদের ঘটনাপ্রবাহ, অনুষ্ঠান ও সভার অনলাইন সংস্করণে আপনাকে স্বাগতম!</h2>
      <p>গ্রামের কমিটি, পূজার চাঁদা, সালিশ, বিচার, আয়-ব্যয় এর হিসাব, জনমতের সম্পৃক্ততা, সুসাশন ও নতুন নেতৃত্বের সূচনা হোক এখান থেকেই।
        baruikati.com হলো একটি গ্রাম ব্যবস্থাপনার সঠিক স্মার্ট ভার্সন। যার লক্ষ্যই জবাবদিহিতা নিশ্চিত করার মাধ্যমে গ্রামের সবার সমান অধিকার গুরুত্ব প্রতিষ্ঠা করা অথবা সুশাসনের ধারা বজায় রাখা। </p>
      </div>

        </section>
        <!-- Event notice board -->
        <section class="container my-5">
          <h2 class="text-center mb-5">চলমান ও আসন্ন কর্মসূচি</h2>
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <div class="card-body">
                  <h4 class="card-title">Event Title 1</h4>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut varius massa eu aliquet maximus.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">Posted on: Jan 1, 2023</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <div class="card-body">
                  <h4 class="card-title">Event Title 2</h4>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut varius massa eu aliquet maximus.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">Posted on: Jan 1, 2023</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <div class="card-body">
                  <h4 class="card-title">Event Title 3</h4>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut varius massa eu aliquet maximus.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">Posted on: Jan 1, 2023</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- About section -->
        <section class="bg-light py-5">
          <div class="container">
            <h2 class="text-center mb-5">গ্রাম পরিচিতি</h2>
            <div class="row">
              <div class="col-md-6">
                <p>সবুজে ঘেরা, নদী ও খাল-বিল বেষ্টিত গ্রাম বারুইকাটি। বাংলাদেশের দক্ষিনে খুলনা জেলার ডুমুরিয়া উপজেলার ৭ং শোভনা ইউনিয়নের অন্তর্গত গ্রাম বারুইকাটি। গ্রামটির পোস্ট অফিস বয়ারসিং-৯২৫২। বারুইকাটি ও পাশ্ববর্তী মাদারতলা মিলে শোভনা ইউনিয়নের ৮ং ওয়ার্ড গঠিত।
                    বারুইকাটি গ্রামটি আয়তন ও জনসংখ্যা বিচারে পার্শ্ববর্তী গ্রামগুলোর তুলনায় অনেক ছোট। গ্রামের জনসংখ্যা প্রায় ১০৫০ জন এবং আয়তন প্রায় ৩.৫ বর্গকিলোমিটার। গ্রামের অধিকাংশ লোক কৃষিকাজের সাথে সম্পর্কিত। উল্লেকযোগ্য কৃষিপণ্যর মধ্য ধান ও তরমুজের ফলন
                    বেশি হয়ে থাকে। গ্রামের প্রত্যেক বাড়িতে সুপেয় পানি (ওয়াসা) সাপ্লাইয়ের ব্যবস্থা আছে, এছাড়া শতভাগ বিদ্যুৎ, পাকা রাস্তা ও ইন্টারনেট সুবিধা রয়েছে।
                    গ্রামটিতে ২টি বড় মন্দির ও ১টি প্রাইমারি স্কুল রয়েছে। প্রায় শতভাগ হিন্দুধর্মালম্বীদের বসবাস গ্রামটিতে। গ্রামের সবচেয়ে ঐতিহ্যবাহী
                    পূজা হলো বাসন্তী পূজা। যা কয়েক শতাব্দী ধরে চলে আসছে। গ্রামে জনসংখ্যার বৃদ্ধির হার ঋণাত্মক। গ্রামে শিক্ষিত ও সচেতন জনগোষ্ঠীর সংখ্যা বেশি।
                    বাংলাদেশে বিভিন্ন সরকারি, বেসরকারি ও এমনকি বিদেশেও অনেকেই কর্মরত আছেন। গ্রামটির নিজস্ব বাজারের নাম বারুইকাটি বাজার।
                    এছাড়া পাশের গ্রামগুলো হতে মানুষজন হাট-বাজার করে। নিকটবর্তী বড় শহর হলো খুলনা, যা ২৪ কিলোমিটার দূরে অবস্থিত।

                </p>
                </div>
                <div class="col-md-6">
                <img src="{{asset('images/about_image500-375.jpg')}}" alt="Nature Image" class="img-fluid rounded">
            </div>
            </div>
            </div>

@endsection


