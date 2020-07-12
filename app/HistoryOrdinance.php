<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryOrdinance extends Model
{
    //
    public function added_by()
    {
        return $this->hasOne(User::class,'id','uploaded_by');
    }
}
