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
}
