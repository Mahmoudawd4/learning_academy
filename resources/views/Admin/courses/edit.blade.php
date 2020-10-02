@extends('Admin.layout')

@section('content')


<div class="d-flex justify-content-between mb-3">
<h6>Trainers /Edit /{{$trainer->name}}</h6>
    <a class="btn btn-sm btn-primary  " href="{{ route('Admin.trainer.index') }}">Back</a>
</div>

<form action="{{ route('Admin.trainer.update',$trainer->id) }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label for="">Name</label>
    <input type="text" name="name" id="" value="{{$trainer->name}}" class="form-control" placeholder="" aria-describedby="helpId">

  </div>
  <div class="form-group">
      <label for="">phone</label>
      <input type="text" name="phone" id="" value="{{$trainer->phone}}"  class="form-control" placeholder="" aria-describedby="helpId">

    </div>
    <div class="form-group">
      <label for="">speciality</label>
      <input type="text" name="spec" id="" class="form-control" value="{{$trainer->spec}}" placeholder="" aria-describedby="helpId">


     <img src=" {{asset('uploads/trainers/'.$trainer->img )}}" alt="" class="my-5" height="100px">
    </div>
    <div class="form-group">
      <label for="">image :</label>
      <input type="file" name="img" id="" class="form-control-file" placeholder="" aria-describedby="helpId">

    </div>

  <button type="submit" class="btn btn-success">updata traine</button>


</form>

@endsection
