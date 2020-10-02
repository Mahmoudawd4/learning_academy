@extends('Admin.layout')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h6>Courses</h6>
    <a class="btn btn-sm btn-primary " href="{{ route('Admin.courses.create') }}" >Add New</a>
</div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>img</th>
                <th>Name</th>
                <th>price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $c)

            <tr>
            <td scope="row">{{$loop->iteration}}</td>
            <td><img src=" {{asset('uploads/courses/'.$c->img )}}" alt="" width="50px" height="50px"> </td>
            <td>{{$c->name}}</td>
            <td>{{$c->price}} $</td>
                <td>
                    <a type="button" class="btn btn-sm btn-info" href="{{ route('Admin.courses.edit',$c->id) }}" >Edit</a>
                    <a  class="btn btn-sm btn-danger" href="{{ route('Admin.courses.delete',$c->id) }}">Delete</a>

                </td>
            </tr>


            @endforeach

        </tbody>
    </table>


@endsection
