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
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/login.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
  />
    <title>Sweater Store</title>
</head>
<body>
 <header>
        <nav class="main-nav">
          <input type="checkbox" id="check" />
          <label for="check" class="menu-btn">
            <i class="fas fa-bars"></i>
          </label>
          <a href="/" class="logo">Sweater Shop</a>
          <ul class="navlinks">
            <li><a href="/">Catalogue</a></li>
            <li><a href="/panier">Panier({{$total}})</a></li>
          </ul>
        </nav>
      </header>
        <form class="login-box" action="login" method="POST">
            <h1>Login</h1>
            <div class="textbox">
                @csrf
                <label for="exampleInputEmail">Email</label>
                <input type="email" name="email" id="email" value="">
            </div>

            <div class="textbox">
                <label for="exampleInputPassword">Password</label>
                <input type="password" name="password" id="password" value="">
            </div>

            <button class="btn" type="submit" name="" value="Sign in">Sign In</button>
        <div class="link">
<a href="#">Registration</a>
<a href="#">Forgot your password</a>
        </div>
</form>
</body>