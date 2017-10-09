<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class request_comment extends Model
{
    protected $fillable = [
        'comment',
        'creator_id',
        'request_id'
    ];

    public function creator(){
        return $this->belongsTo(User::class,'creator_id');
    }
}
