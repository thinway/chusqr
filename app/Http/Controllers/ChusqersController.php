<?php

namespace App\Http\Controllers;

use App\Chusqer;
use App\Http\Requests\CreateChusqerRequest;
use Illuminate\Http\Request;

class ChusqersController extends Controller
{
    /**
     * Método que muestra la información de un mensaje. Utiliza Route Binding
     * para coneguir el Chusqer facilitado por el parámetro.
     *
     * @param Chusqer $chusqer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Chusqer $chusqer)
    {
        return view('chusqers.show', [
            'chusqer' => $chusqer
        ]);
    }

    /**
     * Método para mostrar el formulario de alta de una nuevo mensaje Chusqer.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('chusqers.create');
    }

    /**
     * Guarda en la base de datos la información facilitada para un nuevo mensaje.
     * Utiliza la definición personalizada de un Request para validar los datos.
     *
     * @param CreateChusqerRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateChusqerRequest $request){

        $user = $request->user();

        Chusqer::create([
            'user_id'   => $user->id,
            'content'   => $request->input('content'),
            'author'    => 'thinway',
            'image'     => 'http://lorempixel.com/150/150/?'.mt_rand(0,1000)
        ]);

        return redirect('/');
    }
}
