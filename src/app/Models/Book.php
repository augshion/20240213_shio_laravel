<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'autbor_id' => 'required',
        'title' => 'required',
    );

    public function getTitle(){
        return 'ID'.$this->id . ':' . $this->title . ' 著者:' . optional($this->autbor)->name;
    }

    // 追記
    public function autbor(){
        return $this->belongsTo('App\Models\Autbor');
    }
}
