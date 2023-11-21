@extends('layouts.default')

@section('title', 'SisRH - Edição de Beneficios')

@section('content')
    <h1 class="fs-2 mb-5">Edição de Beneficios</h1>

    <form class="row g-3" method="POST" action="{{ route('beneficio.update', $beneficio->id) }}" enctype="multipart/form-data">
        @csrf

     @method('PUT')

        @include('beneficios.partials.form')
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Alterar</button>
            <a href="{{ route('beneficio.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
@endsection