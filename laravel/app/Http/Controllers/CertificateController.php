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

        // Cek apakah user berhak mendownload sertifikat
        if ($transaction->user_id == auth()->id() && $transaction->status == 'approved') {

            // Periksa jika sertifikat sudah diunduh
            if (!$transaction->certificate_downloaded) {
                // Mengubah status certificate_downloaded menjadi true
                $transaction->certificate_downloaded = true;
                $transaction->save();
            }

            // Menghasilkan PDF sertifikat menggunakan DomPDF
            $pdf = Pdf::loadView('certificate.certificate', [
                'user' => $transaction->user,
                'conference' => $transaction->conference
            ]);

            // Mengunduh sertifikat dalam bentuk PDF
            return $pdf->download('certificate.pdf');
        }

        return redirect()->back()->with('error', 'You are not authorized to download this certificate.');
    }

}
