<?php

namespace App;

use App\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $with = [
        'roles',
    ];

    public function roles()
    {
      return $this->belongsToMany(Role::class);
    }

    public function hasRole($name)
    {
        foreach ($this->roles as $role)
        {
            if ($role->name == $name) return true;
        }

        return false;
    }

    public function toggleRole($role)
    {
        if ($this->hasRole($role))
        {
            return $this->roles()->detach(Role::where('name', $role)->first());
        }
        else
        {
            return $this->roles()->attach(Role::where('name', $role)->first());
        }
    }

    public function assignRoles($roles)
    {
        foreach (Role::all() as $rol) {
            if ($this->hasRole($rol->name) != in_array($rol->name, $roles))
            {
                $this->toggleRole($rol->name);
            }
        }
    }
}
