<?php

namespace App\Http\Controllers;
use App\Shop;
use App\Orders;
use App\Orders_item;
use Auth;
use Illuminate\Http\Request;

class pdfController extends Controller
{
    public function index($id)
    {
        $orders_detail = Orders::where('id',$id)->first();
        $total = 0;
        $orders_item = Orders_item::where('orders_id',$id)->get();
        foreach ($orders_item as $value) {
            $total += $value->amount;
        }
    	$pdf = \PDF::loadView('shop.pages.orders.export_orders', compact('orders_detail','orders_item','total'));
    	return $pdf->download('bill'.$orders_detail->id.'.pdf');
    }
}
