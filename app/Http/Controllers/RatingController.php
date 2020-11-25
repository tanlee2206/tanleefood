<?php

namespace App\Http\Controllers;
use App\Shop;
use Auth;
use App\Address;
use App\Ward;
use App\District;
use App\User;
use App\Rating;
use App\Province;
use Illuminate\Http\Request;

class RatingController extends Controller
{
   public function store(Request $request){
    $data = $request->all();
    #create or update your data here
   $rating = new Rating();
   $rating->user_id = $request->user_id;
   $rating->shop_id = $request->shop_id;
   $rating->content = $request->content;
   $rating->rating = $request->star;
   $rating->save();

   $rating = Rating::where('shop_id',$request->shop_id)->orderBy('id','DESC')->get();
   $html = view('customer.pages.shop.rating_ajax', compact('rating'))->render();

   return response()->json($html);
   }
}
