<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    protected $fillable = ['id','tenant_id','property_name','street_address_1','street_address_2','city','county','post_code','country','description','lat','lng','rent_price','property_deposit','property_type','bedrooms','year_built'];

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
    public function getTenantName($id) {
        $tenantName = Tenant::find($id)->toArray();
        return $tenantName['first_name'].' '.$tenantName['last_name'];
    }
    public function getNextPaymentDate($id) {
        $tenantNameAndRentDate = Tenant::find($id)->toArray();
        return $tenantNameAndRentDate['payment_date'];
    }
    public function getSingleImage($id) {
        $image = Property::find($id)->images()->firstOrFail();
        return $imagePath = $image->path;
    }
    public function getSingleTenant($id) {
        $tenant = Tenant::find($id);
        return $tenant;
    }
    public function getFiles($id) {
        $files = Files::all()->where('fileable_id',$id);
        return $files;
    }
}
