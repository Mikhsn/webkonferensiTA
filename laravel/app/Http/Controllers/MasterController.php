<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\News;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index()
    {
        $conferences = Conference::paginate(4);
        $news = News::paginate(3);
        return view('navbar.home', compact('conferences','news'));
    }

    public function journals()
    {
        return view('navbar.journals');
    }


    public function conferences()
    {
        $conferences = Conference::all();
        return view('navbar.conferences', compact('conferences'));
    }
    public function ourteam()
    {
        return view('navbar.ourteam');
    }
}
