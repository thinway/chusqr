<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Chusqer extends Model
{
    use Searchable;

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

    public function getImageAttribute($image)
    {
        if( starts_with($image, "https://")){
            return $image;
        }

        return  Storage::disk('public')->url($image);
    }

    public function toSearchableArray()
    {
        $this->load('user');

        return $this->toArray();
    }

}
