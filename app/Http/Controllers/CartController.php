<?php

namespace App\Http\Controllers;
use App\Food;
use App\Shop;
use App\Cart;
use DB;
use Session;
use App\Address;
use App\Image_food;
use App\Ward;
use App\District;
use App\Province;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart($province){
        $food = DB::table('food')->get();
        $province_now = Province::find($province);
        $province = Province::whereIn('name', ['Thành phố Hà Nội', 'Thành phố Cần Thơ','Thành phố Hồ Chí Minh'])->get();
        return view('customer.pages.cart.cart',compact('province','province_now','shop'));
    }

    public function Addcart(Request $request,$id){
        $food = Food::where('id',$id)->first();
        $shop = Shop::find($food->shop_id);
        if ($food->image_food->count()) {
            foreach ($food->image_food as $item) {
                if ($item->index == 0) {
                    $image = $item->path;
                }
             }
        }
        else {
            $image = 'asset/admin/images/image-placeholder.jpg';
        }
        if($food !=null){
            $oldCart = Session('Cart') ?  Session('Cart'): null;
            $newCart = new Cart($oldCart);
            $newCart->Addcart($food,$id,$image,$shop);

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
    public function DeleteCart(){
               Session()->forget('Cart');
    }
    public function DeleteItemListCart(Request $request,$id){
        $oldCart = Session('Cart') ?  Session('Cart'): null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if(count($newCart->food)>0){
            $request->Session()->put('Cart',$newCart);
        }
        else{
            $request->Session()->forget('Cart');
        }

        return view('customer.pages.cart.listcart-ajax');
    }
    public function UpdateItemListCart(Request $request,$id,$quanty){
        $oldCart = Session('Cart') ?  Session('Cart'): null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($id,$quanty);

        $request->Session()->put('Cart',$newCart);
        return view('customer.pages.cart.listcart-ajax');
    }

}
