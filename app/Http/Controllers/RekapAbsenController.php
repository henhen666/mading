<?php

namespace App\Http\Controllers;

use App\Models\RekapAbsen;
use App\Http\Requests\StoreRekapAbsenRequest;
use App\Http\Requests\UpdateRekapAbsenRequest;

class RekapAbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRekapAbsenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRekapAbsenRequest $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRekapAbsenRequest  $request
     * @param  \App\Models\RekapAbsen  $rekapAbsen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRekapAbsenRequest $request, RekapAbsen $rekapAbsen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekapAbsen  $rekapAbsen
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekapAbsen $rekapAbsen)
    {
        //
    }
}
