<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use App\Orders;
use App\Orders_item;

class VnpayController extends Controller
{
    
    public function return(Request $request)
    {
        
        $url = session('url_prev','/');
        if($request->vnp_ResponseCode == "00") {
            // $this->apSer->thanhtoanonline(session('cost_id'));
            
            $province_now = Province::find(59);
            $province = Province::whereIn('name', ['Thành phố Hà Nội', 'Thành phố Cần Thơ','Thành phố Hồ Chí Minh'])->get();
            return view('customer.pages.checkout.checkout_final', compact('province_now','province'))->with('message' ,'Đặt hàng thành công, bạn có thể xem lại đơn hàng trong lịch sử mua hàng');
        }
        session()->forget('url_prev');
        return redirect($url)->with('errors' ,'Lỗi trong quá trình thanh toán phí dịch vụ');
    }
}
