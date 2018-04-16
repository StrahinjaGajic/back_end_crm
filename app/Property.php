<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    protected $fillable = ['id','tenant_id','property_name','street_address_1','street_address_2','city','county','post_code','country','description','lat','lng','rent_price','property_deposit','property_type','bedrooms'];

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
    public function files()
    {
        return $this->morphMany('App\Files', 'fileable');
    }

    public function tenant() {
        return $this->belongsTo(Tenant::class);
    }
}
