<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookableTemplate extends Model
{
    //

    

	protected $fillable = [
        'admin_id', 'children', 
    ];


    public function getChildrenAttribute($value)
    {
        return json_decode($value);
    }
}
