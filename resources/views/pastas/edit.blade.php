@extends('layouts.base')

@section('contents')
    <h1>Inserisci nuova pasta</h1>

    <form method="POST" action="{{ route('pastas.update', ['pasta' => $pasta->id]) }}">
        @csrf

        @method('PUT')

        <div class="mb-3">
            <label for="titolo" class="form-label">Titolo</label>
            <input
                type="text"
                class="form-control @error('titolo') is-invalid @enderror"
                id="titolo"
                name="titolo"
                value="{{ old('titolo', $pasta->titolo) }}"
            >
            <div class="invalid-feedback">
                @error('titolo') {{ $message }} @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="src" class="form-label">Immagine</label>
            <input
                type="text"
                class="form-control @error('src') is-invalid @enderror"
                id="src"
                name="src"
                value="{{ old('src', $pasta->src) }}"
            >
            <div class="invalid-feedback">
                @error('src') {{ $message }} @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input
                type="text"
                class="form-control @error('tipo') is-invalid @enderror"
                id="tipo"
                name="tipo"
                value="{{ old('tipo', $pasta->tipo) }}"
            >
            <div class="invalid-feedback">
                @error('tipo') {{ $message }} @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="cottura" class="form-label">Cottura</label>
            <input
                type="number"
                class="form-control @error('cottura') is-invalid @enderror"
                id="cottura"
                name="cottura"
                value="{{ old('cottura', $pasta->cottura) }}"
            >
            <div class="invalid-feedback">
                @error('cottura') {{ $message }} @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="peso" class="form-label">Peso</label>
            <input
                type="number"
                class="form-control @error('peso') is-invalid @enderror"
                id="peso"
                name="peso"
                value="{{ old('peso', $pasta->peso) }}"
            >
            <div class="invalid-feedback">
                @error('peso') {{ $message }} @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="descrizione" class="form-label">Descrizione</label>
            <textarea
                class="form-control @error('descrizione') is-invalid @enderror"
                id="descrizione"
                rows="3"
                name="descrizione">{{ old('descrizione', $pasta->descrizione) }}</textarea>
            <div class="invalid-feedback">
                @error('descrizione') {{ $message }} @enderror
            </div>
        </div>

        <button class="btn btn-primary">Salva</button>
        <a class="btn btn-primary" href="{{ route('home') }}">home</a>
    </form>
@endsection