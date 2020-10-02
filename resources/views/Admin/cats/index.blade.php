@extends('Admin.layout')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h6>Categories</h6>
    <a class="btn btn-sm btn-primary " href="{{ route('Admin.cats.create') }}" >Add New</a>
</div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cats as $cat)

            <tr>
            <td scope="row">{{$loop->iteration}}</td>
            <td>{{$cat->name}}</td>
                <td>
                    <a type="button" class="btn btn-sm btn-info" href="{{ route('Admin.cats.edit',$cat->id) }}" >Edit</a>
                    <a  class="btn btn-sm btn-danger" href="{{ route('Admin.cats.delete',$cat->id) }}">Delete</a>

                </td>
            </tr>


            @endforeach

        </tbody>
    </table>


@endsection
