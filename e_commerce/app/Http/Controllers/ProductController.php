<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;

class ProductController extends Controller
{
    //Voir dans la catalogue tous les produits
    function index()
    {
        $data = product::all();
        return view('product',['products'=>$data]);
    }
    //Voir les detais d'un seul produit
    function detail($id)
    {
        $data = product::find($id);

        return view('detail',['products'=>$data]);
    }
    //Recherche des produits
    function search(Request $req)
    {
        $data= Product::
        where('name', $req->input('query'))
        ->get();
        return view('search',['products'=>$data]);
    }
    //Mettre le produit dans le panier
    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            $cart= new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();
            return redirect('/');
        }
        else
        {
            return redirect('/login');
        }
    }
    //Augmenter le nombre d'articles dans le panier
    static function cartItem()
    {
       $userId=Session::get('user')['id'];
       return Cart::where('user_id',$userId)->count(); 
    }
    //Voir la liste des produits dans le panier
    function Liste()
    {
        $userId=Session::get('user')['id'];
        $products=DB::table('cart')
        ->join('products', 'cart.product_id', '=', 'products.id')
        ->where('cart.user_id', $userId)
        ->select('products.*', 'cart.id as cart_id')
        ->get();

        return view('cartlist', ['products'=>$products]);
    }
    //Enlever un article du panier
    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('panier');
    }
    //Commander les articles du panier
    function orderNow()
    {
        $userId=Session::get('user')['id'];
        $total= $products= DB::table('cart')
        ->join('products', 'cart.product_id', '=', 'products.id')
        ->where('cart.user_id', $userId)
        ->sum('products.price');

        return view('ordernow', ['total'=>$total]);
    }
    //Faire la commande
    function orderPlace(Request $req)
    {
        $userId=Session::get('user')['id'];
        $allCart= Cart::where('user_id', $userId)->get();
         foreach($allCart as $cart)
         {
            $order = new Order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->status="pending";
            $order->payment_method=$req->payment;
            $order->payment_status="pending";
            $order->address=$req->address;
            $order->save();
            Cart::where('user_id', $userId)->delete();
         }
        $req-> input();
        return redirect('/');
    }
    //Voir les commandes
    function myOrders()
    {
        $userId=Session::get('user')['id'];
        $orders = DB::table('orders')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->where('orders.user_id', $userId)
        ->get();

        return view('myorders', ['orders'=>$orders]);
    }
    //Ajouter un produit avec la page de l'admin
    function addProducts(Request $req)
    {
        $products = new Product();
        $products->name=$req->name;
        $products->price=$req->price;
        $products->brand=$req->brand;
        $products->description=$req->description;
        $products->category=$req->category;
        $products->gallery=$req->gallery;
        $products->quantity=$req->quantity;
        $products->save();
         return redirect('/admin');
    }
}
