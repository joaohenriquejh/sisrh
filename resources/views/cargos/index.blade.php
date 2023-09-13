@extends('layouts.default')

@section('title', 'SisRH - Cargos')

@section('content')

    <x-btn-create>
        <x-slot name="route">{{ @route('cargos.create') }}</x-slot>
        <x-slot name="title">Cadastrar Cargos</x-slot>
    </x-btn-create>

    <h1 class="fs-2 mb-3">Lista de Cargos</h1>

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <table class="table table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Descrição</th>
                <th scope="col" width="110px">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cargos as $cargo)
                <tr class="text-center align-middle">
                    <th scope="row">{{ $cargo->id }}</th>
                    <td>{{ $cargo->descricao }}</td>
                    <td>
                        <a href="{{ route('cargos.edit', $cargo->id) }}" title="Editar" class="btn btn-primary"><i class="bi bi-pen"></i></a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
