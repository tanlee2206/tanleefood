<?php

namespace App\Http\Controllers;
use DB;
use Session;
use App\Food;
use App\Shop;
use App\Image_food;
use App\Category;
use App\Address;
use App\Ward;
use App\District;
use App\Province;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if ($request->ajax()) {
            // $output = '';
            $foods = Food::where('shop_id',$request->shop_id)->where('name', 'LIKE', '%' . $request->search . '%')->get();
            if ($foods) {
                $html = view('customer.pages.shop.search_ajax', compact('foods'))->render();
            }
            
            return \response()->json($html);
        }
    }
    public function filter($province,Request $request)
    {
        $province_now = Province::find($province);
    //     foreach ($province_now->address as $address) {   
    //         $shop_id[] = $address->shop_id;

    //    }

        if ($request->ajax()){
            $shop = Shop::query()->name($request)
                                 ->province($province_now)
                                 ->local($request)
                                 ->cate($request)
                                 ->where('status',1)
                                 ->get();
            // dd($shop);
            $html = view('customer.pages.search.filter_ajax',compact('shop','province_now'))->render();
            return \response()->json($html);
            // return $request;
        }
           
    
    }
    public function getfilter($province){
        $province_now = Province::find($province);
        $province = Province::whereIn('name', ['Thành phố Hà Nội', 'Thành phố Cần Thơ','Thành phố Hồ Chí Minh'])->get();
        $category = Category::all();
        
       $shop = Shop::query()->province($province_now)->where('status',1)->get();
        $districts = District::where('province_id', $province_now->id)->get();
        return view('customer.pages.search.search',compact('province','province_now','category','districts','shop'));
        
    }
    

}
