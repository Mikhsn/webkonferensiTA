<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

        public function newsone()
        {
            $news = News::paginate(3);
            return view('navbar.news', compact('news'));
        }

        public function newssingle($id)
        {
            $newsItem = News::findOrFail($id);
            $news = News::all();
            return view('navbar.news-single', compact('newsItem','news'));
        }

}
