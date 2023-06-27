@extends('layouts.app')

@extends('layouts.sidebar')
@section('content')
<h1>Clienti</h1>

<table class="table">
    <thead>
        <tr>
            <th>CF cliente</th>
            <th>Nome Cliente</th>
            <th>Cognome Cliente</th>
            <th>Data di nascita</th>
            <th>Telefono</th>
            <th>Buono d'acquisto</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clienti as $cliente)
        <tr>
            <td>{{ $cliente->CF }}</td>
            <td>{{ $cliente->nome }}</td>
            <td>{{ $cliente->cognome }}</td>
            <td>{{ $cliente->data_nascita }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td>{{ $cliente->buono_acquisto }}</td>
            <td>
                <a href="{{ route('clienti.show', $cliente->CF) }}" class="btn btn-primary">Show</a>
                <a href="{{ route('clienti.edit', $cliente->CF) }}" class="btn btn-success">Edit</a>
                <form action="{{ route('clienti.destroy', $cliente->CF) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('clienti.create') }}" class="btn btn-primary fixed-bottom-right">
    <i class="fas fa-plus"></i> Add
</a>

@if (session('message'))
    <div class="alert alert-success mt-4">
        {{ session('message') }}
    </div>

@endif
@endsection

