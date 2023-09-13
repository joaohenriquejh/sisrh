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
                        <a href="#" title="Deletar" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $cargo->id }}"><i class="bi bi-trash"></i></a>
                        {{-- Inserir o componente modal na view --}}
                        <x-modal-delete>
                            <x-slot name="id">{{ $cargo->id }}</x-slot>
                            <x-slot name="tipo">cargo</x-slot>
                            <x-slot name="nome">{{ $cargo->descricao }}</x-slot>
                            <x-slot name="rota">cargos.destroy</x-slot>
                        </x-modal-delete>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
