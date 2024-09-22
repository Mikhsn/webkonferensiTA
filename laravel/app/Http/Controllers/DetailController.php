<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function detail($id)
    {
        $conference = Conference::findOrFail($id);
        return view('conference.detail', compact('conference'));
    }
}
