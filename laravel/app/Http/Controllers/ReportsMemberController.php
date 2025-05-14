<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportsMemberController extends Controller
{
    public function member(){
        $members = User::where('role_id', 3)
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        return view('reports.member', compact('members'));
    }

     public function cetakmember()
    {
        $members = User::where('role_id', 3)->get();

        $pdf = PDF::loadview('reports.member_pdf', compact('members'));
        return $pdf->stream();
    }
}
