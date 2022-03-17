<?php

namespace App\Http\Controllers;

use App\Models\DaaiTV;
use Illuminate\Http\Request;

class DashboardDAAIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.components.daai.daai', [
            'title'     => "DAAI TV | Dashboard",
            'daai'      => DaaiTV::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.components.daai.create', [
            'title'     => "Buat Link Baru"
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
        $validatedData = $request->validate([
            'links'     => 'required'
        ]);

        DaaiTV::create($validatedData);

        return redirect('/dashboard/daai_tv')->with('success', 'Link Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DaaiTV  $daaiTV
     * @return \Illuminate\Http\Response
     */
    public function show(DaaiTV $daaiTV)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DaaiTV  $daaiTV
     * @return \Illuminate\Http\Response
     */
    public function edit(DaaiTV $daaiTV)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DaaiTV  $daaiTV
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DaaiTV $daaiTV)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaaiTV  $daaiTV
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaaiTV $daaitv)
    {
        DaaiTV::destroy($daaitv->id);
        return back()->with('success', 'Link Berhasil Dihapus!');
    }

    public function truncate()
    {
        DaaiTV::truncate();
        return back()->with('success', 'Link Berhasil Dikosongkan');
    }
}
