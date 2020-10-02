@extends('Admin.layout')

@section('content')


<div class="d-flex justify-content-between mb-3">
    <h6>Categories/Add New</h6>
    <a class="btn btn-sm btn-primary  " href="{{ route('Admin.cats.index') }}">Back</a>
</div>
@include('Admin.inc.errors')
<form action="{{ route('Admin.cats.store') }}" method="POST">
    @csrf

<div class="form-group">
  <label for="">Name</label>

  <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
</div>

<button type="submit" class="btn btn-success">Add Category</button>


</form>

@endsection
