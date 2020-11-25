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
    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    // hàm search
    public function scopeName($query, $request)
    {
        if ($request->has('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        return $query;
    }


    public function scopeLocal($query, $request)
    {
        if ($request->district != null) {
            $query->whereHas('address.ward.district', function($q) use ($request){
                    $q->where('id','=',$request->district);
                });
        }

        return $query;
    }
    public function scopeProvince($query, $province_now)
    {
        if ($province_now->id != null) {
            $query->whereHas('address.ward.district.province', function($q) use ($province_now){
                    $q->where('id','=',$province_now->id);
                });
        }

        return $query;
    }
    public function scopeCate($query, $request)
    {
        if ($request->category != null) {
            $query->whereHas('food', function($q) use ($request){
                $q->whereHas('category', function($q) use ($request){
                    $q->where('category.id','=',$request->category);
                });
            });
        }

        return $query;
    }
    public function wishlist(){
        return $this->hasMany(Wishlist::class);
     }
}
