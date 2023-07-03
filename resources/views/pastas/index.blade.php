@extends('layouts.base')

@section('contents')
    <h1>Paste</h1>

    @if (session('delete_success'))
        @php
            $pasta = session('delete_success')
        @endphp
        <div class="alert alert-danger">
            La pasta "{{ $pasta->titolo }}" è stata eliminata
            <form action="{{ route("pastas.restore", ['pasta' => $pasta] )}}" method="post">
                @csrf
                <button class="btn btn-warning">ripristina</button>
            </form>
        </div>
    @endif

    @if (session('restore_success'))
        @php
            $pasta = session('restore_success')
        @endphp
        <div class="alert alert-success">
            La pasta "{{ $pasta->titolo }}" è stata ripristinata
            
        </div>
    @endif

    <a class="btn btn-primary" href="{{ route('pastas.create') }}">Nuovo</a>
    <a class="btn btn-primary" href="{{ route('home') }}">home</a>
    <a class="btn btn-primary" href="{{ route('pastas.trashed') }}">cestino</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Tipo</th>
                <th scope="col">Cottura (min)</th>
                <th scope="col">Peso (g)</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pastas as $pasta)
                <tr>
                    <th scope="row">{{ $pasta->id }}</th>
                    <td>{{ $pasta->titolo }}</td>
                    <td>{{ $pasta->tipo }}</td>
                    <td>{{ $pasta->cottura }}</td>
                    <td>{{ $pasta->peso }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('pastas.show', ['pasta' => $pasta->id]) }}">View</a>
                        <a class="btn btn-warning" href="{{ route('pastas.edit', ['pasta' => $pasta->id]) }}">Edit</a>
                        <form action="{{ route('pastas.destroy', ['pasta' => $pasta->id]) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" href="">Delete</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $pastas->links() }}

@endsection