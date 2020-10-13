@extends('Admin.layout')

@section('content')


<div class="d-flex justify-content-between mb-3">
<h6>Students /Add Course/  {{$student_id }} </h6>
    <a class="btn btn-sm btn-primary  " href="{{ route('Admin.students.index') }}">Back</a>
</div>
@include('Admin.inc.errors')
<form action="{{ route('Admin.students.storeCourse', $student_id ) }}" method="POST">
    @csrf

<input type="hidden" value="{{$student_id}}" name="id">
<div class="form-group">
    <label for="">Courses :</label>
    <select class="form-control" name="course_id" id="">
        @foreach ($courses as $c)
              <option value="{{$c->id}}" >{{$c->name}}</option>
        @endforeach
    </select>
  </div>

<button type="submit" class="btn btn-success">Add Course</button>


</form>

@endsection
