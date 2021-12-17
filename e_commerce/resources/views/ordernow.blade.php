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
          <a href="/" class="logo">Sweater Shop</a>
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
      <body>
<div class="custom-product">
        <div class="col-sm-10">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Amount</td>
                        <td>{{$total}} €</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>0 €</td>
                    </tr>
                    <tr>
                        <td>Delivery</td>
                        <td>10 €</td>
                    </tr>
                    <tr>
                        <td> Total Amount</td>
                        <td>{{$total+10}} €</td>
                    </tr>
                </tbody>
            </table>
            <div>
                <form action="/orderplace" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea name="address" placeholder="Enter your address" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Payment Method</label> <br> <br>
                        <input type="radio" value="cash" name="payment"><span>Online payement</span> <br> <br>
                        <input type="radio" value="cash" name="payment"><span>EMI payment</span> <br> <br>
                        <input type="radio" value="cash" name="payment"><span>Payment on Delivery</span> <br> <br>
                    </div>
                    <button type="submit" class="btn btn-default">Order Now</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>