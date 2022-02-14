<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\PengumumanCategory;
use Illuminate\Http\Request;

class DashboardPengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.components.pengumuman.pengumuman', [
            'title'         => 'Pengumuman | Dashboard',
            // 'pengumuman_osis'    => Pengumuman::with(['user', 'pengumumancategory'])
            //     ->latest()
            //     ->where('pengumuman_category', '=', 1)
            //     ->get(),
            // 'pengumuman_siswa' => Pengumuman::with(['user', 'pengumumancategory'])
            //     ->latest()
            //     ->where('pengumuman_category', '=', 2)
            //     ->get()
            'pengumuman'    => Pengumuman::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.components.pengumuman.create', [
            'title' => "Buat Pengumuman Baru",
            'category'  => PengumumanCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'                 => 'required|max:255',
            'body'                  => 'required|max:255',
            'dari'                  => 'required|max:255',
            'user_id'               => 'required',
            'pengumuman_category'   => 'required'
        ]);

        Pengumuman::create($data);
        return redirect('/dashboard/pengumuman')->with('success', 'Pengumuman Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumuman $pengumuman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('backend.components.pengumuman.edit', [
            'title'         => "Edit Pengumuman",
            'pengumuman'    => $pengumuman,
            'category'      => PengumumanCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $data = $request->validate([
            'judul'                 => 'required',
            'body'                  => 'required',
            'dari'                  => 'required|max:255',
            'user_id'               => 'required',
            'pengumuman_category'   => 'required'
        ]);

        Pengumuman::whereRaw('id = ?', [$pengumuman->id])->update($data);

        return redirect('/dashboard/pengumuman')->with('success', 'Data Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        Pengumuman::destroy($pengumuman->id);

        return back()->with('success', 'Pengumuman Berhasil Dihapus!');
    }

    public function truncate()
    {
        Pengumuman::truncate();

        return back()->with('success', 'Pengumuman Berhasil Dikosongkan');
    }
}
