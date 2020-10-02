@if($errors->any())
<div>
<ul class="alert alert-danger list-unstyled">
    @foreach ($errors->all() as $error)

        <li>{{$error}}</li>

    @endforeach
</ul>
</div>

@endif


{{-- @if($errors->any())
<div class="alert alert-danger w-75 m-auto">

@foreach($errors->all() as $error)

<p>{{$error}}</p>

@endforeach

</div>

@endif --}}
