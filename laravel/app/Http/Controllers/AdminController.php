<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function transactions()
    {
        $transactions = Transaction::with('user', 'conference')->paginate(5);
        return view('admin.transactions', compact('transactions'));
    }

    public function approve($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->status = 'approved';

        $transaction->start_time = now();
        $transaction->end_time = now()->addHours(12);

        $transaction->save();

        return redirect()->route('admin.transactions')->with('success', 'Transaction approved.');
    }

    public function reject($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->status = 'rejected';
        $transaction->save();

        return redirect()->route('admin.transactions')->with('success', 'Transaction rejected.');
    }

    public function showPayments()
    {
        $payments = Payment::with('user')->paginate(5);
        return view('admin.payments', compact('payments'));
    }

    public function approvePayment($id)
    {
        $payment = Payment::findOrFail($id);

        // Ubah status pembayaran menjadi approved
        $payment->transaction_status = 'approved';
        $payment->save();

        // Ubah role user menjadi member
        $user = User::findOrFail($payment->user_id);
        $user->role_id = 3; // Misalnya 3 adalah role untuk member
        $user->member_id = $this->generateMemberId($user->id);
        $user->save();

        return redirect()->route('payments.index')->with('success', 'Payment approved and user upgraded to member.');
    }

    public function rejectPayment($id)
    {
        $payment = Payment::findOrFail($id);

        // Ubah status pembayaran menjadi rejected
        $payment->transaction_status = 'rejected';
        $payment->save();

        return redirect()->route('payments.index')->with('success', 'Payment rejected.');
    }

    private function generateMemberId($userId)
    {
        // Ambil data user terakhir yang memiliki member_id
        $lastMember = User::whereNotNull('member_id')->orderBy('member_id', 'DESC')->first();

        if (!$lastMember) {
            // Jika tidak ada member sebelumnya, mulai dengan MEM0001
            return 'MEM0001';
        }

        // Ambil nomor ID terakhir, misal MEM0001 -> 0001
        $lastMemberIdNumber = intval(substr($lastMember->member_id, 3));

        // Tambahkan 1 ke nomor ID terakhir dan format dengan 4 digit
        return 'MEM' . str_pad($lastMemberIdNumber + 1, 4, '0', STR_PAD_LEFT);
    }
}
