<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyFiles extends Model
{
    protected $table = 'property_files';

    protected $fillable = ['id','property_id','path'];

}
