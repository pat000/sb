<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motorized extends Model
{
    //

    protected $table = 'motorized';


    protected $appends = array(
        'form'
    );


    public function getFormAttribute()
    {
        return 'CASE-NO-'.$this->case_no.'-'.strtoupper(str_slug($this->operator_name)).'.pdf';
    }

}
