<?php

namespace App\Http\Controllers;

use App\Models\DaaiTV;
use App\Http\Requests\StoreDaaiTVRequest;
use App\Http\Requests\UpdateDaaiTVRequest;

class DaaiTVController extends Controller
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
     * @param  \App\Http\Requests\StoreDaaiTVRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDaaiTVRequest $request)
    {
        //
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
     * @param  \App\Http\Requests\UpdateDaaiTVRequest  $request
     * @param  \App\Models\DaaiTV  $daaiTV
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDaaiTVRequest $request, DaaiTV $daaiTV)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaaiTV  $daaiTV
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaaiTV $daaiTV)
    {
        //
    }
}
