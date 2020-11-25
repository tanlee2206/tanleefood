<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use App\Address;
use App\Image_food;
use App\Ward;
use App\User;
use App\Orders;
use App\Orders_item;
use App\District;
use App\Province;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index($province)
    {
       
            $province_now = Province::find($province);
            $province = Province::whereIn('name', ['Thành phố Hà Nội', 'Thành phố Cần Thơ','Thành phố Hồ Chí Minh'])->get();


            return view('customer.pages.blog.blog',compact('province','province_now'));
    
    }
}