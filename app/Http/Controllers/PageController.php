<?php

namespace App\Http\Controllers;

use App\Variable;
use Illuminate\Http\Request;
use App\Project;

class PageController extends Controller
{
    //Главная страница
    public function index()
    {
        //$projects = Project::moderated()->latest()->limit(6)->get();
        $projects = Project::onMainPage()->orderBy('show_on_main_page')->get();
        $questionnaire = Variable::find('questionnaire');
        return view('pages.index', compact(['projects', 'questionnaire']));
    }

    //О нас
    public function about()
    {
        return view('pages.about');
    }
}
