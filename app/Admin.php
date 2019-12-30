<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin  extends Authenticatable
{
    use Notifiable;



    protected $guard = 'admin';



    protected $fillable = [
        'name', 'email', 'username', 'password','email_verfied_at' , 'business_id'
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



    public function bookables()
    {
        return $this->hasMany('App\Bookable');
    }

    public function bookableTemplates()
    {
        return $this->hasMany('App\BookableTemplate');
    }


    public function business()
    {
        return $this->belongsTo('App\Business');
    }


} 