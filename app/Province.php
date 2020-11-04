<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Province extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    public function district()
    {
        return $this->hasMany(District::class);
    }
    public function ward()
    {
        return $this->hasManyThrough(Ward::class, District::class);
    }
    public function address()
    {
        return $this->hasManyDeep(Address::class, [District::class, Ward::class]);
    }
}
