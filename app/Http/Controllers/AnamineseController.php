<?php

namespace App\Http\Controllers;

use App\Models\Anaminese;
use App\Models\CivilState;
use Illuminate\Http\Request;

class AnamineseController extends Controller
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
        //Show form page
        $estados_civil = CivilState::all();
       
        return view('pages.pacient.anaminese.create', ['estados_civil' => $estados_civil]);
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
     * @param  \App\Models\Anaminese  $anaminese
     * @return \Illuminate\Http\Response
     */
    public function show(Anaminese $anaminese)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anaminese  $anaminese
     * @return \Illuminate\Http\Response
     */
    public function edit(Anaminese $anaminese)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anaminese  $anaminese
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anaminese $anaminese)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anaminese  $anaminese
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anaminese $anaminese)
    {
        //
    }
}