<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function create(Request $request)
    {
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            // Jika email sudah ada, tetap lanjutkan untuk membuat Member ID
            if ($existingUser->role_id === 3) {
                // Email sudah ada dan role adalah member
                Session::flash('error', 'Email sudah terdaftar sebagai member. Silakan login.');
                return redirect('/login');
            } else {
                Session::flash('error', 'Email sudah terdaftar dengan role lain. Gunakan email yang berbeda.');
                return redirect()->back()->withInput();
            }
        }

        try {
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email:dns', 'max:255', 'unique:users'], // Validasi email dengan DNS
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'confirm_password' => ['required', 'same:password'],
                'organization' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:13'],
                'city' => ['required', 'string', 'max:255'],
                'country' => ['required', 'string', 'max:255'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Jika validasi gagal, tampilkan pesan error untuk DNS
            Session::flash('error', 'Email tidak valid atau domain tidak memiliki DNS. Silakan gunakan email yang valid.');
            return redirect()->route('register')->withErrors($e->validator)->withInput();
        }

        // Membuat user baru
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role_id' => 2,
            'organization' => $validatedData['organization'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
            'city' => $validatedData['city'],
            'country' => $validatedData['country'],
        ]);

        if ($user->role_id === 3) {
            $user->member_id = $this->generateMemberId($user->id);
            $user->save();
        }

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('/login');
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    private function userCanCreateAdmin()
    {
        return auth()->check() && auth()->user()->role_id === 1;
    }
}
