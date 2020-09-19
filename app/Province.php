<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function district()
    {
        return $this->hasMany(District::class);
    }
    public function ward()
    {
        return $this->hasMany(Ward::class);
    }
}
