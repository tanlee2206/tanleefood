<?php

namespace App\Http\Controllers;
use App\Shop;
use App\Food;
use App\Category;
use Auth;
use App\Address;
use App\Ward;
use App\District;
use App\Province;

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

    public function showlist($province)
    {
        $province_now = Province::find($province);
        $province = Province::whereIn('name', ['Thành phố Hà Nội', 'Thành phố Cần Thơ','Thành phố Hồ Chí Minh'])->get();
        $address_id = [];

           foreach ($province_now->district as $district) {
               foreach ($district->ward as $ward) {
                 foreach ($ward->address as $address) {
                    $address_id[] = $address->id;
                 }

               }  
           }

    //    $shop_count = Shop::whereIn('shop.address_id',$address_count)->get();
        $shop = Shop::whereIn('shop.address_id',$address_id)->paginate(8);
        $category = Category::all();
        //    dd($shop);
        return view('customer.pages.shop.shop',compact('shop','category','province','province_now'));
    }
    public function showlistCategory($province,$id)
    {
        $province_now = Province::find($province);
        $province = Province::whereIn('name', ['Thành phố Hà Nội', 'Thành phố Cần Thơ','Thành phố Hồ Chí Minh'])->get();
        $address_id = [];

           foreach ($province_now->district as $district) {
               foreach ($district->ward as $ward) {
                 foreach ($ward->address as $address) {
                    $address_id[] = $address->id;
                 }

               }  
           }
        
        $category_now = Category::find($id);
        $food=$category_now->food;
        $shop_id=[];
        foreach ($food as $item) {
            $shop_id[]= $item->shop_id ; 
        }
        $shop = Shop::whereIn('shop.id', $shop_id)->whereIn('shop.address_id',$address_id)->paginate(2);
        // dd($shop);
        // foreach ($category->food->shop as $food) {
        //    echo $food->name;
        // }
        // $shop_id = $shop->id;
        $category = Category::all();
    //     //    dd($shop);
        return view('customer.pages.shop.shop',compact('shop','category','province','province_now'));
    }
    public function showShopSingle($province,$slug)
    {
        $province_now = Province::find($province);
        
        $province = Province::whereIn('name', ['Thành phố Hà Nội', 'Thành phố Cần Thơ','Thành phố Hồ Chí Minh'])->get();
        $address_id = [];

           foreach ($province_now->district as $district) {
               foreach ($district->ward as $ward) {
                 foreach ($ward->address as $address) {
                    $address_id[] = $address->id;
                 }

               }  
           }
        
        $shop = Shop::where('slug', $slug)->whereIn('address_id', $address_id)->firstOrFail();
        $shop_id = $shop->id;
        $foods = Food::where('shop_id',$shop_id)->get();
        $category_name = [];
    
        foreach ($foods as $item) {
           foreach ($item->category as $cate) {
                
                if(!in_array($cate->name, $category_name))
                {
                    $category_name[]= $cate->name;
                   
                }

           }
        }
        // dd($foods->category->id);
        // $category = Category::whereIn('id', $foods->category->id);
        // // dd($foods);
        return view('customer.pages.shop.shop_single',compact('shop','foods','province','province_now','category_name' ));
        
    }
    public function dashboard()
    {
        $shop = Shop::where('user_id',Auth::user()->id)->first();
        // $category = Category::all();
        // dd($shop);
        return view('shop.index',compact('shop'));
    }
    public function index(){
        $shop = Shop::all();
        // dd($user);
        return view('admin.pages.shop.list',compact('shop'));
    }
    public function create(){
        
    }
    public function update(){
        
    }
    public function store(){
        
    }
    public function destroy(){
        
    }

}
