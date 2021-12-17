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
        <title>Product</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/search.css">
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
<div class="custom-product">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h4>Tous les Resultats</h4>
                <a class="btn btn-success" href="ordernow">Acheter maintenant</a><br><br>
                @foreach ($products as $item)
                <div class="row searched-item cart-list-devider">
                    <div class="col-sm-3">
                    <a href="detail/{{$item->id}}">
                    <img class="trending-img" src="{{$item->gallery}}">
                </a>
                    </div>
                    <div class="col-sm-4">
                    <a href="detail/{{$item->id}}">
                    <div class="trending-wrapper">
                        <h2 class="noir">{{$item->name}}</h2>
                        <h5 class="noir">{{$item->description}}</h5>
                    </div>
                </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">Remove to Cart</a>
                    </div>
                </a>
                    </div>
                </div>
            @endforeach
            </div>
            <a class="btn btn-success" href="ordernow">Acheter maintenant</a>
        </div>
    </div>
    <style>
        .img.slide-img{
            height: 400px !important
        }
        .slider-text{
            background-color: #35443585 !important;
        }
        .noir{
            color:black;
        }
        .trending-img{
            height:100px;
        }
        .trending-item{
            float:left;
            width: 20%;
        }
        .trending-wrapper{
            margin:30px;
        }
        .cart-list-devider{
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
            padding-bottom: 20px;
        }
    </style>
    </body>
    </html>
