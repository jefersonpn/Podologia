<?php

namespace App\Http\Controllers;

use App\Models\Obs;
use App\Models\Perfusao;
use Illuminate\Http\Request;

class ObsController extends Controller
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
        $perfusoes = Perfusao::all();
        
        return view('pages.pacient.obs_prof.create',['perfusoes' => $perfusoes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obs  $obs
     * @return \Illuminate\Http\Response
     */
    public function show(Obs $obs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obs  $obs
     * @return \Illuminate\Http\Response
     */
    public function edit(Obs $obs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Obs  $obs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obs $obs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obs  $obs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obs $obs)
    {
        //
    }
}