<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    public static function getCartItems(){
        if(Auth::check()){
            // if user is logged in / pick an auth id of the user
            $getCartItems = Cart::where('user_id', Auth::user()->id)->get();
        } else {
            // if user is not logged in
        }
        return $getCartItems;
    }
    public function photo(): BelongsTo {
        return $this->BelongsTo(BrockphotographyPhoto::class, 'image_id');
    }
}
