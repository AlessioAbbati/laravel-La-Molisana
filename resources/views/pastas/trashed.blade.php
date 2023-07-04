@extends('layouts.base')

@section('contents')
    <h1>Paste</h1>

    @if (session('delete_success'))
        @php
            $pasta = session('delete_success')
        @endphp
        <div class="alert alert-danger">
            La pasta "{{ $pasta->titolo }}" è stata eliminata
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
            @foreach ($trashedPastas as $pasta)
                <tr>
                    <th scope="row">{{ $pasta->id }}</th>
                    <td>{{ $pasta->titolo }}</td>
                    <td>{{ $pasta->tipo }}</td>
                    <td>{{ $pasta->cottura }}</td>
                    <td>{{ $pasta->peso }}</td>
                    <td>
                        
                        <form action="{{ route('pastas.restore', ['pasta' => $pasta->id]) }}" method="POST" class="d-inline-block">
                            @csrf
                            <button class="btn btn-success" href="">Ripristina</button>
                        </form>

                        {{-- <form action="{{ route('pastas.hardDelete', ['pasta' => $pasta->id]) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" href="">Elimina definitivamente</button>
                        </form> --}}

                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{ $pasta->id }}">
                            elimina definitivamente
                        </button>
                          
                          <!-- Modal -->
                          <div class="modal fade" id="modal{{ $pasta->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">sei sicuro?</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  la risorsa non potrà piu essere recuperata
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <form action="{{ route('pastas.hardDelete', ['pasta' => $pasta->id]) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" href="">Elimina definitivamente</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $trashedPastas->links() }}

@endsection