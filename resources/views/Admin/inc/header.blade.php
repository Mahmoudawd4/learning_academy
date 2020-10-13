<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashbourd</title>

    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Dashbourd</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('Admin.cats.index') }}">Category </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('Admin.trainer.index') }}">Trainers </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('Admin.courses.index') }}">Corses </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('Admin.students.index') }}">Students </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('Admin.logout') }}">logout </a>
                </li>


            </ul>
        </div>
    </nav>




