@extends('layouts.default')

@section('title', 'SisRH - Usuários')

@section('content')
    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif
    <h1 class="fs-2 mb-5">Usuários</h1>

    <form class="row g-3" method="POST" action="{{ route('users.show', $user->id) }}" enctype="multipart/form-data">
        {{-- Criar hash de segurança para submissão do formulário --}}
        @csrf

        @method('GET')

        @include('users.partials.form')

        <div class="col-12">
            <a href="{{ route('users.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </form>
@endsection
