<?php

namespace App\Http\Controllers;
use App\Shop;
use App\Category;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function getLogin()
    {
        return view('shop.login');
    }
    public function postLogin(Request $request)
    {
        $input = $request->all();
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'login_name';
        if(auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password'])))
        {
            return redirect('/shop-manager');
        }else{
            return back()->with('error','không thể đăng nhập');
        }
    }

    public function showlist()
    {
        $shop = Shop::paginate(12);
        $category = Category::all();

        return view('customer.pages.shop',compact('shop','category'));
    }


}
