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
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Un usuario tendrá varios mensajes (chusqers)
     */
    public function chusqers()
    {
        return $this->hasMany(Chusqer::class)->latest();
    }

    /**
     * Quién sigue un usuario.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function follows()
    {
       return $this->belongsToMany(User::class, 'followers', 'user_id', 'followed_id');
    }

    /**
     * Quién sigue a un usuario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'followed_id', 'user_id');
    }












}
