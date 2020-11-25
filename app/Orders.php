<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    public function orders_item()
    {
        return $this->hasMany('App\Orders_item');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id', 'id');
    }
    public function shop()
    {
        return $this->belongsTo('App\Shop','shop_id', 'id');
    }
    public function address()
    {
        return $this->hasOne('App\Address');
    }
    public function status()
    {
        return $this->belongsTo('App\Status','status_id', 'id');
    }
}
