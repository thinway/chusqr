<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Genera la página de inicio del proyecto.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home(){
        $chusqers = [
            [
                'id' => 1,
                'content' => 'Lorem fistrum no te digo trigo por no llamarte Rodrigor al ataquerl amatomaa te voy a borrar el cerito jarl fistro pupita papaar papaar pupita me cago en tus muelas. Ese que llega apetecan sexuarl tiene musho peligro no te digo trigo por no llamarte Rodrigor se calle ustée.',
                'author' => 'Chiquito de la Calzada',
                'image' => 'http://lorempixel.com/150/150'
            ],
            [
                'id' => 2,
                'content' => 'A peich va usté muy cargadoo a peich a wan pupita diodeno. Te voy a borrar el cerito se calle ustée ese hombree a wan torpedo va usté muy cargadoo me cago en tus muelas. La caidita torpedo no te digo trigo por no llamarte Rodrigor se calle ustée pecador condemor mamaar hasta luego Lucas tiene musho peligro. Condemor mamaar mamaar está la cosa muy malar jarl.',
                'author' => 'Gromenauar',
                'image' => 'http://lorempixel.com/150/150'
            ],
            [
                'id' => 3,
                'content' => 'Pupita caballo blanco caballo negroorl la caidita ese que llega tiene musho peligro fistro a wan fistro qué dise usteer apetecan apetecan.',
                'author' => 'Pecador',
                'image' => 'http://lorempixel.com/150/150'
            ],
            [
                'id' => 4,
                'content' => 'Se calle ustée al ataquerl a gramenawer diodeno te va a hasé pupitaa. Hasta luego Lucas diodenoo se calle ustée sexuarl amatomaa. Diodenoo condemor sexuarl no puedor benemeritaar.',
                'author' => 'Diodenar',
                'image' => 'http://lorempixel.com/150/150'
            ]
        ];

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
