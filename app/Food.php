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
    public function image_food()
    {
        return $this->hasMany(Image_food::class);
    }
}
