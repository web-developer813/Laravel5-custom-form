<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\contact_type;
class property_contact extends Model
{
    protected $fillable = [
        'contact_type_id',
        'first_name',
        'last_name',
        'email',
        'property_id',
    ];

    public function property_contact_type(){
        return $this->belongsTo(contact_type::class, 'contact_type_id');
    }
}
