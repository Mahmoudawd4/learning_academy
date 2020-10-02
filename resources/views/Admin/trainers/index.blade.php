@extends('Admin.layout')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h6>Trainers</h6>
    <a class="btn btn-sm btn-primary " href="{{ route('Admin.trainer.create') }}" >Add New</a>
</div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>img</th>
                <th>Name</th>
                <th>Phone</th>
                <th>spec</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainers as $t)

            <tr>
            <td scope="row">{{$loop->iteration}}</td>
            <td><img src=" {{asset('uploads/trainers/'.$t->img )}}" alt="" width="50px" height="50px"> </td>
            <td>{{$t->name}}</td>
            <td>
                @if($t->phone !== null)
                    {{$t->phone}}
                @else
                Not exist
                @endif
                </td>
            <td>{{$t->spec}}</td>
                <td>
                    <a type="button" class="btn btn-sm btn-info" href="{{ route('Admin.trainer.edit',$t->id) }}" >Edit</a>
                    <a  class="btn btn-sm btn-danger" href="{{ route('Admin.trainer.delete',$t->id) }}">Delete</a>

                </td>
            </tr>


            @endforeach

        </tbody>
    </table>


@endsection
