<?php

namespace App\Http\Controllers;

use App\Models\Beneficio;
use App\Models\beneficio_funcionario;
use Illuminate\Http\Request;

class BeneficioController extends Controller
{
     public function index(Request $request){

        $beneficios = Beneficio::where('descricao', 'like', '%'.$request->busca.'%' )->orderBy('descricao', 'asc')->paginate(3);

        return view("beneficios.index", compact('beneficios'));
    }

    public function create(){

        return view('beneficios.create', ['modo' => 'create']);
    }

    public function store(Request $request){
        $dados = $request->toArray();

        Beneficio::create($dados);
        return redirect()->route("beneficio.index")->with('sucesso', 'Beneficio cadastrado com sucesso');
    }


    public function edit(string $id){
        $beneficio = Beneficio::find($id);

        if(!$beneficio){
            return back();
        };
       
        $beneficios = Beneficio::all()->sortBy('descricao');
        return view('beneficios.edit', ['modo' => 'edit', 'beneficio' => $beneficio], compact('beneficio', 'beneficios'));
    }

    public function show(string $id){
        $beneficio = Beneficio::find($id);

        if(!$beneficio){
            return back();
        };
        
        $beneficios = Beneficio::all()->sortBy('descricao');
        return view('beneficios.show', ['modo' => 'show', 'beneficio' => $beneficio], compact('beneficio', 'beneficios'));
    }

    public function update(Request $request, string $id)
    {
        $dados = $request->toArray();

        $beneficio = Beneficio::find($id);

        $beneficio->fill($dados);
        $beneficio->save();
        return redirect()->route('beneficio.index')->with('sucesso','Beneficio alterado com sucesso!');
    }

    public function destroy(String $id){
        $beneficio = Beneficio::find($id);

        $beneficio->delete();
        return redirect()->route('beneficio.index')->with('sucesso','Beneficio deletado com sucesso');
    }
}
