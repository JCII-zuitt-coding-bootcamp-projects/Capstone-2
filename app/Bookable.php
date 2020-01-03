<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookable extends Model
{
    //

    protected $fillable = [
        'admin_id', 'business_id', 'bookable_template_id', 'name', 'image','description' , 'start_at' , 'end_at'
    ];

    
    protected $dates = ['created_at', 'updated_at', 'start_at', 'end_at'];

    //the one who created the bookable schedule
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }


    //the source of the template
    public function bookableTemplate()
    {
        return $this->belongsTo('App\BookableTemplate');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }


    public function setStartAtAttribute($value)
    {
        $this->attributes['start_at'] = $value;//$value->toDateTimeString();
    }

    public function setEndAtAttribute($value)
    {
        $this->attributes['end_at'] = $value;//$value->toDateTimeString();
    }

}
