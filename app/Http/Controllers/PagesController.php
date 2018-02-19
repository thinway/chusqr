<?php

namespace App\Http\Controllers;

use App\Chusqer;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Genera la página de inicio del proyecto.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home(){
        $chusqers = Chusqer::orderBy('created_at', 'desc')->paginate(2);

        return view('home', [
            'chusqers' => $chusqers
        ]);
    }

    /**
     * Página de saludo.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function saludo(){
        $saludo = "Bienvenidos a ADA-ITS";
        $usuario = "Fran";

        return view('saludo', [
            'saludo' => $saludo,
            'usuario'=> $usuario
        ]);
    }
}
