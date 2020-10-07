<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Motorized extends Model
{
    //

    protected $table = 'motorized';

    protected $attributes = [
       'signed_form' => '',
       'date_or' => null,
    ];

    protected $appends = array(
        'form',
        'status',
    );


    public function getFormAttribute()
    {
        return 'CASE-NO-'.$this->case_no.'-'.strtoupper(str_slug($this->operator_name)).'.pdf';
    }

    public function getStatusAttribute () {

        $date_now = Carbon::today();
        $date_issue = Carbon::parse($this->date_issued);
        $data_status = intval($date_now->diffInYears($date_issue));

        return (intval($data_status)) >= 3 ? 'Expire' : "Good" ;
    }

}
