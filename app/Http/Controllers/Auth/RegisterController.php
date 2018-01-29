<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],[
            'name.required' => 'El nombre de usuario es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de caracteres',
            'name.max' => 'El nombre debe tener 255 caracteres como máximo',
            'name.unique' => 'El nombre de usuario ya existe.',
            'email.required' => 'El email de usuario es obligatorio.',
            'email.string' => 'El email debe ser una cadena de caracteres',
            'email.max' => 'El email debe tener 255 caracteres como máximo',
            'email.unique' => 'El email de usuario ya existe.',
            'password.required' => 'El password de usuario es obligatorio.',
            'password.string' => 'El password debe ser una cadena de caracteres',
            'password.max' => 'El nombre debe tener 6 caracteres como máximo',
            'password.confirmed' => 'Las contraseñas no coinciden'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'avatar'    => 'https://picsum.photos/150/150/?random',
        ]);
    }
}
