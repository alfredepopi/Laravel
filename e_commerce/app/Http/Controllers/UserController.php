<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class UserController extends Controller
{
    //Faire la connexion
    function login(Request $req)
    {
        $user= User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password, $user->password))
        {
            return "Username or password is not matched";
        }
        else{
            $req->session()->put('user', $user);
            $role=Session::get('user')['role'];

        if($role=='admin')
        {
           return redirect('/admin'); 
        }
        else
        {
            return redirect('/');
        }
        }
    }
    //Faire l'inscription
    function register(Request $req)
    {
        //return $req->input();
        $user = new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->save();
         return redirect('/login');


    }
}
