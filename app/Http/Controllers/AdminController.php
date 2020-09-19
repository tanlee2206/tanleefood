<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Food;
use App\Shop;
use App\Category;

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
            return back()->with('error','không thể đăng nhập');
        }
    }
    public function showFood()
    {

       
        $food = Food::all();
        // dd($food);
        return view('admin.pages.food.list',compact('food'));
    }

    
}
