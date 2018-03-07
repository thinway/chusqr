<?php

namespace App\Http\Controllers;

use App\Chusqer;
use App\Hashtag;
use App\Http\Requests\CreateChusqerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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


        if( $image = $request->file('image') ){
            $url = $image->store('image','public');
        }else{
            $url = "https://picsum.photos/150/150/?random";
        }

        $chusqer = Chusqer::create([
            'user_id'   => $user->id,
            'content'   => $request->input('content'),
            'image'     => $url,
        ]);

        foreach ($hashtags as $singleHashtag){
            $hashtag = Hashtag::firstOrCreate(['slug' => $singleHashtag]);
            $chusqer->hashtags()->attach($hashtag);
        }

        return redirect('/');
    }

    /**
     * Edit the chusqer data.
     *
     * @param Chusqer $chusqer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Chusqer $chusqer)
    {
        if( ! Auth::user()->can('delete', $chusqer) ){
            return redirect()->route('home');
        }

        return view('chusqers.edit', [
            'chusqer' => $chusqer
        ]);
    }

    public function patch(CreateChusqerRequest $request, Chusqer $chusqer)
    {
        if( ! Auth::user()->can('delete', $chusqer) ){
            return redirect()->route('home');
        }

        if( $image = $request->file('image') ){
            if( !strpos($chusqer->image, "http") ) {
                $routeParts = explode('/', $chusqer->image);
                Storage::disk('public')->delete('chusqers/'.end($routeParts));
            }

            $url = $image->store('chusqers','public');
        }else{
            $url = $chusqer->image;
        }



        $chusqer->fill([
            'content' => $request->input('content'),
            'image'     => $url,
        ]);

        $chusqer->update();

        return redirect()->route('chusqers.show', $chusqer);

    }

    /**
     * @param Chusqer $chusqer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Chusqer $chusqer)
    {
        if( ! Auth::user()->can('delete', $chusqer) ){
            return redirect()->route('home');
        }

        $chusqer->delete();

        return redirect()->route('user', Auth::user()->slug);
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

    /**
     * Realiza una búsqueda sobre el contenido de los chusqers.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->input('keywords');

        $chusqers = Chusqer::where('content', 'like', "%{$query}%")->paginate(10);
        // Configuración para buscar en Algolia
        // $chusqers = Chusqer::search($query)->paginate(10);
        // $chusqers->load('user');

        return view('home', [
            'chusqers' => $chusqers,
        ]);
    }



}
