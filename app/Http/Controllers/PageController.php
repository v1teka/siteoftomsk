<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //Главная страница
    public function index()
    {
        return view('pages.index');
    }

    //О нас
    public function about()
    {
        return view('pages.about');
    }
}
