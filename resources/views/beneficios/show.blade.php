@extends('layouts.default')

@section('title', 'SisRH - Benefícios')

@section('content')
    <h1 class="fs-2 mb-5">Benefícios</h1>

    <form class="row g-3" method="POST" action="{{ route('beneficio.show', $beneficio->id) }}" enctype="multipart/form-data">
        @csrf

     @method('GET')

        @include('beneficios.partials.form')
        <div class="col-12">
            <a href="{{ route('beneficio.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </form>
@endsection