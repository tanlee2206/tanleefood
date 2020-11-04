<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shop';


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
        
    }
    public function address()
    {
        return $this->hasOne('App\Address');
    }
    public function food()
    {
        return $this->hasMany('App\Food');
    }
    public function category()
    {
        return $this->hasManyThrough(Category::class, Food::class);
    }
}
