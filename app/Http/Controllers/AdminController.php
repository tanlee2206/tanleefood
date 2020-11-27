<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\Food;
use App\Category;
use Auth;
use App\Address;
use App\Ward;
use App\District;
use App\User;
use App\Orders;
use App\Rating;
use App\Province;
use DB;

class AdminController extends Controller
{
    public function getLogin()
    {
        return view('admin.login');
    }
    public function postLogin(Request $request)
    {
        $input = $request->all();
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'login_name';
        if(auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password'])))
        {
            return redirect('/admin');
        }else{
            return back()->with('message', 'email hoặc mật khẩu không đúng!');
        }
    }
    public function showFood()
    {

       
        $food = Food::all();
        // dd($food);
        return view('admin.pages.food.list',compact('food'));
    }
    public function dashboard()
    {
        $users = User::where('permission_id', '=', 3)->count();
        $shop = Shop::where('status', '=', 1)->count();
        $orders = Orders::count();
        $orders_total =Orders::sum('total');



        return view('admin.index',compact('users','shop','orders','orders_total'));
    }


    
}
