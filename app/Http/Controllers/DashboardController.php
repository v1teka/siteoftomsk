<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

}
