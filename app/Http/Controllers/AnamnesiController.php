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
    public function create($pacient)
    {
        $pacients = Pacient::where('id', $pacient)->get();
        
        foreach($pacients as $pac){
            if($pac->anamnese == 1){
                
               $anamnesi = Anamnesi::where('pacient_id', $pacient)->limit(1)->get();
               
                return  view('pages.pacient.anaminese.create', [
                    'pacients' => $pacients,
                    'anamnesi' => $anamnesi
                ]);
            }else{
                return  view('pages.pacient.anaminese.create', [
                    'pacients' => $pacients,
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
        Anamnesi::create($input);
        
        // UPDATING the value of the column Anamnese 
        $pacient = Pacient::find($input['pacient_id']);
        if($pacient){
            $pacient->anamnese = 1;
        }
        $pacient->save();
        session()->flash('success', 'Anamnese Salva com sucesso!');
        return redirect()->back();
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
        $pacient = DB::table('pacients')->find('id', $anamnesi)->get();
        return view('pages.pacient.anaminese.create',[
            'pacient' => $pacient,
        ]);
       
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
        
        $anamnese = Anamnesi::find($anamnesi->id);
        $input = $request->all();
        //dd($input);
        if (!array_key_exists('paceMaker', $input)) {
            $input['paceMaker'] = 'off';
        }
        if (!array_key_exists('pino', $input)) {
            $input['pino'] = 'off';
        }
        if (!array_key_exists('highPressure', $input)) {
            $input['highPressure'] = 'off';
        }
        if (!array_key_exists('seizures', $input)) {
            $input['seizures'] = 'off';
        }
        if (!array_key_exists('diabetes', $input)) {
            $input['diabetes'] = 'off';
        }
        if (!array_key_exists('carcinogenic', $input)) {
            $input['carcinogenic'] = 'off';
        }
        if (!array_key_exists('circulatory', $input)) {
            $input['circulatory'] = 'off';
        }
        //dd($input);
        $anamnese->update($input);
        
        // I used back()->with() becouse without with the flash msg was not going to the view.
        return back()->with( [
            'pacient' => $anamnese->pacient_id,
            'success' => 'Anamnese alterada com  sucesso!'
        ]); 
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