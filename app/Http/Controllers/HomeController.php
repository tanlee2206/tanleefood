<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\Shop;
use App\Category;
use App\Address;
use App\Ward;
use App\District;
use App\Province;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        return redirect()->route('showhome','59');
        
    //     // $province = Province::all();
    //     $province = Province::whereIn('name', ['Thành phố Hà Nội', 'Thành phố Cần Thơ','Thành phố Hồ Chí Minh'])->get();
    //     // dd($province);
    //     // $ward = Ward::find(2000);
    //     // $district = District::find(3);
    //     // dd($ward->district->province);
    //     // $address_count = [];
    //     // foreach ($province as $province) {
    //     //    foreach ($province->district as $district) {
    //     //        foreach ($district->ward as $ward) {
    //     //          foreach ($ward->address as $address) {
    //     //              $address_count[]= $address->id;
    //     //          }

    //     //        }  
    //     //    }
    //     // }

    // //    dd(count($address_count));
    // //    $shop_count = Shop::whereIn('shop.address_id',$address_count)->get();
    // //    dd($shop_count);

    //     $food = Food::all()->take(12);
    //     $category = Category::all();
    //     return view('customer.index', compact('food','category','province'));
    }
    public function showhome($province)
    {
        $province_now = Province::find($province);
        $province = Province::whereIn('name', ['Thành phố Hà Nội', 'Thành phố Cần Thơ','Thành phố Hồ Chí Minh'])->get();
        $food = Food::all()->take(12);
        $category = Category::all();
        return view('customer.index', compact('food','category','province','province_now'));
    }
}
