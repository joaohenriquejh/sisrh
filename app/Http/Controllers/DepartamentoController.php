<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
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
        $departamentos = Departamento::all()->sortBy('nome');

        // Receber os dados do banco através do model
        return view('departamentos.index', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retornar o formulário de cadastro
        $departamentos = Departamento::all()->sortBy('nome');
        return view('departamentos.create', ['modo' => 'create'], compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->toArray();
        $input['user_id'] = auth()->user()->id;


        Departamento::create($input);
        return redirect()->route('departamentos.index')->with('sucesso', 'Departamento cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $departamento = Departamento::find($id);

        if (!$departamento) {
            return back();
        }
        $departamentos = Departamento::all()->sortBy('nome');
        return view('departamentos.show', ['modo' => 'show', 'departamento' => $departamento], compact('departamento', 'departamentos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departamento = Departamento::find($id);

        if (!$departamento) {
            return back();
        }
        $departamentos = Departamento::all()->sortBy('nome');
        return view('departamentos.edit', ['modo' => 'edit', 'departamento' => $departamento], compact('departamento', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->toArray();

        $departamento = Departamento::find($id);

        $departamento->fill($input);
        $departamento->save();
        return redirect()->route('departamentos.index')->with('sucesso', 'Departamento alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
