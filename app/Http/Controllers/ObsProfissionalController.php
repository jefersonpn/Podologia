<?php

namespace App\Http\Controllers;

use App\Models\Pe;
use App\Models\Pacient;
use App\Models\Perfusao;
use App\Models\ObsProfissional;
use Illuminate\Http\Request;
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

        foreach ($pacients as $pac) {
           
            if ($pac->obsProf == '1') {
                
                $obsProfs = ObsProfissional::where('pacient_id', $pacient)->limit(1)->get();
                
                return  view('pages.pacient.obs_prof.create', [
                    'pacients' => $pacients,
                    'perfusoes' => $perfusoes,
                    'pes' => $pes,
                    'pesperfusoes' => $pesperfusoes,
                    'obsProfs' => $obsProfs
                ]);
            }else{
                
                return  view('pages.pacient.obs_prof.create', [
                    'pacients' => $pacients,
                    'perfusoes' => $perfusoes,
                    'pes' => $pes,
                    'pesperfusoes' => $pesperfusoes
                ]);
            }
        };
        
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
        //dd($request);

        $obsProf = ObsProfissional::find($request->pacient_id);
        $input = $request->all();
        //dd($input);
        $obsProf->update($input);
        //dd($obsProf);
        // I used back()->with() becouse without with the flash msg was not going to the view.
        return back()->with([
            'pacient' => $obsProf->pacient_id,
            'success' => 'Observação alterada com  sucesso!'
        ]); 
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