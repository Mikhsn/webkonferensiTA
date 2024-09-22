<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class MyConferenceController extends Controller
{
    public function myconferenceuser(){
        $user = auth()->user();
        $transactions = Transaction::where('user_id', $user->id)
                                  ->where('status', 'approved')
                                  ->with('conference')
                                  ->get();
        return view('myconference', compact('transactions'));
    }

    public function myconferencemember(){
        return view('myconferences');
    }
}
