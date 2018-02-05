<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {
        $user = $this->findUserByUsername($user);
        $chusqers = $user->chusqers()->paginate(10);

        return view('users.index', [
            'user'      => $user,
            'chusqers' => $chusqers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Muestra los usuarios que sigue un usuario.
     *
     * @param $username
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function follows($username)
    {
        $user = $this->findUserByUsername($username);

        return view('users.follows', ['user' => $user]);
    }

    /**
     * Sigue a un usuario.
     *
     * @param $username
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function follow($username, Request $request)
    {
        $user = $this->findUserByUsername($username);
        $me = $request->user();

        $me->follows()->attach($user);

        return redirect("/{$user->slug}")->withSuccess('Usuario Seguido');
    }

    public function unfollow($username, Request $request)
    {
        $user = $this->findUserByUsername($username);
        $me = $request->user();

        $me->follows()->detach($user);

        return redirect("/{$user->slug}")->withSuccess('Lo has dejado de seguir');

    }

    /**
     * Busca un usuario por su slug.
     *
     * @param $slug
     * @return mixed
     */
    public function findUserByUsername($slug)
    {
        return User::where('slug', $slug)->first();
    }
}
















