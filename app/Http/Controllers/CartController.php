<?php

namespace App\Http\Controllers;
use App\Food;
use App\Cart;
use DB;
use Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(){
        $food = DB::table('food')->get();
        return view('customer.pages.cart.cart');
    }

    public function Addcart(Request $request,$id){
        $food = DB::table('food')->where ('id',$id)->first();

        if($food !=null){
            $oldCart = Session('Cart') ?  Session('Cart'): null;
            $newCart = new Cart($oldCart);
            $newCart->Addcart($food,$id);

            $request->session()->put('Cart',$newCart);



        }
        return view('customer.pages.cart.cart-ajax');


    }
    public function DeleteItemCart(Request $request,$id){
            $oldCart = Session('Cart') ?  Session('Cart'): null;
            $newCart = new Cart($oldCart);
            $newCart->DeleteItemCart($id);
            if(count($newCart->food)>0){
                $request->Session()->put('Cart',$newCart);
            }
            else{
                $request->Session()->forget('Cart');
            }

            return view('customer.pages.cart.cart-ajax');


    }
    // public function DeleteItemListCart(Request $request,$id){
    //     $oldCart = Session('Cart') ?  Session('Cart'): null;
    //     $newCart = new Cart($oldCart);
    //     $newCart->DeleteItemCart($id);
    //     if(count($newCart->food)>0){
    //         $request->Session()->put('Cart',$newCart);
    //     }
    //     else{
    //         $request->Session()->forget('Cart');
    //     }

    //     return view('ecommerce.cart.list_cart_ajax');
    // }
    // public function UpdateItemListCart(Request $request,$id,$quanty){
    //     $oldCart = Session('Cart') ?  Session('Cart'): null;
    //     $newCart = new Cart($oldCart);
    //     $newCart->UpdateItemCart($id,$quanty);

    //     $request->Session()->put('Cart',$newCart);
    //     return view('ecommerce.cart.list_cart_ajax');
    // }

}
