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
      <link rel="stylesheet" href="css/product.css">
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
          <a href="/" class="logo">Sweater Shop</a>
          <ul class="navlinks">
            <form action="/search" class="navbar-form navbar-left">
                    <div class="form-group">
                    <input type="text" name="query" class="form-control search-box" placeholder="Search">
                    </div>
                    <button type="submit" class="btn">Submit</button>
            </form>
            <li><a href="/myorders">Commande</a></li>
            <!-- affiche le nombre de produit dans le panier -->
            <li><a href="/panier">Panier({{$total}})</a></li>
            <!-- fait en sorte d'afficher le pseudo de l'utilisateur apres s'etre connecté -->
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
        <div class="custom-product">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
    <div class="carousel-inner">
        <!-- affiche les produits du site scroll-->
        @foreach ($products as $item)
        <div class="item {{$item['id']==1?'active':''}}">
            <a href="detail/{{$item['id']}}">

            <img class="slide-img" src="{{$item['gallery']}}">
            <div class="carousel-caption">
                <h3 class="noir">{{$item['name']}}</h3>
                <p class="noir">{{$item['description']}}</p>
            </div>
        </div>
        @endforeach
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
    <!-- affiche tout les produits du site -->
    <div class="trending-wrapper">
        <h3>Tous les Produits</h3>
        @foreach ($products as $item)
        <div class="trending-item">
        <a href="detail/{{$item['id']}}">

            <img class="trending-img" src="{{$item['gallery']}}">
            <div class="trending-wrapper">
                <h3 class="noir">{{$item['name']}}</h3>
            </div>
        </a>
        </div>
        @endforeach
    </div>
</div>
<footer>
    <div class="footer-basic">
        <footer>
            <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="/login">login</a></li>
                <li class="list-inline-item"><a href="/panier">Panier</a></li>
            </ul>
            <p class="copyright">SweaterShop, 2021</p>
        </footer>
    </div>
    <div id="consent-popup" class="hidden">
        <p>By using this site you agree to <a href="#">Terms and condictions</a>
        Please <a id="accept" href="#">Accept</a> these before using our site.
        </p>
    </div>
    <script src="../js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</footer>
</body>
</html>
