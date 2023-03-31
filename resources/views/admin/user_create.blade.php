@extends('layouts.root')
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <form class="mt-5" action="{{route('adminusers.store')}}" method="post">
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
                    <label for="exampleInputName" class="form-label">ব্যবহারকারীর নাম</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputFatherName" class="form-label">তার পিতার নাম</label>
                    <input type="text" name="father_name" class="form-control" value="{{old('father_name')}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputMotherName" class="form-label">তার মাতার নাম</label>
                    <input type="text" name="mother_name" class="form-control" value="{{old('mother_name')}}">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPhone" class="form-label">মোবাইল নম্বর</label>
                  <input type="text" name="phone" class="form-control" id="exampleInputPhone" aria-describedby="phoneHelp" value="{{old('phone')}}">
                  <div id="phoneHelp" class="form-text">আপনার অনুমতি ব্যতীত মোবাইল নম্বরটি কাউকে দেওয়া হবে না।</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputAddress" class="form-label">ঠিকানা লিখুন</label>
                    <select class="form-control" name="is_baruikati" id="addressSelect" value="{{old('is_baruikati')}}">
                        <option value="">--সে কি বারুইকাটির বাসিন্দা?--</option>
                        <option value="Yes">হ্যাঁ</option>
                        <option value="No">না</option>
                    </select>
                </div>
                <div class="mb-3" id="otherAddressDiv" style="display: none;">
                    <label for="exampleInputAddress" class="form-label">গ্রামের নাম সহ ঠিকানা লিখুন</label>
                    <input type="text" name="address" class="form-control" id="otherAddressDiv" value="{{old('address')}}">
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
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    const addressSelect = document.querySelector('#addressSelect');
    const otherAddressDiv = document.querySelector('#otherAddressDiv');

    addressSelect.addEventListener('change', () => {
        if (addressSelect.value === 'No') {
            otherAddressDiv.style.display = 'block';
        } else {
            otherAddressDiv.style.display = 'none';
        }
    });
</script>
@endsection

