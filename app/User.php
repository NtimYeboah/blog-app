<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Cast field values
     *
     * @var array
     */
    protected $casts = [
        'is_admin' => 'boolean',
        'is_app_owner' => 'boolean'
    ];

    /**
     * Hash password
     *
     * @param string $password
     * @return void
     */
    public function setPasswordAttribute($password) : void
    {
        $this->attributes['password'] = $password;

        if (Hash::needsRehash($password)) {
            $this->attributes['password'] = Hash::make($password);
        }
    }

    /**
     * Checks if user is admin
     *
     * @return boolean
     */
    public function isAdmin() : bool
    {
        return (bool) $this->is_admin;
    }

    /**
     * Checks if user is app owner
     *
     * @return boolean
     */
    public function isAppOwner() : bool
    {
        return (bool) $this->is_app_owner;
    }
}
