<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    //

    protected $fillable = [
        'admin_id', 'name', 'address', 'google_map','details'
    ];
    

    //staffs
    public function admins()
    {
        return $this->hasMany('App\Admin');
    }



    public function bookables()
    {
        return $this->hasMany('App\Bookable');
    }

    public function bookableTemplates()
    {
        return $this->hasMany('App\BookableTemplate');
    }

}
