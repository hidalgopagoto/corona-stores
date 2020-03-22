<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request)
    {
        $data = [];
        return view('home')->with($data);
    }

    public function quemsomos(Request $request)
    {
        $data = [];
        return view('quem-somos')->with($data);
    }

    public function termos(Request $request)
    {
        $data = [];
        return view('quem-somos')->with($data);
    }

    public function contato(Request $request)
    {
        $data = [];
        return view('contato')->with($data);
    }
}
