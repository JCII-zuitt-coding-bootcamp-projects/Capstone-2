<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookableTemplate extends Model
{
    //

    

	protected $fillable = [
        'name', 'notes', 'category', 
        'admin_id', 'children', 'bookable', 
    ];


    public function getChildrenAttribute($value)
    {
        return json_decode($value);
    }

    public function getBookableAttribute($value)
    {
        $encoded =  json_decode($value);

        if( is_array( $encoded ) ){

            return "{}";
        }else{
            return $encoded;
        }
    }


    // public function setBookableAttribute($value)
    // {   
    //     if($value == []){
    //         $this->attributes['bookable'] = "444";
    //     }else{
    //         $this->attributes['bookable'] = $value;
    //     }
        
    // }



    //the one who create the template
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

}
