@extends('Admin.layout')

@section('content')


<div class="d-flex justify-content-between mb-3">
<h6>Categories /Edit /{{$cat->name}}</h6>
    <a class="btn btn-sm btn-primary  " href="{{ route('Admin.cats.index') }}">Back</a>
</div>

<form action="{{ route('Admin.cats.update',$cat->id) }}" method="POST">
@csrf
{{-- <input type="hidden" name="id" value="{{$cat->id}}"> --}}
<div class="form-group">

  <label for="">Name</label>
<input type="text" name="name" value="{{$cat->name}}" id="" class="form-control" placeholder="" aria-describedby="helpId">
</div>

<button class="btn btn-success " type="submit">Edit Category</button>


</form>

@endsection
