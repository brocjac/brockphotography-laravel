<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    public static function getCartItems(){
        if(Auth::check()){
            // if user is logged in / pick an auth id of the user
            $getCartItems = Cart::where('user_id', Auth::user()->id)->get()->toArray();
        } else {
            // if user is not logged in
        }
        return $getCartItems;
    }
}
