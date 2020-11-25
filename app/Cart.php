<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart{
	public $food = null;
	public $totalPrice = 0;
	public $totalQuanty = 0;
	public function __construct($cart){
		if($cart){
			$this->food = $cart->food;
			$this->totalPrice = $cart->totalPrice;
			$this->totalQuanty = $cart->totalQuanty;
			// $this->order = $cart->order;

		}

	}
	
	
	public function Addcart($food,$id,$image,$shop){
		// $image = Where:
		$newfood = ['quanty'=>0,'price'=>$food->price,'image'=>$image,'foodInfo'=>$food ,'shop'=>$shop];  // tạo mới
		if($this->food){
			if(array_key_exists($id, $this->food)){  //  kt nếu đã tồn tại
				$newfood =$this->food[$id];
			}
		}
		$newfood['quanty']++;
		$newfood['price'] = $newfood['quanty'] * ($food->price - $food->price*$food->sale/100) ;
		$this->food[$id] = $newfood;
		$this->totalPrice +=($food->price - $food->price*$food->sale/100);
		$this->totalQuanty ++;
	}
	public function DeleteItemCart($id){
		$this->totalPrice -= $this->food[$id]['price'];
		$this->totalQuanty -= $this->food[$id]['quanty'];
		unset($this->food[$id]);
	}
	public function UpdateItemCart($id, $quanty){
		$this->totalPrice -= $this->food[$id]['price'];
		$this->totalQuanty -= $this->food[$id]['quanty'];

		$this->food[$id]['quanty'] = $quanty;
		$this->food[$id]['price']= $quanty* ($this->food[$id]['foodInfo']->price - ($this->food[$id]['foodInfo']->price * $this->food[$id]['foodInfo']->sale / 100));

		$this->totalPrice += $this->food[$id]['price'];
		$this->totalQuanty += $this->food[$id]['quanty'];
	}
}
