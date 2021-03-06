<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>@yield('title')-SSIT</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">SSIT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.category.index')}}">Categories</a>
                </li><li class="nav-item">
                    <a class="nav-link" href="{{route('admin.posts.index')}}">Post</a>
                </li>
                </li><li class="nav-item">
                    <form action="{{route('admin.logout')}}" method="POST">
                        @csrf
                        @method('POST')
                        <a class="nav-link"  href="{{route('admin.logout')}}"onclick="event.preventDefault();this.closest('form').submit()">Logout</a>
                    </form>
                </li>

            </ul>

        </div>
    </div>
</nav>
<div class="container">
@yield('main-container')
</div>


</body>
</html>
