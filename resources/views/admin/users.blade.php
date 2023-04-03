@extends('layouts.root')
@section('content')
<div class="container mt-5">
    <h2>Users List</h2>
    <div class="row">
        <div class="mt-3 col-md-6">
            <form action="{{route('adminusers.index')}}" method="GET" class="d-flex mx-auto my-3 my-lg-0">
                <input class="form-control me-2" type="text" name="search" placeholder="Type user phone or name or address">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Father's</th>
                        <th>Mother's</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $serial_no = 1; ?>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$serial_no++}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{ $user->father_name }}</td>
                        <td>{{$user->mother_name}}</td>
                        <td>
                            @if ($user->is_baruikati == 'বারুইকাটি')
                            {{__('বারুইকাটি')}}
                            @else
                            {{$user->address}}
                            @endif
                        </td>
                        <td>Edit Delete Assign Role and Permissions</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            {!! $users->links() !!}  {{--{{}} and {!! !!} are same --}}
        </div>
    </div>
</div>
@endsection
