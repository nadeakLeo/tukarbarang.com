<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','birthday','gender','address','phone', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function partnersOfMine() {
        return $this->belongsToMany('App\User', 'partners', 'user_id', 'partner_id');
    }
    public function partnerOf() {
        return $this->belongsToMany('App\User', 'partners', 'partner_id', 'user_id');
    }
    public function partners() {
        return $this->partnersOfMine->merge($this->partnerOf);
    }
}
