@extends('layouts.root')
@section('content')
<div class="container mt-5">
    <h2>Users List</h2>
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
                        <td>{{$user->father_name}}</td>
                        <td>{{$user->mother_name}}</td>
                        <td>
                            @if ($user->is_baruikati == 'Yes')
                            {{__('Baruikati')}}
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
</div>
@endsection
