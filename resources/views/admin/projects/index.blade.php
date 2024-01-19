@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mt-2">I MIEI PROGETTI</h2>
                @if (!empty(session('message')))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="table mt-5">
                    <thead>
                        <tr class="table-danger">
                            <th scope="col">#</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Modifica/Cancella</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr class="table-light">
                                <th scope="row">
                                    <button class="btn btn-primary">
                                        <a class=" text-white text-decoration-none"
                                            href="{{ route('admin.projects.show', $project->slug) }}">Mostra</a>
                                    </button>
                                </th>
                                <td><strong> {{ $project->title }}</strong></td>
                                <td> <a href="{{ route('admin.projects.edit', $project->slug) }}"
                                        class="btn btn-warning">Modifica</a>
                                    <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST"
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
                {{$projects->links('vendor.pagination.bootstrap-5')}}
                <button class="btn btn-primary mt-3">
                    <a class="text-white text-decoration-none" href="{{ route('admin.projects.create') }}">Inserisci un
                        nuovo progetto</a>
                </button>
            </div>
        </div>
    </div>
@endsection
