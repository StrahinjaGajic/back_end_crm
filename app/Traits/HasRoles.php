<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use App\Models\Role;

trait HasRoles
{
    public static function bootHasRoles()
    {
        static::created(function ($model) {
            $model->assignRole(1);
        });
    }

    /**
     * User's roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function highestRole()
    {
        return $this->roles()->orderBy('level', 'desc')->first();
    }

    /**
     * Check if user has a role
     *
     * @param $name
     * @return bool
     */
    public function hasRole($name)
    {
        foreach ($this->roles as $role)
        {
            if (strtolower($role->name) == strtolower($name)) return true;
        }

        return false;
    }

    /**
     * Assign a role to the user
     *
     * @param $role
     * @return mixed
     */
    public function assignRole($role)
    {
        if (!$this->hasRole($role))
            return $this->roles()->attach($role);
    }

    /**
     * Revoke a role from the user
     *
     * @param $role
     * @return mixed
     */
    public function revokeRole($role)
    {
        if (!$this->hasRole($role))
            return $this->roles()->detach($role);
    }
}