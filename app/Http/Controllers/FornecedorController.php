<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Estado;
use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Fornecedor::all();
        return view('pages.provider.index',['header' => 3, 'providers' => $providers]);
    }

    public function requestApi(Request $request)
    {
        
        $response = Http::get("https://minhareceita.org/$request->cnpj");
        $providers = $response->json();
        if(!isset($providers['cnpj'])){
           
             session()->flash('error', "CNPJ: $request->cnpj inválido!");
             return view('pages.provider.create');
        
        }else{
        session()->flash('error', null);  // Erasing error msg in case an invalid CNPJ is entred before the right one. 
        //dd($providers);  // Testing variable.
        $provider['razaoSocial'] = $providers['razao_social'];
        $provider['nomeFantasia'] = $providers['nome_fantasia'];
        $provider['cnpj'] = $providers['cnpj'];
        $provider['email'] = $providers['email'];
        $provider['matrizFilial'] = $providers['descricao_identificador_matriz_filial'];
        $provider['dataFundacao'] = $providers['data_inicio_atividade'];
        $provider['mei'] = $providers['opcao_pelo_mei'];
        $provider['porte'] = $providers['porte'];
        $provider['simplesNacional'] = $providers['opcao_pelo_simples'];
        $provider['situacao'] = $providers['descricao_situacao_cadastral'];
        $provider['dataSituacao'] = $providers['data_situacao_cadastral'];
        $provider['inscricaoEstadual'] = '';
        $provider['inscricaoMunicipal'] = '';
        $provider['telefone'] = $providers['ddd_telefone_1'];

        // Taking the UF from API and seaching in our Estado table in database and getting the id to use on the form select input.
        $prov['estado'] = Estado::where('uf', $providers['uf'])->get('id');
        foreach ($prov['estado'] as $prov) {
            $provider['estado_id'] = $prov->id;
        }
        //dd($provider); //just to check results

        // Taking the CIDADE from API and seaching in our Cidade table in database and getting the id to use on the form select input.
        $prov['cidade'] = Cidade::where('nome', $providers['municipio'])->get('id');
        //dd($prov['cidade']);
        foreach ($prov['cidade'] as $prov) {
            $provider['cidade_id'] = $prov->id;
        }
        // dd($provider['cidade_id']);

        $provider['endereco'] = $providers['descricao_tipo_de_logradouro'] . ' ' . $providers['logradouro'];
        $provider['numero'] = $providers['numero'];
        $provider['complemento'] = $providers['complemento'];
        $provider['cep'] = $providers['cep'];

        //dd($providers);
        $estados = Estado::all();
            return view('pages.provider.showBusca', ['header' => 3, 'providers' => $provider, 'estados' => $estados]);
            
        }

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::all();
        return view('pages.provider.create',['header' => 3, 'estados' => $estados]);
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
        Fornecedor::create($input);
        session()->flash('success', 'Fornecedor adicionado com sucesso!');
        return redirect()->route('provider.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function show(Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Fornecedor $fornecedor)
    {
        $estados = Estado::all();
        return view('pages.provider.edit', ['providers' => $fornecedor, 'estados' => $estados]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fornecedor $fornecedor)
    {
        $fornecedor = Fornecedor::find($fornecedor->id);
        $input = $request->all();
        $fornecedor->update($input);
        session()->flash('success', 'Fornecedor alterado com  sucesso!');
        return redirect()->route('provider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fornecedor $fornecedor)
    {
        // dd($request);
        Fornecedor::destroy($fornecedor->id);
        session()->flash('error', 'Fornecedor deletado!');
        return redirect()->back(); 
    }
}