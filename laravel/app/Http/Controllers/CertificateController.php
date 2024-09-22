<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function certificateuser()
    {

        return view('certificate.certificateuser');
    }

    public function certificatemember()
    {

        return view('certificate.certificatemember');
    }

    public function download($id)
    {
        $transaction = Transaction::with(['user', 'conference'])->findOrFail($id);
        if ($transaction->user_id == auth()->id() && $transaction->status == 'approved') {
            $pdf = Pdf::loadView('certificate.certificate', [
                'user' => $transaction->user,
                'conference' => $transaction->conference
            ]);
            return $pdf->download('certificate.pdf');
        }
        return redirect()->back()->with('error', 'You are not authorized to download this certificate.');
    }
}
