<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'slug', 'password', 'avatar'
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
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function follows()
    {
       return $this->belongsToMany(User::class, 'followers', 'user_id', 'followed_id');
    }

    /**
     * Quién sigue A un usuario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'followed_id', 'user_id');
    }

    /**
     * Comprueba si un usuario sigue a otro.
     *
     * @param User $user
     * @return mixed
     */
    public function isFollowing(User $user)
    {
        return $this->follows->contains($user);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function isMe(User $user)
    {
        return $this->slug == $user->slug;
    }

    public function amI()
    {
        return Auth::user()->id == $this->id;
    }

}
