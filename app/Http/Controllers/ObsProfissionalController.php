<?php

namespace App\Http\Controllers;

use App\Models\Pe;
use App\Models\Pacient;
use App\Models\Perfusao;
use App\Models\Pe_Perfusao;
use Illuminate\Http\Request;
use App\Models\ObsProfissional;
use Illuminate\Support\Facades\DB;

class ObsProfissionalController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pacient)
    {
        //dd($pacient);
        $pacients = Pacient::where('id', $pacient)->get();
        $perfusoes = Perfusao::all();
        $pes = Pe::all();

        $pesperfusoes = DB::table('pe_perfusao')
                            ->join('pes', 'pe_id', '=', 'pes.id')
                            ->join('perfusoes', 'perfusao_id', '=', 'perfusoes.id')
                            ->select('pe_perfusao.*', 'pes.lado', 'perfusoes.desc')
                            ->where('pacient_id', $pacient)
                            ->get();
        // dd($pesperfusoes);
        return  view('pages.pacient.obs_prof.create', [
           'pacients' => $pacients,
           'perfusoes' => $perfusoes,
           'pes' => $pes,
           'pesperfusoes' => $pesperfusoes
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
        $input = $request->all();
        //dd($input);
        ObsProfissional::create($input);

        // UPDATING the value of the column Anamnese 
        $pacient = Pacient::find($input['pacient_id']);
        if ($pacient) {
            $pacient->obsProf = 1;
        }
        $pacient->save();
        session()->flash('success', 'Observação Salva com sucesso!');
        return redirect()->back();
    }

    public function storePerfusao(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ObsProfissional  $obsProfissional
     * @return \Illuminate\Http\Response
     */
    public function show(ObsProfissional $obsProfissional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ObsProfissional  $obsProfissional
     * @return \Illuminate\Http\Response
     */
    public function edit(ObsProfissional $obsProfissional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ObsProfissional  $obsProfissional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ObsProfissional $obsProfissional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ObsProfissional  $obsProfissional
     * @return \Illuminate\Http\Response
     */
    public function destroy(ObsProfissional $obsProfissional)
    {
        //
    }
}