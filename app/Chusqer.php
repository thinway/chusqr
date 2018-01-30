<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chusqer extends Model
{
    // Con $fillable se indican explícitamente los campos de la tabla
    // que se podrán modificar programáticamente.
    //protected $fillable = ['content', 'author', 'image'];

    // Con $guarded se indican explícitamente los campos de la tabla
    // que NO se podrán modificar programáticamente.
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Un chusqer tiene varios hashtags.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function hashtags()
    {
        return $this->belongsToMany(Hashtag::class);
    }
}
