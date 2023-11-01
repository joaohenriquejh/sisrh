<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (Gate::allows('type-user')) {
            $users = User::where('name', 'like', '%' . $request->busca . '%')->orderBy('name', 'asc')->paginate(3);

            $totalUsers = User::all()->count();

            return view('users.index', compact('users', 'totalUsers'));
        } else {
            return back();
        }
        // Receber os dados do banco através do model

    }

    public function create()
    {
        // Retornar o formulário de cadastro
        $users = User::all()->sortBy('name');
        return view('users.create', compact('users'));
    }

    public function store(Request $request)
    {
        $input = $request->toArray(); //Array que recebe os valores dos campos da view através do objeto request
        $input['password'] = bcrypt($input['password']); // Linha que criptografa a senha do usuário com o método bcrypt, antes de guardar no banco

        User::create($input);
        return redirect()->route('users.index')->with('sucesso', 'Usuário cadastrado com sucesso');
    }

    public function edit(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return back();
        }

        if(auth()->user()->id == $user['id'] || auth()->user()->tipo == 'admin'){
            return view('users.edit', compact('user'));
        }else{
            return back();
        }

    }

    public function update(Request $request, string $id)
    {
        $input = $request->toArray();

        $user = User::find($id);

        if ($input['password'] != null) {
            $input['password'] = bcrypt($input['password']);
        } else {
            $input['password'] = $user['password'];
        }

        $user->fill($input);
        $user->save();
        return redirect()->route('users.index')->with('sucesso', 'Usuário alterado com sucesso!');
    }

    public function destroy(string $id)
    {
        $user = User::find($id);

        // Apagando o registro no banco de dados
        $user->delete();
        return redirect()->route('users.index')->with('sucesso', 'Usuário excluído com sucesso');
    }
}
