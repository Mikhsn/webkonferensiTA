<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index(){
        $users = User::where('role_id', 2)
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        return view('reports.index', compact('users'));
    }


}
