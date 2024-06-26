<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset("assets/images/favicon.ico")}}">
    <style>
        .a-hov:hover {
            color: rgb(17, 17, 211);
            background: rgb(184, 179, 179); 
        }

        .a-hov {
            border-radius: 1rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light p-2 sticky-top" style="background-color: rgb(255, 255, 255);">
        <div class="container">
            <a href="\" class="navbar-brand">💬 Ping CRM</a>
            @guest
                <div class="d-flex">
                @if (substr_count(url()->current(), 'login'))
                    <a href="{{route('register.create')}}" class="a-hov nav-link fs-5 link-dark link-offset-2 link-underline link-underline-opacity-0 mx-2">Register</a>
                @elseif (substr_count(url()->current(), 'register'))
                    <a href="{{route('login')}}" class="a-hov nav-link fs-5 link-dark link-offset-2 link-underline link-underline-opacity-0 mx-2">Login</a> 
                @else
                    <a href="{{route('register.create')}}" class="a-hov nav-link fs-5 link-dark link-offset-2 link-underline link-underline-opacity-0 mx-2">Register</a>
                    <a href="{{route('login')}}" class="a-hov nav-link fs-5 link-dark link-offset-2 link-underline link-underline-opacity-0 mx-2">Login</a> 
                @endif
                </div>
            @endguest
            @auth
                <div class="d-flex justify-content-end me-5">
                    <form action="{{route('logout.user')}}" method="POST">
                        @csrf
                        <button type="submit" class="fs-5 btn btn-m btn-primary">Logout</button>
                    </form>
                </div>
            @endauth
        </div>
      </nav>



    {{$slot}}
</body>
</html>