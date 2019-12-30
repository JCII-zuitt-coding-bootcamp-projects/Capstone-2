<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    //

    protected $fillable = [
        'admin_id', 'name', 'address', 'google_map','details'
    ];
    

    
    public function admins()
    {
        return $this->hasMany('App\Admin');
    }

    public function bookableTemplates()
    {
        return $this->hasMany('App\BookableTemplate');
    }

}
