@extends('layouts.default')

@section('title', 'SisRH - Funcionários')

@section('content')

    <x-btn-create>
        <x-slot name="route">{{ @route('funcionarios.create') }}</x-slot>
        <x-slot name="title">Cadastrar Funcionário</x-slot>
    </x-btn-create>

    <h1 class="fs-2 mb-3">Lista de Funcionários</h1>

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <table class="table table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Foto</th>
                <th scope="col">Nome</th>
                <th scope="col">Cargo</th>
                <th scope="col">Departamento</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($funcionarios as $funcionario)
                <tr class="text-center align-middle">
                    <th scope="row">{{ $funcionario->id }}</th>
                    <td>
                        @if (empty($funcionario->foto))
                            <img src="/images/sombra_funcionario.jpg" alt="Foto" class="img-thumbnail" width="70px">
                        @else
                            <img src="{{ url("storage/funcionarios/$funcionario->foto") }}" alt="Foto" class="img-thumbnail" width="70px">
                        @endif
                    </td>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->cargo->descricao }}</td>
                    <td>{{ $funcionario->departamento->nome }}</td>
                    <td>
                        <a href="{{ route('funcionarios.edit', $funcionario->id) }}" title="Editar" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                        <a href="#" title="Remover" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
