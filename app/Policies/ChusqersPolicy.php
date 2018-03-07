<?php

namespace App\Policies;

use App\User;
use App\Chusqer;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ChusqersPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the chusqer.
     *
     * @param  \App\User  $user
     * @param  \App\Chusqer  $chusqer
     * @return mixed
     */
    public function view(User $user, Chusqer $chusqer)
    {
        //
    }

    /**
     * Determine whether the user can create chusqers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the chusqer.
     *
     * @param  \App\User  $user
     * @param  \App\Chusqer  $chusqer
     * @return mixed
     */
    public function update(User $user, Chusqer $chusqer)
    {
        //
    }

    /**
     * Determine whether the user can delete the chusqer.
     *
     * @param  \App\User  $user
     * @param  \App\Chusqer  $chusqer
     * @return mixed
     */
    public function delete(User $user, Chusqer $chusqer)
    {
        return $user->id == $chusqer->user_id;
    }
}
