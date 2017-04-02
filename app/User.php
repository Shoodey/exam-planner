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
        'name', 'role_id', 'email', 'password', 'created_by'
    ];

    protected $appends = ['aid'];

    public function getAidAttribute()
    {
        $value = str_replace("@aui.ma", "", $this->email);
        return $value;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}
