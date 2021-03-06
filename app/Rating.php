<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';
    public function shop()
    {
        return $this->belongsTo('App\Shop', 'shop_id', 'id');
        
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
        
    }
}
