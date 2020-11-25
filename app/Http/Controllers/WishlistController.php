<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\User;
use App\Wishlist;

class WishlistController extends Controller
{
    public function addwishlist(Request $request){
       $wishlist = new Wishlist();
       $wishlist->user_id = $request->user_id;
       $wishlist->shop_id = $request->shop_id;
       $wishlist->save();
       return \response()->json();


    }
    public function removewishlist(Request $request){
        $wishlist = Wishlist::where('user_id',$request->user_id)->where('shop_id',$request->shop_id)->first();
        $wishlist->delete();
        return \response()->json();

    }
}
