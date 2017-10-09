<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class property extends Model
{
    protected $fillable = [
        'property_name',
        'property_type_id',
        'property_street',
        'property_city',
        'property_state',
        'property_zip',
        'property_country',
        'mail_to_type_id'
    ];
}
