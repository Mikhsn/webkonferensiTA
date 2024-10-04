<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ReportsMemberController extends Controller
{
    public function member(){
        $members = User::where('role_id', 3)
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        return view('reports.member', compact('members'));
    }
}
