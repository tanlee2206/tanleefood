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

}
