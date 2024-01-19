@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mt-2">LE TECNOLOGIE</h2>
                @if (session()->has('message'))
                    <div class="alert alert-success mb-3 mt-3">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <table class="table  mt-5">
                    <thead>
                        <tr class="table-danger">
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            @if (Auth::id() == 1)
                                <th scope="col">Modifica/Cancella</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($technologies as $technology)
                            <tr class="table-light">
                                <th scope="row">
                                    <button class="btn btn-primary">
                                        <a class=" text-white text-decoration-none"
                                            href="{{ route('admin.technologies.show', $technology->slug) }}">Mostra</a>
                                    </button>
                                </th>
                                <td><strong>{{ $technology->name }}</strong></td>
                                @if (Auth::id() == 1)
                                    <td> <a href="{{ route('admin.technologies.edit', $technology->slug) }}"
                                            class="btn btn-warning">Modifica</a>
                                        <form action="{{ route('admin.technologies.destroy', $technology->slug) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger cancel-button">Cancella</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-primary mt-3">
                    <a class="text-white text-decoration-none" href="{{ route('admin.technologies.create') }}">Inserisci una
                        nuova tecnologia</a>
                </button>
            </div>
        </div>
    </div>
    @include('partials.modal_delete')
@endsection
