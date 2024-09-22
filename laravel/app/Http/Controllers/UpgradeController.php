<?php

namespace App\Http\Controllers;

use App\Models\MembershipPrice;
use App\Models\Payment;
use Illuminate\Http\Request;
use Midtrans\Snap;

class UpgradeController extends Controller
{
    public function upgrade(Request $request)
    {
        // Get the membership price for upgrading user to member
        $membershipPrice = MembershipPrice::where('membership_type', 'upgrade user to member')->first();

        if (!$membershipPrice) {
            return redirect()->back()->with('error', 'Harga upgrade tidak ditemukan.');
        }

        // Set Midtrans configuration
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Create transaction parameters
        $params = [
            'transaction_details' => [
                'order_id' => 'UPGRADE-' . uniqid(),
                'gross_amount' => $membershipPrice->price,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ]
        ];

        // Get Snap Token
        $snapToken = Snap::getSnapToken($params);

        // Create payment record
        $payment = Payment::create([
            'user_id' => auth()->id(),
            'payment_type' => 'upgrade_member',
            'order_id' => $params['transaction_details']['order_id'],
            'amount' => $membershipPrice->price,
            'transaction_status' => 'pending',
        ]);

        // Return view with Snap Token and membership price
        return view('payment.upgrade', compact('snapToken', 'membershipPrice'));
    }


}
