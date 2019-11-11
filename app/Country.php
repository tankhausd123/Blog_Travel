<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function nation()
    {
        return $this->belongsTo('App\Nation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function images()
    {
        return $this->hasMany('App\Image');
    }
}
