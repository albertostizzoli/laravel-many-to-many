@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (!empty(session('message')))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="table  mt-5">
                    <thead>
                        <tr class="table-danger">
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr class="table-light">
                                <th scope="row">
                                    <button class="btn btn-primary">
                                        <a class=" text-white text-decoration-none"
                                            href="{{ route('admin.types.show', $type->slug) }}">Mostra</a>
                                    </button>
                                </th>
                                <td><strong>{{ $type->name }}</strong></td>
                                <td> <a href="{{ route('admin.types.edit', $type->slug) }}"
                                        class="btn btn-warning">Modifica</a>
                                    <form action="{{ route('admin.types.destroy', $type->slug) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger cancel-button">Cancella</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-primary mt-3">
                    <a class="text-white text-decoration-none" href="{{ route('admin.types.create') }}">Inserisci una
                        nuova categoria</a>
                </button>
            </div>
        </div>
    </div>
    @include('partials.modal_delete')
@endsection
