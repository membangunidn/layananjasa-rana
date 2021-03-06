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
        'hint', 'email', 'password', 'role', 'created_at', 'updated_at'
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

    function biodata() {
        return $this->hasOne('App\Biodata', 'iduser'); 
    }

    function role() {
        return $this->belongsTo('App\Role', 'idrole');
    }

    function lokasi() {
        return $this->hasOne('App\Lokasi', 'idlokasi');
    }
    
    function pendidikanterakhir() {
        return $this->hasOne('App/Jenpen','idjenjang');
    }
}
