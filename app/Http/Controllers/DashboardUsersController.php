<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DashboardUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.components.user.users', [
            'title'     => 'Users | Dashboard',
            'user'      => User::orderBy('username')
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('backend.components.user.register', [
        //     'title'      => 'Halaman Registrasi'
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username'      => 'required|min:5|max:100',
            'email'         => 'required|email:dns|unique:users,email',
            'password'      => 'required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        if ($validatedData) {
            return redirect('/dashboard/users')->with('berhasilTambah', 'Akun Berhasil DIregistrasi!');
        } else {
            return back()->with('gagalTambah', 'Gagal Melakukan Registrasi. Silakan Coba Lagi!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.components.user.edit', [
            'title'      => 'Edit Detail Akun',
            'data'       => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // $data = [
        //     'username'      => 'required|min:5|max:100',
        //     'password'      => 'required'
        // ];

        // if (!Hash::check($request->password, $request->user()->password)) {
        //     return back()->with('password', 'Password Yang Dimasukkan Salah. Silakan Coba Lagi!');
        // }
        // // $request->session()->passwordConfirmed();

        // if ($request->email != $user->email) {
        //     $data['email'] = 'required|unique:users';
        // }
        // $validatedData = $request->validate($data);

        // $data['password'] = bcrypt($data['password']);

        // ddd($validatedData);

        // User::where('id', $user->id)
        //     ->update($validatedData);

        // return redirect()->intended('/dashboard/users')->with('berhasilEdit', 'Data Akun Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return back()->with('berhasilHapus', 'Akun Berhasil Dihapus!');
    }
}
