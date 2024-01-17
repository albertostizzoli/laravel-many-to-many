@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $project->title }}</h1>
                <p>{{ $project->description }}</p>
                <span>{{ $project->type ? $project->type->name : 'Uncategorized' }}</span>
                <p>Tecnologie usate: {{ $project->technologies }}</p>
                <p>Repo GitHub:<a href="{{ $project->url }}">{{ $project->url }}</a></p>
                <div>
                    <img class="w-50" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                </div>
                <button class="btn btn-primary d-inline-block">
                    <a class="text-white text-decoration-none"
                        href="{{ route('admin.projects.edit', $project->slug) }}">Modifica</a>
                </button>

                <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger cancel-button">Cancella</button>
                </form>
            </div>
        </div>
    </div>
    @include('partials.modal_delete')
@endsection
