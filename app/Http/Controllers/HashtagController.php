<?php

namespace App\Http\Controllers;

use App\Hashtag;
use Illuminate\Http\Request;

class HashtagController extends Controller
{
    public function index(Hashtag $hashtag)
    {
        return view('hashtag.index', ['hashtag' => $hashtag]);
    }
}
