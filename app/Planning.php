<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $guarded=[];

    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }

}
