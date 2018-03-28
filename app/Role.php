<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'level'
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'pivot', 'id'
    ];

    public function is($name)
    {
        return (strtolower($this->name) == strtolower($name)) ? true : false;
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
