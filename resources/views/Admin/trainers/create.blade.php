@extends('Admin.layout')

@section('content')


<div class="d-flex justify-content-between mb-3">
    <h6>Trainers /Add New</h6>
    <a class="btn btn-sm btn-primary  " href="{{ route('Admin.trainer.index') }}">Back</a>
</div>
@include('Admin.inc.errors')
<form action="{{ route('Admin.trainer.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

<div class="form-group">
  <label for="">Name</label>
  <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">

</div>
<div class="form-group">
    <label for="">phone</label>
    <input type="text" name="phone" id="" class="form-control" placeholder="" aria-describedby="helpId">

  </div>
  <div class="form-group">
    <label for="">speciality</label>
    <input type="text" name="spec" id="" class="form-control" placeholder="" aria-describedby="helpId">

  </div>
  <div class="form-group">
    <label for="">image</label>
    <input type="file" name="img" id="" class="form-control-file" placeholder="" aria-describedby="helpId">

  </div>

<button type="submit" class="btn btn-success">Add traine</button>


</form>

@endsection
