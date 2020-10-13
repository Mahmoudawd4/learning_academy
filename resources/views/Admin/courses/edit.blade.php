@extends('Admin.layout')

@section('content')


<div class="d-flex justify-content-between mb-3">
<h6>Trainers /Edit /{{$course->name}}</h6>
    <a class="btn btn-sm btn-primary  " href="{{ route('Admin.courses.index') }}">Back</a>
</div>

<form action="{{ route('Admin.courses.update',$course->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

<div class="form-group">
  <label for="">Name :</label>
  <input type="text" name="name" id="" class="form-control" placeholder="" value="{{$course->name}}" aria-describedby="helpId">

</div>

<div class="form-group">
  <label for="">Category :</label>
  <select class="form-control" name="category_id" id="">
      @foreach ($cats as $cat)
            <option value="{{$cat->id}}" @if($course->category_id == $cat->id) selected @endif >{{$cat->name}}</option>
      @endforeach
  </select>
</div>

<div class="form-group">
    <label for="">Trainer :</label>
    <select class="form-control" name="trainer_id" id="">
        @foreach ($trainers as $t)
            <option value="{{$t->id}}" @if($course->trainer_id == $t->id) selected @endif>{{$t->name}}</option>
        @endforeach
    </select>
  </div>

<div class="form-group">
    <label for="">content :</label>
    <input type="text" name="content" id="" class="form-control" placeholder="" value="{{$course->content}}" aria-describedby="helpId">
</div>

<div class="form-group">
    <label for="">desc</label>
    <textarea name="desc" class="form-control" id="" cols="30" rows="10" placeholder="">
        {{$course->desc}}
    </textarea>
</div>


<div class="form-group">
    <label for="">price</label>
    <input type="text" name="price" id="" class="form-control" placeholder="" value="{{$course->price}}" aria-describedby="helpId">

  </div>
  <img src=" {{asset('uploads/courses/'.$course->img )}}" alt="" class="my-5" height="100px">

  <div class="form-group">
    <label for="">image</label>
    <input type="file" name="img" id="" class="form-control-file" placeholder="" aria-describedby="helpId">

  </div>

<button type="submit" class="btn btn-success">Add Course</button>


</form>

@endsection
