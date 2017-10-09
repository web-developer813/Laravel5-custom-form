<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class request extends Model
{
    protected $fillable = [
        'requestor_name',
        'requestor_phone',
        'requestor_fax',
        'scope',
        'details',
        'source_id',
        'bid_statuses_id',
        'estimator_id',
        'create_id',
        'assign_id',
        'editor_id',
        'assign_date',
        'property_id',
        'property_phone_id',
        'property_contact_id',
        'property_contact_phone_id',
        'property_company_id',
        'property_company_phone_id',
        'property_company_contact_id',
    ];

    public function assignBy(){
        return $this->belongsTo(User::class, 'create_id');
    }
    public function estimator(){
        return $this->belongsTo(User::class, 'estimator_id');
    }

}
