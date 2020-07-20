<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordinance extends Model
{

	protected $attributes = [
       'approver' => '',
    ];

    //
    public function added_by()
    {
        return $this->hasOne(User::class,'id','uploaded_by');
    }
    public function history()
    {
        return $this->hasMany(HistoryOrdinance::class);
    }


    public function category()
    {
        return $this->belongsTo('App\Category');
    }
  
}
