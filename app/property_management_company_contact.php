<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class property_management_company_contact extends Model
{
    protected $fillable = [
        'contact_type_id',
        'first_name',
        'last_name',
        'email',
        'property_id',
        'property_company_id'
    ];

    public function property_contact_type(){
        return $this->belongsTo(contact_type::class, 'contact_type_id');
    }
}
