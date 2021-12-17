<?php
use App\Http\Controllers\ProductController;

$total=0;
if(Session::has('user'))
$total= ProductController::cartItem()
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Detail</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
        <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
        <link rel="stylesheet" href="{{ asset('css/search.css') }}">
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
            <li><a href="/myorders">Commande</a></li>
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
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img class="detail-img" src="{{$products['gallery']}}">
                </div>
                <div class="col-sm-6">
                    <a href="/">Go Back</a>
                    <h2>{{$products['name']}}</h2>
                    <h3>Price : {{$products['price']}}</h3>
                    <h4>Details : {{$products['description']}}</h4>
                    <h4>Genre : {{$products['category']}}</h4>
                    <br><br>
                    <form action="/add_to_cart" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value={{$products['id']}}>
                    <button class="btn btn-primary">Ajouter au Panier</button>
                    </form>
                    <button class="btn btn-success">Acheter</button>
                </div>
            </div>
        <div class="footer-basic">
            <footer>
                <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Home</a></li>
                    <li class="list-inline-item"><a href="#">Services</a></li>
                    <li class="list-inline-item"><a href="#">About</a></li>
                </ul>
                <p class="copyright">SweaterShop, 2021</p>
            </footer>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
