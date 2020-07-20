<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Legalization extends Model
{
    //

	public function added_by()
    {
        return $this->hasOne(User::class,'id','uploaded_by');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
