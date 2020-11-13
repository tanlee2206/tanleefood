<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders_item extends Model
{
    protected $table = 'orders_item';
    public function orders()
    {
        return $this->belongsTo('App\Orders','orders_id', 'id');
    }
    public function food()
    {
        return $this->hasOne('App\Food');
    }
}
