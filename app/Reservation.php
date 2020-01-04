<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //

    protected $fillable = [
        'payment_id', 
        'bookable_id', 
        'admin_id', 
        'user_id', 
        'bookable_item_name',
        'cell_id' ,
        'price',
        'code',
    ];


    //the source of the template
    public function payment()
    {
        return $this->belongsTo('App\Payment');
    }

    public function bookable()
    {
        return $this->belongsTo('App\Bookable');
    }
}
