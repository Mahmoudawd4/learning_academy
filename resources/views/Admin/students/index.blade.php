@extends('Admin.layout')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h6>Students</h6>
    <a class="btn btn-sm btn-primary " href="{{ route('Admin.students.create') }}" >Add New</a>
</div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>spec</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $s)
            <tr>
            <td scope="row">{{$loop->iteration}}</td>

            @if($s->name !== null)
            <td>{{$s->name}}</td>
            @else
            <td>No name</td>
            @endif

            <td>{{$s->email}}</td>

            @if($s->spec !== null)
            <td>{{$s->spec}}</td>
            @else
            <td>No spec</td>
            @endif

                <td>
                    <a type="button" class="btn btn-sm btn-info" href="{{ route('Admin.students.edit',$s->id) }}" >Edit</a>
                    <a  class="btn btn-sm btn-danger" href="{{ route('Admin.students.delete',$s->id) }}">Delete</a>
                    <a  class="btn btn-sm btn-primary" href="{{ route('Admin.show-courses.student',$s->id) }}">show Courses</a>

                </td>
            </tr>


            @endforeach

        </tbody>
    </table>


@endsection
