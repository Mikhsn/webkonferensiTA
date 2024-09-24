<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrowseConferenceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $conferences = Conference::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%")
                         ->orWhere('description', 'like', "%{$search}%");
        })->get(); // Ambil semua data conference
        return view('user.index', compact('conferences'));
    }

    public function browse(Request $request)
    {
        $search = $request->input('search');
        $conferences = Conference::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%")
                         ->orWhere('description', 'like', "%{$search}%");
        })->get();
        $isMember = Auth::user()->role_id === 3; // Ambil semua data conference
        return view('member.index', compact('conferences', 'isMember'));
    }
    public function showForUser($id)
    {
        $conference = Conference::findOrFail($id);
        return view('conference.showUser', compact('conference'));
    }
}
