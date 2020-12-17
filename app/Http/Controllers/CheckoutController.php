<?php

namespace App\Http\Controllers;
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
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    
    public function confirm($province){
        if (isset(Auth::user()->id)) {
            $province_now = Province::find($province);
            $province = Province::whereIn('name', ['Thành phố Hà Nội', 'Thành phố Cần Thơ','Thành phố Hồ Chí Minh'])->get();
            // $province_all = Province::all();
            $districts = District::where('province_id',$province_now->id)->get();
            // dd($districts);
            $user = User::find(Auth::user()->id);


            return view('customer.pages.checkout.checkout',compact('province','province_now','user','districts','province_all'));
        }else {
            return redirect()->route('login.form')->with('message', 'bạn cần phải đăng nhập để mua hàng ');
        }
        
    }
    public function checkout(Request $request ,$province){
        
            // dd($request);
         // $this->validate($request, [
        //     // Validate the max number of characters to avoid database truncation
        //     'total' => ['required'],
        //     
        //     'user_id' => ['required'],
        //     'address_detail'=>['required', 'string'],
        //    
        //     'ward_id'=>['required'],
        //    
        //     // The user should select at least one category
        // ],[
        //     'total.required'=>'Bạn chưa nhập tên ',
        //     
        //     
        //     'user_id.required'=>'Bạn chọn hình ảnh',
        //     'address.required'=>'Bạn chưa nhập địa chỉ chi tiết',
        //     'ward_id.required'=>'Bạn chưa chọn phường xã',   
        // ]
        // );
       if ($request->payment_method == 1) {
            $cart = Session::get("Cart");
            $shop =  $shop[]=array(
                "orders_id" =>null,
                "shop_id" =>  null
                );
            foreach ($cart->food as $key) {
                if (!in_array_r($key['foodInfo']->shop_id,$shop)) {
                
                    $orders = new Orders();
                    $address = new Address();
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < 10; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    $orders->orders_code= $randomString;
                    $orders->user_id = $request->user_id;
                    // $orders->total = $request->total;
                    $orders->payment_method = $request->payment_method;
                    $orders->message=$request->message;
                    $orders->total = $key['price'];
                    $orders->shop_id=$key['foodInfo']->shop_id;
                    $orders->save();
                    $shop[]=array(
                        "orders_id" => $orders->id,
                        "shop_id" =>  $key['foodInfo']->shop_id
                    );
                    $address->orders_id = $orders->id;
                    $address->ward_id = $request->ward_id;
                    $address->address_detail = $request->address;
                    $address->save();

                    $orders_item = new Orders_item;
                    $orders_item->orders_id = $orders->id;
                    $orders_item->food_id=$key['foodInfo']->id; 
                    
                    $orders_item->amount =$key['price'];
                    $orders_item->number = $key['quanty'];
                    // $food = Food::find($key['foodInfo']->id);
                    // $food->number = $food->number - $key['quanty'];
                    $orders_item->save();
                    // $food ->save();
                    

                } 
                else{
                    foreach ($shop as $value) {
                    if ($value['shop_id'] == $key['foodInfo']->shop_id) {
                        $orders = Orders::find($value['orders_id']);
                        $orders->total +=  $key['price'];
                        $orders->save();
                        $orders_item = new Orders_item;
                        $orders_item->orders_id = $orders->id;
                        $orders_item->food_id=$key['foodInfo']->id; 
                        
                        $orders_item->amount =$key['price'];
                        $orders_item->number = $key['quanty'];
                        // $food = Food::find($key['foodInfo']->id);
                        // $food->number = $food->number - $key['quanty'];
                        $orders_item->save();
                        // $food ->save();
                    }
                    }
                
                }          
            }
            // dd($shop);
            Session::forget("Cart");
            $province_now = Province::find($province);
            $province = Province::whereIn('name', ['Thành phố Hà Nội', 'Thành phố Cần Thơ','Thành phố Hồ Chí Minh'])->get();
            return view('customer.pages.checkout.checkout_final', compact('province_now','province'))->with('message', 'đơn hàng đã được duyệt');
        }
        if ($request->payment_method == 2) {
            $cart = Session::get("Cart");
            $shop =  $shop[]=array(
                "orders_id" =>null,
                "shop_id" =>  null
                );
            foreach ($cart->food as $key) {
                if (!in_array_r($key['foodInfo']->shop_id,$shop)) {
                
                    $orders = new Orders();
                    $address = new Address();
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < 10; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    $orders->orders_code= $randomString;
                    $orders->user_id = $request->user_id;
                    // $orders->total = $request->total;
                    $orders->payment_method = $request->payment_method;
                    $orders->message=$request->message;
                    $orders->total = $key['price'];
                    $orders->shop_id=$key['foodInfo']->shop_id;
                    $orders->save();
                    $shop[]=array(
                        "orders_id" => $orders->id,
                        "shop_id" =>  $key['foodInfo']->shop_id
                    );
                    $address->orders_id = $orders->id;
                    $address->ward_id = $request->ward_id;
                    $address->address_detail = $request->address;
                    $address->save();

                    $orders_item = new Orders_item;
                    $orders_item->orders_id = $orders->id;
                    $orders_item->food_id=$key['foodInfo']->id; 
                    
                    $orders_item->amount =$key['price'];
                    $orders_item->number = $key['quanty'];
                    // $food = Food::find($key['foodInfo']->id);
                    // $food->number = $food->number - $key['quanty'];
                    $orders_item->save();
                    // $food ->save();
                    

                } 
                else{
                    foreach ($shop as $value) {
                    if ($value['shop_id'] == $key['foodInfo']->shop_id) {
                        $orders = Orders::find($value['orders_id']);
                        $orders->total +=  $key['price'];
                        $orders->save();
                        $orders_item = new Orders_item;
                        $orders_item->orders_id = $orders->id;
                        $orders_item->food_id=$key['foodInfo']->id; 
                        
                        $orders_item->amount =$key['price'];
                        $orders_item->number = $key['quanty'];
                        // $food = Food::find($key['foodInfo']->id);
                        // $food->number = $food->number - $key['quanty'];
                        $orders_item->save();
                        // $food ->save();
                    }
                    }
                
                }          
            }
            // dd($shop);
            // Session::forget("Cart");
            session(['cost_id' => $request->user_id]);
            session(['url_prev' => url()->previous()]);
            $vnp_TmnCode = "BLM6SRIX"; //Mã website tại VNPAY 
            $vnp_HashSecret = "XVVYHGEGYETWOQTWRHMJTSJFYIXUVUOX"; //Chuỗi bí mật
            $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://localhost:8000/return-vnpay";
            $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = ($cart->totalPrice) *100 ;
            $vnp_Locale = 'vn';
            $vnp_IpAddr = request()->ip();

            $inputData = array(
                "vnp_Version" => "2.0.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . $key . "=" . $value;
                } else {
                    $hashdata .= $key . "=" . $value;
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
                $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
                $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
            }
            Session::forget("Cart");
            return redirect($vnp_Url);





        //     $province_now = Province::find($province);
        //     $province = Province::whereIn('name', ['Thành phố Hà Nội', 'Thành phố Cần Thơ','Thành phố Hồ Chí Minh'])->get();
        //     return view('customer.pages.checkout.checkout_final', compact('province_now','province'))->with('message', 'đơn hàng đã được duyệt');
        }

        
    }
}
