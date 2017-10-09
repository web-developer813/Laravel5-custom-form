<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class request_file extends Model
{
    protected $fillable = [
        'file_type',
        'description',
        'file_name',
        'creator_id'
    ];

    public function creator(){
        return $this->belongsTo(User::class,'creator_id');
    }
}
