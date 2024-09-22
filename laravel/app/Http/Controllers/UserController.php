<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function home(){
        return view('user.home');
    }


    public function edit(){
        $user = Auth::user();
        return view('user.edit', compact('user'));
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

        if ($request->input('password')){
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        return redirect()->route('user.home')->with('success', 'User updated ');
    }

    public function profile(){
        return view('user.profile');
    }

    public function listconference(){
        $conferences = Conference::paginate(3);
        return view('user.home', compact('conferences'));
    }




}
