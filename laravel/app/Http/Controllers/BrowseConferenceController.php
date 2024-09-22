<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrowseConferenceController extends Controller
{
    public function index()
    {
        $conferences = Conference::all(); // Ambil semua data conference
        return view('user.index', compact('conferences'));
    }

    public function browse()
    {
        $conferences = Conference::all();
        $isMember = Auth::user()->role_id === 3; // Ambil semua data conference
        return view('member.index', compact('conferences', 'isMember'));
    }
    public function showForUser($id)
    {
        $conference = Conference::findOrFail($id);
        return view('conference.showUser', compact('conference'));
    }
}
