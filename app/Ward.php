<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'wards';
    public function district()
    {
        return $this->belongsTo('App\District', 'district_id', 'id');
        
    }
    public function address()
    {
        return $this->hasMany(Address::class);
    }
}
