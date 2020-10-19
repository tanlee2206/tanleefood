<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    public function ward()
    {
        return $this->belongsTo('App\Ward', 'ward_id', 'id');
        
    }
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
