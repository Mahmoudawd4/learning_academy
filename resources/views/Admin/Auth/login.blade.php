<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
</head>
<body>


    <div class="container w-75  m-5 p-5">
        @include('Admin.inc.errors')

        <form action="{{ route('Admin.doLogin') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" name="email" class="form-control" name="" id="" aria-describedby="emailHelpId" placeholder="">
            </div>
            <h4></h4>
            <div class="form-group">
              <label for="">password</label>
              <input type="password" name="password" class="form-control" name="" id="" placeholder="">
            </div>
            <button type="submit" class="btn btn-primary">login</button>
        <a type="submit" class="btn btn-success" href="{{ url('dashboard/login/github') }}">Login with GitHup</a>

        </form>
    </div>





<script src="{{asset('admin/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('admin/js/bootstarp.min.js')}}"></script>
</body>
</html>
