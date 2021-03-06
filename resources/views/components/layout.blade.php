<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>{{$title ?? 'Smart Soft it'}}</title>


    <!-- Bootstrap core CSS -->
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/blog.css')}}" rel="stylesheet">
  </head>
  <body>

<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="link-secondary" href="#">Subscribe</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="#">Large</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="link-secondary" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>
          @if(auth()->user())
              <form action="{{route('admin.logout')}}" method="POST">
                  @csrf
                  @method('POST')
                  <a href="{{route('admin.logout')}}"onclick="event.preventDefault();this.closest('form').submit()">Logout</a>
              </form>

          @else
        <a class="btn btn-sm btn-outline-secondary" href="{{route('signUp')}}">Sign up</a>
          @endif

      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">

        @foreach($category as $category)
            <a class="p-2 link-secondary" href="{{route('category.post',$category->slug)}}">{{ $category->name}}</a>
        @endforeach
    </nav>
  </div>
</div>

<main class="container">

{{$slot}}

</main>

<footer class="blog-footer">
  <p>Blog template built for <a href="#">Smart soft id</a> by <a href="#">@mdo</a>.</p>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>



  </body>
</html>
