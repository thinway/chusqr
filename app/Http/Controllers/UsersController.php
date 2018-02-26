<?php

namespace App\Http\Controllers;

use App\Chusqer;
use App\Conversation;
use App\Http\Requests\UpdateUserRequest;
use App\PrivateMessage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware( function($request, $next){
            $this->user = auth()->user();

            return $next($request);
        });

        $this->user = auth()->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {
        $user = $this->findUserByUsername($user);
        $followers = $user->follows->pluck('id')->toArray();

        array_push($followers, $user->id);
        $chusqers = Chusqer::whereIn('user_id', $followers)->latest()->paginate(10);

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
    public function edit()
    {
        return view('users.edit', ['user' => $this->user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $path = $request->path();

        if( strpos($path, 'account')) {
            $data = array_filter($request->all());
            $user = User::findOrFail($this->user->id);

            $user->fill($data);
        }elseif ( strpos($path, 'password') ){


            if( ! Hash::check($request->get('current_password'), $this->user->password ) ){
                return redirect()->back()->with('error', 'La constraseña actual no es correcta');
            }

            if( strcmp($request->get('current_password'), $request->get('password')) == 0){
                return redirect()->back()->with('error', 'La nueva contraseña debe ser diferente de la antigua.');
            }

            $this->user->password = bcrypt($request->get('password'));
        }

        $user->save();

        return redirect()
            ->route('profile.account')
            ->with('exito', 'Datos actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $this->user->delete();

        return redirect()->route('home');
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
        $follows = $user->follows;

        return view('users.follows', [
            'user' => $user,
            'people' => $follows
        ]);
    }

    public function followers($username)
    {
        $user = $this->findUserByUsername($username);
        $followers = $user->followers;

        return view( 'users.follows', [
            'user' => $user,
            'people' => $followers,
        ]);
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

    public function sendPrivateMessage($username, Request $request)
    {
        $user = $this->findUserByUsername($username);
        $me = $request->user();

        $message = $request->input('message');

        $conversation = Conversation::between($me, $user);

        $private_message = PrivateMessage::create([
            'conversation_id' => $conversation->id,
            'user_id' => $me->id,
            'content' => $message,
        ]);

        return redirect('/conversations/'.$conversation->id);
    }

    public function showConversation(Conversation $conversation)
    {
        return view('users.conversation', [
            'conversation' => $conversation
        ]);
    }

    public function profile()
    {
        return view('users.edit');
    }
}
















