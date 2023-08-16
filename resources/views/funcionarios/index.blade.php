@extends('layouts.default')

@section('title', 'SisRH - Funcionários')

@section('content')

    <x-btn-create>
      <x-slot name="route">{{ @route('funcionarios.create') }}</x-slot>
      <x-slot name="title">Cadastrar Funcionário</x-slot>
    </x-btn-create>

    <h1 class="fs-2 mb-3">Lista de Funcionários</h1>

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
          <tr class="text-center">
            <th scope="row">1</th>
            <td>Foto</td>
            <td>João Henrique</td>
            <td>Aluno</td>
            <td>Sistemas de Informação</td>
            <td>
                <a href="" title="Editar" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                <a href="" title="Remover" class="btn btn-danger"><i class="bi bi-trash"></i></a>
            </td>
          </tr>
        </tbody>
      </table>
@endsection
