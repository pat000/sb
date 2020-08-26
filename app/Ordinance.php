<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordinance extends Model
{

	protected $attributes = [
       'approver' => '',
    ];

    protected $appends = array(
        'file_count' , 'files','attachments' , 'file_folder'
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
    
    public function getAttachmentsAttribute()
    {
        return @unserialize($this->uploaded_file);
    }

    public function getFileCountAttribute()
    {
        return count($this->attachments['files']);
    }
    public function getFileFolderAttribute()
    {
        return $this->attachments['attachment_folder'];
    }

    public function getFilesAttribute()
    {
        return $this->attachments['files'];
    }


}
