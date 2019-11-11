<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nation extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function countries()
    {
        return $this->hasMany('App\Country');
    }
}
