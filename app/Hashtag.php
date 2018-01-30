<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    protected $fillable = ['slug'];

    /**
     * Un hashtag tiene varios chusqers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function chusqers()
    {
        return $this->belongsToMany(Chusqer::class);
    }
}
