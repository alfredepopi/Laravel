<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', function () {
    return view('login');
});

// deconnection du user et redirige vers la page login 

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::view("/admin", 'admin');
Route::view("/register", 'register');

// appel la function login dans le usesrcontroller 
Route::post("/login", [UserController::class, 'login']);
Route::post("/register", [UserController::class, 'register']);


Route::post("/addproducts", [ProductController::class, 'addProducts']);
Route::get("/", [ProductController::class, 'index']);

// fait en sorte d'afficher le ID de chaque produit
Route::get("detail/{id}", [ProductController::class, 'detail']);

// get la function search dans le productController 
Route::get("search", [ProductController::class, 'search']);
Route::post("add_to_cart", [ProductController::class, 'addToCart']);
Route::get("panier", [ProductController::class, 'Liste']);
Route::get("removecart/{id}", [ProductController::class, 'removeCart']);
Route::get("ordernow", [ProductController::class, 'orderNow']);
Route::post("orderplace", [ProductController::class, 'orderPlace']);
Route::get("myorders", [ProductController::class, 'myOrders']);