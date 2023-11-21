@extends('layouts.default')

@section('title', 'SisRH - Departamentos')

@section('content')
    <h1 class="fs-2 mb-5">Departamentos</h1>

    <form class="row g-3" method="POST" action="{{ route('departamentos.show', $departamento->id) }}" enctype="multipart/form-data">
        {{-- Criar hash de segurança para submissão do formulário --}}
        @csrf

        @method('GET')

        @include('departamentos.partials.form')

        <div class="col-12">
            <a href="{{ route('departamentos.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </form>
@endsection
