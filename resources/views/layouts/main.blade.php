<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>@yield('title') - Shopping Cart Demo</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @yield('css') 
  </head>

  <body>

    <main role="main">

      <section class="jumbotron text-center bg-warning">
        <div class="container">
          <h1 class="jumbotron-heading ">Online Store</h1>
          <p class="lead text-muted">Shopping Cart Demo</p>
          <p class="small text-muted">by <a href="https://github.com/msubero">Maria Subero</a></p>
        </div>
      </section>
      
      @include('helpers.top-bar')
      
      <div class="album py-5 bg-light">
        <div class="container">
          @include('helpers.messages')
          <div class="row">
            @yield('content')
          </div>
        </div>
      </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <div class="container">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <div class="fixed-bottom">
        <a href="{{ url('shopping-cart') }}" class="btn btn-dark btn-lg btn-block">
          <span class="badge badge-light">
            <i class="fa fa-shopping-cart"></i>
            {{ session('cart')? count(session('cart')):0 }}
          </span>
          @lang('app.shopping_cart.buy')
        </a>
      </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
