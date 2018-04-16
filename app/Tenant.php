<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Property;

class Tenant extends Model
{
    protected $table = 'tenant';

    protected $fillable = ['id','first_name','last_name','street_address_1','street_address_2','city','county','post_code','countries','adult_number','children_number','occupant_names','deposit','paid','contract_length','phone','email','property','moved_in_date','payment_date','next_of_kin_full_name','next_of_kin_email','next_of_kin_phone'];


    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
    public function files()
    {
        return $this->morphMany('App\Files', 'fileable');
    }
    public function property() {
        return $this->belongsTo('App\Property');
    }
    public function getAssignedPropertyName($id) {
        $property = Property::find($id);
        $propertyName = $property->property_name;
        return $propertyName;
    }
}
