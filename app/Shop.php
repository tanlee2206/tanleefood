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
}
