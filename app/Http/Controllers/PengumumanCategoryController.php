<?php

namespace App\Http\Controllers;

use App\Models\PengumumanCategory;
use App\Http\Requests\StorePengumumanCategoryRequest;
use App\Http\Requests\UpdatePengumumanCategoryRequest;

class PengumumanCategoryController extends Controller
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
     * @param  \App\Http\Requests\StorePengumumanCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePengumumanCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengumumanCategory  $pengumumanCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PengumumanCategory $pengumumanCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengumumanCategory  $pengumumanCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PengumumanCategory $pengumumanCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengumumanCategoryRequest  $request
     * @param  \App\Models\PengumumanCategory  $pengumumanCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePengumumanCategoryRequest $request, PengumumanCategory $pengumumanCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengumumanCategory  $pengumumanCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengumumanCategory $pengumumanCategory)
    {
        //
    }
}
