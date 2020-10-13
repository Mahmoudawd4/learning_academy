@extends('Admin.layout')

@section('content')


<div class="d-flex justify-content-between mb-3">
    <h6>Students/Add New</h6>
    <a class="btn btn-sm btn-primary  " href="{{ route('Admin.students.index') }}">Back</a>
</div>
@include('Admin.inc.errors')
<form action="{{ route('Admin.students.store') }}" method="POST">
    @csrf

<div class="form-group">
  <label for="">Name :</label>

  <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">

</div>

<div class="form-group">
    <label for="">Email :</label>

    <input type="email" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId">

  </div>

  <div class="form-group">
    <label for="">Spec</label>

    <input type="text" name="spec" id="" class="form-control" placeholder="" aria-describedby="helpId">

  </div>

<button type="submit" class="btn btn-success">Add Student</button>


</form>

@endsection
