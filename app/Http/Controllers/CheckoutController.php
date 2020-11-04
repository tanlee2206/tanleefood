<?php

namespace App\Http\Controllers;
use App\Food;
use App\Cart;
use DB;
use Auth;
use Session;
use App\Address;
use App\Image_food;
use App\Ward;
use App\User;
use App\District;
use App\Province;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function confirm($province){
        if (isset(Auth::user()->id)) {
            $province_now = Province::find($province);
            $province = Province::whereIn('name', ['Thành phố Hà Nội', 'Thành phố Cần Thơ','Thành phố Hồ Chí Minh'])->get();
            // $province_all = Province::all();
            $districts = District::where('province_id',$province_now->id)->get();
            // dd($districts);
            $user = User::find(Auth::user()->id);


            return view('customer.pages.checkout.checkout',compact('province','province_now','user','districts','province_all'));
        }else {
            return redirect()->route('login.form')->with('message', 'bạn cần phải đăng nhập để mua hàng ');
        }
        
    }
    public function checkout(Request $request ,$province){


    }
}
