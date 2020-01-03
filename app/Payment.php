<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'admin_id', 'user_id', 'total', 'method',
    ];


    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }



    //the customer ID that make the payment if reserved online....
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
