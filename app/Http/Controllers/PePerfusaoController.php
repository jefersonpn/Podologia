<?php

namespace App\Http\Controllers;

use App\Models\Pe_Perfusao;
use Illuminate\Http\Request;

class PePerfusaoController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $input = $request->all();
        //dd($input);
        Pe_Perfusao::create($input);
        
        session()->flash('success', 'Perfusão adicionada com sucesso!');
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pe_Perfusao  $pe_Perfusao
     * @return \Illuminate\Http\Response
     */
    public function show(Pe_Perfusao $pe_Perfusao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pe_Perfusao  $pe_Perfusao
     * @return \Illuminate\Http\Response
     */
    public function edit(Pe_Perfusao $pe_Perfusao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pe_Perfusao  $pe_Perfusao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pe_Perfusao $pe_Perfusao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pe_Perfusao  $pe_Perfusao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->pe_perfusao_id;
        Pe_Perfusao::destroy($id);
        session()->flash('error', 'Perfusao deletada!');
        return redirect()->back(); 
    }
}