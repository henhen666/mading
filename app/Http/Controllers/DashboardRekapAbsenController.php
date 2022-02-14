<?php

namespace App\Http\Controllers;

use App\Imports\AbsenImport;
use App\Models\RekapAbsen;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class DashboardRekapAbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.components.absen.absen', [
            'title'      => 'Rekap Absen | Dashboard',
            'absen'      => RekapAbsen::with('kelas')
                ->latest()
                ->take(11)
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.components.absen.create', [
            'title'      => 'Buat Data Rekap Absen Baru',
            // 'kelas'      => Kelas::all()
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
        // ddd($request);
        // $validatedData = $request->validate([
        //     'kelas_id'      => 'required|numeric',
        //     'hadir'         => 'required|numeric',
        //     'sakit'         => 'nullable|numeric',
        //     'izin'          => 'nullable|numeric',
        //     'alpa'          => 'nullable|numeric',
        //     'tanggal'       => 'required|string'
        // ]);


        // RekapAbsen::create($validatedData);

        // return redirect('/dashboard/rekap_absen')->with('berhasilTambah', 'Data Berhasil Ditambah!');

        $validate = $request->validate([
            'absen'     => 'required|file|mimes:csv,xls,xlsx'
        ]);

        // if ($request->file('absen')) {
        //     $validatedData['absen'] = $request->file('absen')->store('absen-siswa');
        // }

        $file = $request->file('absen');

        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('absen_siswa', $nama_file);
        Excel::import(new AbsenImport, public_path('/absen_siswa/' . $nama_file));

        return redirect('/dashboard/rekap_absen')->with('success', 'Data Berhasil Diimport!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekapAbsen  $rekapAbsen
     * @return \Illuminate\Http\Response
     */
    public function show(RekapAbsen $rekapAbsen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekapAbsen  $rekapAbsen
     * @return \Illuminate\Http\Response
     */
    public function edit(RekapAbsen $rekapAbsen)
    {
        return view('backend.components.absen.edit', [
            'title'      => 'Edit Absen',
            'data'       => $rekapAbsen,
            'kelas'      => Kelas::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekapAbsen  $rekapAbsen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekapAbsen $rekapAbsen)
    {
        $data = $request->validate([
            'kelas'         => 'required|string',
            'hadir'         => 'required|numeric',
            'sakit'         => 'nullable|numeric',
            'izin'          => 'nullable|numeric',
            'alpa'          => 'nullable|numeric'
        ]);

        RekapAbsen::whereRaw('id = ?', [$rekapAbsen->id])
            ->update($data);

        return redirect('/dashboard/rekap_absen')->with('success', 'Data Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekapAbsen  $rekapAbsen
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekapAbsen $rekapAbsen)
    {
        RekapAbsen::destroy($rekapAbsen->id);

        return back()->with('success', 'Data Berhasil Dihapus!');
    }

    public function truncate()
    {
        RekapAbsen::truncate();

        return back()->with('success', 'Data Rekap Berhasil Dikosongkan');
    }
}
