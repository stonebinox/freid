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
        'name', 'email', 'password', 'provider', 'provider_id', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function balance()
    {
        return $this->hasOne('App\Models\Balance');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function withdrawal()
    {
        return $this->hasMany('App\Models\Withdrawals');
    }

    public function method()
    {
        return $this->hasMany('App\Models\Method');
    }

    public function report()
    {
        return $this->hasMany('App\Models\Report');
    }

    public function notification()
    {
        return $this->hasMany('App\Models\Notification');
    }
}
