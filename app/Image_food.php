<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_food extends Model
{
    protected $table = 'image_food';
    public function food()
    {
        return $this->belongsTo('App\Food','food_id', 'id');
    }
}
