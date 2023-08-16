@extends('layouts.default')

@section('title', 'SisRH - Cadastro de Funcionários')

@section('content')
    <h1 class="fs-2 mb-3">Cadastro de Funcionários</h1>

    <form class="row g-3">
        <div class="col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="name" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="col-md-6">
            <label for="data_nasc" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="data_nasc" name="data_nasc" required>
        </div>
        <div class="col-md-4">
            <label for="sexo" class="form-label">Sexo</label>
            <select name="sexo" id="sexo" class="form-select" required>
                <option value=""></option>
                <option value="m">Masculino</option>
                <option value="f">Feminino</option>
                <option value="o">Outros</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" minlength="11" maxlength="11" required>
        </div>
        <div class="col-md-4">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="col-md-4">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="telefone" class="form-control" id="telefone" name="telefone" required>
        </div>
        <div class="col-md-4">
            <label for="departamento_id" class="form-label">Departamento</label>
            <select id="departamento_id" class="form-select" name="departamento_id" required>
                <option value=""></option>
                <option value="">Marketing</option>
                <option value="">Tecnologia</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="cargo_id" class="form-label">Cargo</label>
            <select id="cargo_id" class="form-select" name="cargo_id" required>
                <option value=""></option>
                <option value="">Gerente</option>
                <option value="">Supervisor</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="salario" class="form-label">Salário</label>
            <input type="text" class="form-control" id="salario" name="salario" required>
        </div>
        <div class="col-md-4">
            <label for="data_contratacao" class="form-label">Data de Contratação</label>
            <input type="date" class="form-control" id="data_contratacao" name="data_contratacao" required>
        </div>
        <div class="col-md-4">
            <label for="data_desligamento" class="form-label">Data de Desligamento</label>
            <input type="date" class="form-control" id="data_desligamento" name="data_desligamento">
        </div>
        <div class="col-12">
          <label for="foto" class="form-label">Foto</label>
          <input type="file" class="form-control" id="foto" name="foto">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a href="{{ route('funcionarios.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
@endsection
