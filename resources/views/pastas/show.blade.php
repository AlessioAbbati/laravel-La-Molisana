
@extends('layouts.base')

@section('contents')
    <h1>{{ $pasta->titolo }}</h1>
    <h2>Tipo: {{ $pasta->tipo }}, Tempo di cotture: {{ $pasta->cottura }} minuti, Peso: {{ $pasta->peso }}g</h2>

    <img src="{{ $pasta->src }}" alt="{{ $pasta->titolo }}">

    <p>{!! $pasta->descrizione !!}</p>

    <a class="btn btn-primary" href="{{ route('home') }}">home</a>
    <a class="btn btn-primary" href="{{ route('pastas.trashed') }}">cestino</a>
    <form action="{{ route('pastas.destroy', ['pasta' => $pasta->id]) }}" method="POST" class="d-inline-block">
        @csrf
        @method('delete')
        <button class="btn btn-danger" href="">Delete</button>
    </form>
@endsection

