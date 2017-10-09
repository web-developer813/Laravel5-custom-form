<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class property_comment extends Model
{
    protected $fillable = [
      'comment',
      'creator_id',
      'property_id'
    ];

    public function creator(){
        return $this->belongsTo(User::class,'creator_id');
    }
}
