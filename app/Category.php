<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public function ordinance()
    {
        return $this->hasMany('App\Ordinance');
    }

     public function legalization()
    {
        return $this->hasMany('App\Legalization');
    }

}
