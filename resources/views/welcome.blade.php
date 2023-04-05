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

@if (session('message_for_password_reset'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message_for_password_reset') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        // Close alert after 5 seconds
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 30000);
    </script>
@endif
<!-- Hero section -->
<section class="hero-section mt-5">
    <div class="container">
      <h2 id="welcome-msg" class="text-center mb-5">আমাদের স্মার্ট গ্রামের অনলাইন সংস্করণে আপনাকে স্বাগতম!</h2>
      <p>বাংলাদেশে আমরাই প্রথম গ্রামের কমিটি, চাঁদা, সালিশি, আয়-ব্যয় এর হিসাব, পন্য বিক্রি, জমি বর্গা অথবা বিক্রি, জনমতের সম্পৃক্ততা সহ ডিজিটাল গ্রাম ম্যানেজমেন্ট সিস্টেম শুরু করছি।
        baruikati.com হলো একটি গ্রাম ব্যবস্থাপনার সঠিক স্মার্ট ভার্সন। আমাদের লক্ষ্য প্রযুক্তির সুবিধা গ্রাম পর্যায়ে পৌছানোর মাধ্যমে সব কিছুকে সহজ করে তোলা।  </p>
      </div>

        </section>
        <!-- Event notice board -->
        <section class="container my-5">
          <h2 class="text-center mb-5">সম্পন্ন, চলমান ও আসন্ন ঘটনাপ্রবাহ</h2>
          <div class="row">
            @if(!empty($postEvents))
                @foreach ($postEvents as $postEvent)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h4 class="card-title">{{$postEvent->title}}</h4>
                                <p class="card-text post-description" data-fulltext="{{$postEvent->description}}">{{ Str::limit($postEvent->description, 50) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-light load-more-button">বিস্তারিত..</button>
                                    <small class="text-muted"><strong>Posted on:</strong> {{ \Carbon\Carbon::parse($postEvent->created_at)->format('M j, Y') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
           {{$postEvents->links()}}
          </div>
        </section>
        <!-- About section -->
        <section class="bg-light py-5 shadow-sm">
          <div class="container">
            <h2 class="text-center mb-5">গ্রাম পরিচিতি</h2>
            <div class="row">
              <div class="col-md-6">
                <p>সবুজে ঘেরা, ঘ্যাংরাইল নদী ও খাল-বিল বেষ্টিত গ্রাম বারুইকাটি। বাংলাদেশের দক্ষিনে খুলনা জেলার ডুমুরিয়া উপজেলার ৭ং শোভনা ইউনিয়নের অন্তর্গত গ্রাম বারুইকাটি। গ্রামটির পোস্ট অফিস বয়ারসিং-৯২৫২। বারুইকাটি ও পাশ্ববর্তী মাদারতলা মিলে শোভনা ইউনিয়নের ৮ং ওয়ার্ড গঠিত।
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

@section('script')
<script>
    const postDescriptions = document.querySelectorAll('.post-description');

    postDescriptions.forEach(description => {
        const fulltext = description.dataset.fulltext;
        const strLength = 70;

        if (fulltext.length > strLength) {
            const shortText = fulltext.substring(0, strLength);
            const longText = fulltext;

            description.innerHTML = shortText + `<span class="more-text d-none">${longText}</span>`;
            const loadMoreButton = description.parentElement.querySelector('.load-more-button');
            loadMoreButton.addEventListener('click', function() {
                const moreText = description.querySelector('.more-text');
                moreText.classList.toggle('d-none');

                if (loadMoreButton.textContent === 'বিস্তারিত..') {
                    loadMoreButton.textContent = 'সংক্ষেপ';
                } else {
                    loadMoreButton.textContent = 'বিস্তারিত..';
                }
            });
        }
    });
</script>

@endsection



