@extends('layouts.base')

@section('contents')
    <h1>Inserisci nuova pasta</h1>

    

    <form method="POST" action="{{ route('pastas.store') }}">
        @csrf

        <div class="mb-3">
            <label for="titolo" class="form-label">Titolo</label>
            <input
                type="text"
                class="form-control @error('titolo') is-invalid @enderror"
                id="titolo"
                name="titolo"
                value="{{ old('titolo') }}"
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
                value="{{ old('src') }}"
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
                value="{{ old('tipo') }}"
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
                value="{{ old('cottura') }}"
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
                value="{{ old('peso') }}"
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
                name="descrizione">{{ old('descrizione') }}</textarea>
            <div class="invalid-feedback">
                @error('descrizione') {{ $message }} @enderror
            </div>
        </div>

        <button class="btn btn-primary">Salva</button>
        <a class="btn btn-primary" href="{{ route('home') }}">home</a>
        <a class="btn btn-primary" href="{{ route('pastas.trashed') }}">cestino</a>
    </form>
@endsection