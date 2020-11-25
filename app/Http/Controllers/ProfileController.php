<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use App\Address;
use App\Image_food;
use App\Ward;
use App\User;
use App\Shop;
use App\Wishlist;
use App\Orders;
use App\Orders_item;
use App\District;
use App\Province;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($province)
    {
        if (Auth::user() != null) {
            $province_now = Province::find($province);
            $province = Province::whereIn('name', ['Thành phố Hà Nội', 'Thành phố Cần Thơ','Thành phố Hồ Chí Minh'])->get();
            $province_all = Province::all();


            $user = User::find(Auth::user()->id);
            $orders = Orders::where('user_id',$user->id)->orderBy('id','DESC')->get();
            // dd($orders);
            $shop_wl = Wishlist::where('user_id',Auth::user()->id)->get();
            // dd($shop_wl->shop);

            return view('customer.pages.profile.profile',compact('province','province_now','user','orders','province_all','shop_wl'));
        }
        else{
            return redirect()->back();
        }
    }
    public function updateProfileUser(Request $request, $id)
    {
        //  dd($request);
        $user = User::find($id);
        if ($user->address != null) {
            $address = Address::find($user->address->id);
        }
        else{
            $address = new Address();
        }
       
        // dd($address);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->login_name = $request->login_name;
        // $user->password=bcrypt($request->password);
        $user->img = $request->img;
        $user->email = $request->email;
        $user->permission_id = 1;
        $user->save(); 
        $address->ward_id = $request->ward_id;
        $address->user_id = $user->id;
        $address->address_detail = $request->address;
        
        $address->save();  
        return redirect()->back()->with('message', 'chỉnh sửa thành công!');
    }


}
