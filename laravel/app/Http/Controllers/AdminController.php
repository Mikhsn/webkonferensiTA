<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Menghitung total jumlah pengguna
        $totalUsers = User::count();

        // Menghitung total jumlah member
        $totalMembers = User::where('role_id', 3)->count();
        $totalRegularUsers = User::where('role_id', 2)->count();

        // Menghitung total konferensi
        $totalConference = Conference::count();

        // Menghitung total transaksi
        $totalTransactions = Payment::count() + Transaction::count();

        // Mengambil 5 transaksi terbaru
        $recentUpgrade = Payment::whereNotNull('user_id') // Atau gunakan kolom yang sesuai jika ada
            ->where('transaction_status', 'pending')
            ->where('payment_type', 'upgrade_member') // Sesuaikan kolom ini dengan data upgrade
            ->count();

        $recentConference = Transaction::whereNotNull('conference_id') // Kolom 'conference_id' menandakan pembelian conference
            ->where('status', 'pending') // Sesuaikan 'transaction_status' dengan kolom status pada tabel Anda
            ->count();

        // Mendapatkan total pendapatan upgrade member
        $memberRevenue = Payment::whereNotNull('user_id')

            ->where('transaction_status', 'approved')
            ->sum('amount');

        // Mendapatkan total pendapatan pembelian konferensi
        $conferenceRevenue = Transaction::whereNotNull('conference_id')
            ->where('status', 'approved')
            ->join('conferences', 'transactions.conference_id', '=', 'conferences.id')
            ->sum('conferences.price');

        // Mengirim semua data ke view
        return view('admin.index', compact(
            'totalUsers',
            'totalMembers',
            'totalRegularUsers',
            'totalConference',
            'totalTransactions',
            'recentUpgrade',
            'recentConference',
            'memberRevenue',
            'conferenceRevenue'
        ));
    }


    public function transactions()
    {
        $transactions = Transaction::with('user', 'conference')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.transactions', compact('transactions'));
    }

    public function approve($id)
    {
        $transaction = Transaction::findOrFail($id);

        // Ambil tanggal konferensi dari relasi dengan model Conference
        $conferenceDate = $transaction->conference->date;

        $transaction->status = 'approved';
        $transaction->start_time = now(); // Tetap menyimpan waktu mulai persetujuan
        $transaction->end_time = $conferenceDate; // Menggunakan date dari tabel conference sebagai waktu akhir countdown

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

    public function showPayments(Request $request)
    {
        $search = $request->input('search');

        // Mengambil data payments dengan kondisi pencarian
        $payments = Payment::with('user')
            ->when($search, function ($query, $search) {
                return $query->whereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', "%{$search}%");
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
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

    public function viewDownloads()
    {
        $transactions = Transaction::with('user', 'conference')
            ->where('certificate_downloaded', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.downloads', compact('transactions'));
    }

    public function users(Request $request)
    {
        $search = $request->input('search');
        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Fungsi untuk memperbarui data user
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    // Fungsi untuk menghapus user
    // public function destroy($id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->delete();

    //     return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    // }
}
