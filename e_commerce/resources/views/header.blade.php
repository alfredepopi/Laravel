<?php
use App\Http\Controllers\ProductController;

$total=0;
if(Session::has('user'))
$total= ProductController::cartItem()
?>
<!DOCTYPE html>
<html lang="fr">

  <head>
      <meta charset="UTF8">
      <meta name= "viewport" content= "width-device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="css/panier.css">
      <link rel="stylesheet" href="css/header.css">
      <link rel="stylesheet" href="css/footer.css">
      <link rel="stylesheet" href="css/search.css">
      <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
      <title>Sweater Store</title>
  </head>
      <header>
        <nav class="main-nav">
          <input type="checkbox" id="check" />
          <label for="check" class="menu-btn">
            <i class="fas fa-bars"></i>
          </label>
          <a href="#" class="logo">Sweater Shop</a>
          <ul class="navlinks">
            <form action="/search" class="navbar-form navbar-left">
                    <div class="form-group">
                    <input type="text" name="query" class="form-control search-box" placeholder="Search">
                    </div>
                    <button type="submit" class="btn">Submit</button>
            </form>
            <li><a href="/">Catalogue</a></li>
            <li><a href="/panier">Panier({{$total}})</a></li>
            @if(Session::has('user'))
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">{{Session::get('user')['name']}}
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="/logout">Log out</a></li>
                  </ul>
              </li>
              @else
              <li><a href="/login">Login</a></li>
              @endif
          </ul>
        </nav>
      </header>
</html>

</html>
