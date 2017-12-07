<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
