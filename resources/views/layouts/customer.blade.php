<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-commerce</title>

    <!--Javascript-->
    <script src="{{ asset('js/app.js') }}" defer></script>
  

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

    <!-- Custom styles for this template -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>


  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container ">
      <a class="navbar-brand" href="{{ url('/home') }}">E-commerce <i class="fas fa-registered"></i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/home/items') }}">Products  <i class="fas fa-bars"></i>
            </a>
          </li>
          <li class="nav-item dropdown multi-level-dropdown">
              <a href="#" id="menu" data-toggle="dropdown" class="nav-link dropdown-toggle w-100">Category</a>
              <ul class="dropdown-menu mt-2 rounded-0 primary-color border-0 z-depth-1">
                @foreach($shareData['categories'] as $category)
                  <li class="dropdown-item dropdown-submenu">
                    <a data-toggle="dropdown"  class="dropdown-toggle w-100"><a href="{{route('categorySearch',$category->name)}}">{{$category->name}} </a></a>
                    @if ($category->children)
                    <ul class="dropdown-menu ml-2 rounded-0 primary-color border-0 z-depth-1">
                    @foreach($category->children as $childCategory)
                      @include('partials/subcategory-navbar', ['category' => $childCategory])                                                
                    @endforeach
                    </ul>
                    @endif
                  </li>
                @endforeach
              </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/home/wishlist') }}">Wishlist <i class="fas fa-heart"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/home/cart') }}">Cart <i class="fas fa-shopping-cart"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/home/orders') }}">Orders <i class="fas fa-stream"></i></a>
          </li>

        </ul>
        <form class="form-inline my-2 my-lg-0" action=" {{ route('search') }}" method="POST">
          @csrf
          <input class="form-control mr-sm-2" type="search" placeholder="Search product" aria-label="Search" name="title">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

    <main class="py-4">
        @yield('content')
    </main>
</body>

</html>