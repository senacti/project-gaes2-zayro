<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function error404()
    {
        return view('errors.404');
    }

    public function error500()
    {
        return view('errors.500');
    }

    public function index()
    {
        return view('index');
    }

    public function disfraces()
    {
        return view('disfraces');
    }

}