<?php

namespace App\Http\Controllers;

use App\Models\Conference;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Midtrans;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function buyConference(Request $request, $conference_id)
    {
        // Ambil data conference dan user
        $conference = Conference::findOrFail($conference_id);
        $user = auth()->user();

        // Generate order_id yang unik
        $orderId = 'CONF-' . time() . '-' . Str::random(8);

        // Buat transaksi order
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'conference_id' => $conference->id,
            'order_id' => $orderId, // Tambahkan order_id
            'transaction_status' => 'pending', // Status awal 'pending'
            'expired_at' => now()->addHours(12), // Tambahkan waktu 12 jam
        ]);

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Parameter transaksi Midtrans
        $params = array(
            'transaction_details' => array(
                'order_id' => $orderId,
                'gross_amount' => $conference->price,
            ),
            'customer_details' => array(
                'first_name' => $user->name,
                'email' => $user->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('member.buyconference', compact('snapToken', 'conference'));
    }


    public function success()
    {
        return view('member.success');
    }
}
