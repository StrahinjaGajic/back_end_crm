<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $fillable = ['path','fileable_id','fileable_type'];

    protected $table = 'files';

    public function file()
    {
        return $this->morphTo();
    }
}
