<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $fillable = ['monitor'];

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}

