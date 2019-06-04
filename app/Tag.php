<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['code', 'name'];

    public function plannings()
    {
        return $this->hasMany('App\Planning');
    }
}
