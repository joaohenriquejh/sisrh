@extends('layouts.default')

@section('title', 'SisRH - Funcionários')

@section('content')
    <h1 class="fs-2 mb-5">Funcionário</h1>

    <form class="row g-3" method="POST" action="{{ route('funcionarios.show', $funcionario->id) }}" enctype="multipart/form-data">
        {{-- Criar hash de segurança para submissão do formulário --}}
        @csrf

        @method('GET')

        @include('funcionarios.partials.form')

        <div class="col-12">
            <a href="{{ route('funcionarios.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </form>
@endsection
