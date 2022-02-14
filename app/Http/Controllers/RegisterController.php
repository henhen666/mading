<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('backend.account.register', [
            'title' => "Halaman Registrasi"
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'username'  => 'required|max:100',
            'email'     => 'required|email:dns|unique:users',
            'password'  => 'required|min:8|max:100'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);
        return redirect('/login')->with('success', 'Registrasi Berhasil. Silakan Login!');
    }
}
