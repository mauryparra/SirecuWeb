<?php

namespace App;

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
            foreach ($this->roles as $rol ) {
                echo '<br>' . $rol->name;
            }
            echo "Quita Rol -> " . Role::where('name', $role)->first()->name;
            return $this->roles()->detach(Role::where('name', $role)->first());
        }
        else
        {
            foreach ($this->roles as $rol ) {
                echo '<br>' . $rol->name;
            }
            echo "Agrega Rol -> " . Role::where('name', $role)->first()->name;
            return $this->roles()->attach(Role::where('name', $role)->first());
        }
    }
}
