<?php

namespace App\Http\Controllers;

use App\Chusqer;
use App\Hashtag;
use App\Http\Requests\CreateChusqerRequest;
use Illuminate\Http\Request;

class ChusqersController extends Controller
{
    /**
     * Método que muestra la información de un mensaje. Utiliza Route Binding
     * para coneguir el Chusqer facilitado por el parámetro.
     *
     * @param Chusqer $chusqer
     * @return mixed
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
     * @return mixed
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
     * @return mixed
     */
    public function store(CreateChusqerRequest $request){

        $user = $request->user();

        $hashtags = $this->extractHashtags($request->input('content'));

        //dd($hashtags);

        $chusqer = Chusqer::create([
            'user_id'   => $user->id,
            'content'   => $request->input('content'),
            'image'     => 'http://lorempixel.com/150/150/?'.mt_rand(0,1000)
        ]);

        foreach ($hashtags as $singleHashtag){
            $hashtag = Hashtag::firstOrCreate(['slug' => $singleHashtag]);
            $chusqer->hashtags()->attach($hashtag);
        }

        return redirect('/');
    }

    public function extractHashtags($content)
    {
        preg_match_all("/(#\w+)/u", $content, $matches);

        if( $matches ){
            $hashtagsValues = array_count_values($matches[0]);
            $hashtags = array_keys($hashtagsValues);
        }

        array_walk($hashtags, function(&$value){
            $value = str_replace("#", "", $value);
        });

        return $hashtags;
    }
}
