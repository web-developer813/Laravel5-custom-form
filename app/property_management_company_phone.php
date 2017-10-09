<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class property_management_company_phone extends Model
{
    protected $fillable = [
        'phone_type_id',
        'area_code',
        'phone_number',
        'phone_ext',
        'property_company_id',
        'property_id',
    ];
    public function property_phone_type(){
        return $this->belongsTo(phone_type::class, 'phone_type_id');
    }
}
