@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $project->title }}</h1>
                <div>
                    <p>{{ $project->description }}</p>
                    <p>Repo GitHub: <a href="{{$project->url}}">Clicca qui</a></p>
                    @if ($project->type_id)
                        <div class="mb-3">
                            <h4>Tipo:</h4>
                            <a href="{{ route('admin.types.show', $project->type->slug) }}"
                                class="badge text-bg-primary p-3">{{ $project->type->name }}</a>
                        </div>
                    @endif
                    <img width="150" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                    @if (count($project->technologies) > 0)
                        <div class="mb-3">
                            <h4>Tecnologie:</h4>
                            @foreach ($project->technologies as $technology)
                                <a class="badge rounded-pill text-bg-warning p-3"
                                    href="{{ route('admin.technologies.show', $technology->slug) }}">{{ $technology->name }}</a>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="d-flex justify-content-start align-items-center">
                    <button class="btn btn-primary d-inline-block me-4">
                        <a class="text-white text-decoration-none"
                            href="{{ route('admin.projects.edit', $project->slug) }}">Modifica</a>
                    </button>
                    <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger cancel-button me-4">Cancella</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('partials.modal_delete')
@endsection

