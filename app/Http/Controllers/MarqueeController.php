<?php

namespace App\Http\Controllers;

use App\Models\Marquee;
use App\Http\Requests\StoreMarqueeRequest;
use App\Http\Requests\UpdateMarqueeRequest;

class MarqueeController extends Controller
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
     * @param  \App\Http\Requests\StoreMarqueeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMarqueeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marquee  $marquee
     * @return \Illuminate\Http\Response
     */
    public function show(Marquee $marquee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marquee  $marquee
     * @return \Illuminate\Http\Response
     */
    public function edit(Marquee $marquee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMarqueeRequest  $request
     * @param  \App\Models\Marquee  $marquee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMarqueeRequest $request, Marquee $marquee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marquee  $marquee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marquee $marquee)
    {
        //
    }
}
