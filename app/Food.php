<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'food';


    
    public function shop()
    {
        return $this->belongsTo('App\Shop', 'shop_id', 'id');
        
    }
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}
