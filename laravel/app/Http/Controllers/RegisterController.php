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
        // $roleId = $request->role_id;

    // Jika role_id tidak diatur (null) dan kondisi tertentu terpenuhi, jadikan role admin
    // if ($roleId === null && $this->userCanCreateAdmin()) {
    //     $roleId = 1; // Set role_id to 1 for Admin
    // }

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

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'confirm_password' => bcrypt($request->confirm_password),
            'role_id' => 2,
            'organization' => $request->organization,
            'address' => $request->address,
            'phone' => $request->phone,
            'city' => $request->city,
            'country' => $request->country,

            ]);

            if ($user->role_id === 3) {
                $user->member_id = $this->generateMemberId($user->id);
                $user->save();
            }

            Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('/login');
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');

    }

    private function userCanCreateAdmin(){
        return auth()->check() && auth()->user()->role_id === 1;
    }



}
