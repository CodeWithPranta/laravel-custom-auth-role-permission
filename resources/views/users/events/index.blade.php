@extends('layouts.main')
@section('content')
<div class="container mt-5">
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
    <a href="{{route('events.create')}}" class="btn btn-success mb-3">নতুন ইভেন্ট পোস্ট করুন</a>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>সিরিয়াল নং</th>
                            <th>ইভেন্ট টাইটেল</th>
                            <th>ডেসক্রিপশন</th>
                            <th>পোস্ট ডেট</th>
                            <th>অপারেশন</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $serial_no = 1; ?>
                       @if (!empty($postEvents))
                       @foreach ($postEvents as $postEvent)
                       <tr>
                           <td>{{$serial_no++}}</td>
                           <td>{{$postEvent->title}}</td>
                           <td>{{ \Illuminate\Support\Str::limit($postEvent->description, 90) }}</td>
                           <td>{{\Carbon\Carbon::parse($postEvent->created_at)->format('M j, Y')}}</td>
                           <td class="d-flex justify-content-center">
                               <a href="{{route('events.edit', $postEvent)}}" class="link btn text-success"><i class="bi bi-pencil"></i> আপডেট</a>
                               <form action="{{route('events.destroy', $postEvent->id)}}" method="post">
                                   @csrf
                                   @method('delete')
                                   <button type="submit" class="link btn text-danger"><i class="bi bi-trash"></i> ডিলিট</button>
                               </form>
                           </td>
                       </tr>
                       @endforeach
                       @endif
                    </tbody>
                </table>

                {{$postEvents->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
