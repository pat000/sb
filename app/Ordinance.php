<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordinance extends Model
{
    //
    public function added_by()
    {
        return $this->hasOne(User::class,'id','uploaded_by');
    }
    public function history()
    {
        return $this->hasMany(HistoryOrdinance::class);
    }
}
