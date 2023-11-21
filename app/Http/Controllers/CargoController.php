<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargos = Cargo::all()->sortBy('descricao');

        // Receber os dados do banco através do model
        return view('cargos.index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cargos = Cargo::all()->sortBy('descricao');
        return view('cargos.create', ['modo' => 'create'], compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->toArray();
        $input['user_id'] = auth()->user()->id;


        Cargo::create($input);
        return redirect()->route('cargos.index')->with('sucesso', 'Cargo cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cargo = Cargo::find($id);

        if (!$cargo) {
            return back();
        }
        $cargos = Cargo::all()->sortBy('nome');
        return view('cargos.show', ['modo' => 'show', 'cargo' => $cargo], compact('cargo', 'cargos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cargo = Cargo::find($id);

        if (!$cargo) {
            return back();
        }
        $cargos = Cargo::all()->sortBy('nome');
        return view('cargos.edit', ['modo' => 'edit', 'cargo' => $cargo], compact('cargo', 'cargos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->toArray();

        $cargo = Cargo::find($id);

        $cargo->fill($input);
        $cargo->save();
        return redirect()->route('cargos.index')->with('sucesso', 'Cargo alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
