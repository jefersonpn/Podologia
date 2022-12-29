<?php

namespace App\Http\Controllers;

use App\Models\CivilState;
use App\Models\Sex;
use App\Models\Estado;
use App\Models\Pacient;
use Illuminate\Http\Request;

class PacientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.pacient.index', ['header' => 2]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $estados = Estado::all();
        $sexs = Sex::all();
        $civilStates = CivilState::all();
        $pacients = Pacient::all();

        //dd($pacients);

        return view('pages.pacient.create', [
            'header' => 2,
            'estados' => $estados,
            'sexs' => $sexs,
            'civilStates' => $civilStates,
            'pacients' => $pacients,
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
        //Testing the inputs values.
        // $name = $request->input('name');
        // $surname = $request->input('surname');
        // $phone = $request->input('phone');
        // $dob = $request->input('dob');
        // $email = $request->input('email');
        // $password = $request->input('password');
        // $sex = $request->input('sex');
        // $state = $request->input('state');
        // $city = $request->input('city');
        // $address = $request->input('address');
        // $number = $request->input('number');
        // $cap = $request->input('cep');

        // dd("Name: " . $name, "Surname: " . $surname, "Phone: " . $phone, "DataOfBith: " . $dob, "Email: " . $email, "Password: " . $password, "Sex: " . $sex, "State: " . $state, "City: " . $city, "Address: " . $address,  "Number: " . $number, "Cap: " . $cap);

        //Getting all inputs values from the form create Pacient and saving in DB.
        $input = $request->all();
        Pacient::create($input);

        session()->flash('success', 'Paciente adicionado com sucesso!');
        return redirect()->route('pacient.create');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}