<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordinance extends Model
{

	protected $attributes = [
       'approver' => '',
    ];

    protected $appends = array(
        'file_count'
    );

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
  

    public function getFileCountAttribute()
    {
    
        $attachment_arr = @unserialize($this->uploaded_file);

        $folder = $attachment_arr['attachment_folder'];
        $files = $attachment_arr['files'];

        return count($files);

    }


}
