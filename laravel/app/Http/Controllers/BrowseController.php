<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class BrowseController extends Controller
{
    public function showForMember($id)
    {
        $conference = Conference::findOrFail($id);
        return view('conference.show', compact('conference'));
    }
}
