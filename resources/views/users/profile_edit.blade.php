@extends('layouts.main')

@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
        <form class="mt-5" action="{{route('user.update_profile')}}" method="post" enctype="multipart/form-data">
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
                <label for="exampleInputName" class="form-label">নিজের নাম</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputFatherName" class="form-label">পিতার নাম</label>
                <input type="text" name="father_name" class="form-control" value="{{$user->father_name}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputMotherName" class="form-label">মাতার নাম</label>
                <input type="text" name="mother_name" class="form-control" value="{{$user->mother_name}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputPhone" class="form-label">মোবাইল নম্বর</label>
              <input type="text" name="phone" class="form-control" id="exampleInputPhone" aria-describedby="phoneHelp" value="{{$user->phone}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputAddress" class="form-label">আপনি কি বারুইকাটির বাসিন্দা?</label>
                <select class="form-control" name="is_baruikati" id="addressSelect">
                    <option value="বারুইকাটি" {{ $user->is_baruikati == 'বারুইকাটি' ? 'selected' : '' }}>হ্যাঁ</option>
                    <option value="No" {{ $user->is_baruikati == 'No' ? 'selected' : '' }}>না</option>
                </select>
            </div>
            <div class="mb-3" id="otherAddressDiv" style="display: none;">
                <label for="exampleInputAddress" class="form-label">নতুন ঠিকানা লিখুন</label>
                <input type="text" name="address" class="form-control" id="otherAddressDiv" value="{{$user->address}}">
            </div>

            <div class="mb-3">
                <h4>গুরুত্বপূর্ণ তথ্য</h4>
            </div>
            <div class="mb-3">
                <label class="form-label">প্রোফাইল ফটো</label>
                <input type="file" name="avatar" class="form-control" onchange="previewAndResizeImage(this)">
                <img id="avatarPreview" src="{{ $profile ? asset('storage/files/avatars/' . $profile->avatar) : '' }}" alt="Avatar Preview" width="200" {{ $profile ? 'style=display:block;' : 'style=display:none;' }}>
            </div>

            <div class="mb-3">
                <label class="form-label">জন্মতারিখ</label>
                <input type="date" name="birth_date" class="form-control" value="{{ $profile ? ($profile->birth_date ? \Carbon\Carbon::parse($profile->birth_date)->format('Y-m-d') : '') : '' }}">
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">জেন্ডার</label>
                <select name="gender" class="form-control">
                    <option value="">সিলেক্ট করুন</option>
                    <option value="পুরুষ" {{$profile && $profile->gender == 'পুরুষ' ? 'selected' : '' }}>পুরুষ</option>
                    <option value="নারী" {{$profile && $profile->gender == 'নারী' ? 'selected' : '' }}>নারী</option>
                    <option value="অন্যান্য" {{$profile && $profile->gender == 'অন্যান্য' ? 'selected' : '' }}>অন্যান্য</option>

                </select>
            </div>
            <div class="mb-3">
                <label for="blood_group" class="form-label">রক্তের গ্রুপ</label>
                <select name="blood_group" class="form-control">
                    <option value="">সিলেক্ট করুন</option>
                    <option value="A+" {{$profile && $profile->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                    <option value="A-" {{$profile && $profile->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                    <option value="B+" {{$profile && $profile->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                    <option value="B-" {{$profile && $profile->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                    <option value="AB+" {{$profile && $profile->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                    <option value="AB-" {{$profile && $profile->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
                    <option value="O+" {{$profile && $profile->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                    <option value="O-" {{$profile && $profile->blood_group == 'O-' ? 'selected' : '' }}> O-</option>
                    <option value="অজানা" {{$profile && $profile->blood_group == 'অজানা' ? 'selected' : '' }}>অজানা</option>

                </select>
            </div>
            <div class="mb-3">
                <label  class="form-label">পেশা/ আয়ের সোর্স</label>
                <input type="text" name="profession" class="form-control" value="{{ $profile ? $profile->profession : '' }}" placeholder="আপনার প্রফেশন যুক্ত করুন">
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="bio" placeholder="নিজের সম্পর্কে" rows="10">{{ $profile ? $profile->bio : '' }}</textarea>
                <label for="exampleFormControlTextarea1" class="mt-2">জীবন বৃতান্ত</label>
            </div>

            <button type="submit" class="btn btn-success">আপডেট</button>
        </form>
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


    // Profile photo preview and resize image in Pure JavaScript

    function previewAndResizeImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = new Image();
                img.onload = function() {
                    const canvas = document.createElement('canvas');
                    const MAX_WIDTH = 800;
                    const MAX_HEIGHT = 800;
                    let width = img.width;
                    let height = img.height;

                    if (width > height) {
                        if (width > MAX_WIDTH) {
                            height *= MAX_WIDTH / width;
                            width = MAX_WIDTH;
                        }
                    } else {
                        if (height > MAX_HEIGHT) {
                            width *= MAX_HEIGHT / height;
                            height = MAX_HEIGHT;
                        }
                    }

                    canvas.width = width;
                    canvas.height = height;

                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0, width, height);

                    const preview = document.getElementById('avatarPreview');
                    preview.src = canvas.toDataURL(input.files[0].type);
                    preview.style.display = 'block';
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
