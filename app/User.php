<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $table = 'users';
    public function shop()
    {
        return $this->hasOne('App\Shop');
    }
    public function address()
    {
        return $this->hasOne('App\Address');
    }
    public function permission()
    {
        return $this->belongsTo('App\Permission');
    }
    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
    public function wishlist(){
        return $this->hasMany(Wishlist::class);
     }


}
