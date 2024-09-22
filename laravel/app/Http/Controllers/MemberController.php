<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index(){
        return view('member.index');
    }

    public function home(){
        return view('member.home');
    }

    public function edit(){
        $user = Auth::user();
        return view('member.edit', compact('user'));
    }

    public function update(Request $request){
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }


        $user->save();
        return redirect()->route('member.home')->with('success', 'User updated successfully');
    }


    public function profile(){
        return view('member.profile');
    }

    public function listconference(){
        $conferences = Conference::paginate(3);
        return view('member.home', compact('conferences'));
    }

    public function download()
{
    $user = auth()->user();
    $pdf = Pdf::loadView('member.card', compact('user'));

    return $pdf->download($user->name . $user->member_id . '.pdf');
}
}
