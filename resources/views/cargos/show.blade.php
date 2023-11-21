@extends('layouts.default')

@section('title', 'SisRH - Cargos')

@section('content')
    <h1 class="fs-2 mb-5">Cargos</h1>

    <form class="row g-3" method="POST" action="{{ route('cargos.show', $cargo->id) }}" enctype="multipart/form-data">
        {{-- Criar hash de segurança para submissão do formulário --}}
        @csrf

        @method('GET')

        @include('cargos.partials.form')

        <div class="col-12">
            <a href="{{ route('cargos.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </form>
@endsection
