<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Beneficio;
use App\Models\Funcionario;
use App\Models\Departamento;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class FuncionarioController extends Controller
{
    // Verificar se o usuários está logado no sistema
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $funcionarios = Funcionario::where('nome', 'like', '%' . $request->busca . '%')->orderBy('nome', 'asc')->paginate(3);

        $totalFuncionario = Funcionario::all()->count();

        // Receber os dados do banco através do model
        return view('funcionarios.index', compact('funcionarios', 'totalFuncionario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retornar o formulário de cadastro
        $departamentos = Departamento::all()->sortBy('nome');
        $cargos = Cargo::all()->sortBy('descricao');
        $beneficios = Beneficio::all()->sortBy('descricao');
        
        return view('funcionarios.create', ['modo' => 'create'], compact('departamentos', 'cargos', 'beneficios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->toArray();

        //Armazena o id do usuário do sistema logado no cadastro do funcionário
        $input['user_id'] = auth()->user()->id;

        if ($request->hasFile('foto')) {
            $input['foto'] = $this->uploadFoto($request->foto);
        }

        $funcionario = Funcionario::create($input);

        if ($request->beneficios) {
            //Cadastro do funcionários com os benefícios
            $funcionario->beneficios()->attach($request->beneficios);
        }
        return redirect()->route('funcionarios.index')->with('sucesso', 'Funcionario cadastrado com sucesso');
    }

    // Função para redimensionar e realizar o upload da foto
    private function uploadFoto($foto)
    {
        $nomeArquivo = $foto->hashName();

        // Redimensionar foto
        $imagem = Image::make($foto)->fit(200, 200);

        //Salvar arquivo da foto
        Storage::put('public/funcionarios/' . $nomeArquivo, $imagem->encode());


        return $nomeArquivo;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $funcionario = Funcionario::find($id);

        if (!$funcionario) {
            return back();
        }
        $departamentos = Departamento::all()->sortBy('nome');
        $cargos = Cargo::all()->sortBy('descricao');
        $beneficios = Beneficio::all()->sortBy('descricao');

        $cadastradoPor = User::find($funcionario->user_id);
        //Preparar array com os ID dos beneficios do funcionário
        foreach ($funcionario->beneficios as $beneficio) {
            $beneficio_selecionados[] = $beneficio->id;
        }
        return view('funcionarios.show', ['modo' => 'show', 'funcionario' => $funcionario], compact('funcionario', 'departamentos', 'cargos', 'beneficios', 'beneficio_selecionados', 'cadastradoPor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $funcionario = Funcionario::find($id);

        if (!$funcionario) {
            return back();
        }
        $departamentos = Departamento::all()->sortBy('nome');
        $cargos = Cargo::all()->sortBy('descricao');
        $beneficios = Beneficio::all()->sortBy('descricao');
        $cadastradoPor = User::find($funcionario->user_id);

        //Preparar array com os ID dos beneficios do funcionário
        foreach ($funcionario->beneficios as $beneficio) {
            $beneficio_selecionados[] = $beneficio->id;
        }
        return view('funcionarios.edit', ['modo' => 'edit', 'funcionario' => $funcionario], compact('funcionario', 'departamentos', 'cargos', 'beneficios', 'beneficio_selecionados', 'cadastradoPor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->toArray();

        $funcionario = Funcionario::find($id);

        foreach ($funcionario->beneficios as $beneficio) {
            $beneficio_selecionados[] = $beneficio->id;
        };

        $funcionario->beneficios()->detach($beneficio_selecionados);
        $funcionario->beneficios()->attach($request->beneficios);


        if ($request->hasFile('foto')) {
            Storage::delete('public/funcionarios/' . $funcionario['foto']);
            $input['foto'] = $this->uploadFoto($request->foto);
        }

        
        $funcionario->fill($input);
        $funcionario->save();
        return redirect()->route('funcionarios.index')->with('sucesso', 'Funcionário alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $funcionario = Funcionario::find($id);

        // Exclui a foto do funcionário
        if ($funcionario['foto'] != null) {
            Storage::delete('public/funcionarios/' . $funcionario['foto']);
        }
        // Apagando o registro no banco de dados
        $funcionario->delete();
        return redirect()->route('funcionarios.index')->with('sucesso', 'Funcionário excluído com sucesso');
    }
}
