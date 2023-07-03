@extends('layouts.base')

@section('contents')
<h1>home</h1>

<a class="btn btn-primary" href="{{ route('pastas.index') }}">pastas</a>
<a class="btn btn-primary" href="{{ route('pastas.create') }}">Nuovo</a>
<a class="btn btn-primary" href="{{ route('pastas.trashed') }}">cestino</a>
@endsection