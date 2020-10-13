@extends('Admin.layout')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h6>Students / show Courses </h6>
    <div>
        <a class="btn btn-sm btn-success  " href="{{ route('Admin.students.addCourse',$student_id) }}">Add To course</a>
        <a class="btn btn-sm btn-primary  " href="{{ route('Admin.students.index') }}">Back</a>
    </div>

</div>


<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($courses as $c)
        <tr>
        <td scope="row">{{$loop->iteration}}</td>
        <td>{{$c->name}}</td>
        <td>{{$c->pivot->status}}</td>

            <td>
                @if($c->pivot->status !== 'approve')
                <a type="button" class="btn btn-sm btn-info" href="{{ route('Admin.students.approve-courses',[$student_id,$c->id ]) }}" >Approve</a>
                @endif

                @if($c->pivot->status !== 'reject' )
                <a  class="btn btn-sm btn-danger" href="{{ route('Admin.students.reject-courses',[$student_id,$c->id]) }}">Reject</a>
                @endif

            </td>
        </tr>

        @endforeach

    </tbody>
</table>

@endsection
