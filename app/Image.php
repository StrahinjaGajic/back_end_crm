<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path','imageable_id','imageable_type'];

    protected $table = 'images';

    public function image()
    {
        return $this->morphTo();
    }
}
