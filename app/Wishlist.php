<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wish_list';
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
     }
     
     public function shop(){
        return $this->belongsTo('App\Shop', 'shop_id', 'id');
     }
}
