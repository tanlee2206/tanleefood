<?php

namespace App\Http\Controllers;
use App\Shop;
use App\Orders;
use App\Orders_item;
use Auth;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {

        $shop = Shop::where('shop.user_id', Auth::user()->id)->first();
        $orders = orders::where('orders.shop_id', $shop->id)->get();
        
        return view('shop.pages.orders.list',compact('orders'));
    }
    public function detailorders(Request $request, $id){
        if ($request->ajax()) {
            $orders_detail = Orders::where('id',$id)->first();
            $total = 0;
            $orders_item = Orders_item::where('orders_id',$id)->get();
            foreach ($orders_item as $value) {
                $total += $value->amount;
            }
            $html = view('shop.pages.orders.orders_detail', compact('orders_detail','orders_item','total'))->render();
            return \response()->json($html);
        }
    }
    public function updateStatus(Request $request, $id)
    {
        // dd($request);
        $orders = Orders::find($id);
        $orders->status_id = $request->status_id;
        $orders->save();
        // $orders = orders::where('orders.shop_id', $shop->id)->get();
        // dd($orders);
        return redirect()->back();
    }
}
