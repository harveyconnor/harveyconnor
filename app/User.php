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
        'first_name','last_name','role_id', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        //Show page = true

        if (Auth::user()->role_id == 3)
        {
            return true;
        }
        return false;

    }

    public function pages() {
        return $this->hasMany(Page::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }
}
