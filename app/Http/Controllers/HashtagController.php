<?php

namespace App\Http\Controllers;

use App\Hashtag;
use Illuminate\Http\Request;

class HashtagController extends Controller
{
    public function index($hashtag)
    {
        $hashtag = Hashtag::where('slug', $hashtag)->first();

        $chusqers = $hashtag->chusqers()->paginate(10);

        return view('hashtag.index', [
            'hashtag' => $hashtag,
            'chusqers'=> $chusqers
        ]);
    }
}
