<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\user_role;

class role extends Model
{
    public function userRoles(){
        return $this->hasMany(user_role::class);
    }

}
