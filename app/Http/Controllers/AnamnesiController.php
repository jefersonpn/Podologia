<?php

namespace App\Http\Controllers;

use App\Models\Pacient;
use App\Models\Anamnesi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnamnesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $noAnamnesi = DB::table('pacients')->take(8)->where('anamnese', 0)->get();

        return response()->json([
            'noAnamnesi' => $noAnamnesi,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.pacient.anaminese.create');
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
     * @param  \App\Models\Anamnesi  $anamnesi
     * @return \Illuminate\Http\Response
     */
    public function show(Anamnesi $anamnesi)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anamnesi  $anamnesi
     * @return \Illuminate\Http\Response
     */
    public function edit(Anamnesi $anamnesi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anamnesi  $anamnesi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anamnesi $anamnesi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anamnesi  $anamnesi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anamnesi $anamnesi)
    {
        //
    }
}