<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;


class ReportsController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 2)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('reports.index', compact('users'));
    }

    public function cetak()
    {
        $users = User::where('role_id', 2)->get();

        $pdf = PDF::loadview('reports.user_pdf', compact('users'));
        return $pdf->stream();
    }
}
