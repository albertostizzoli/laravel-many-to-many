@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>{{$technology->name}}</h1>
        <h3>Technology List</h3>
        <ul class="list-group list-group-flush">
            @forelse ($technology->projects as $project)
                <li class="list-group-item">
                    <a href="{{route('admin.technologies.show', $project->slug)}}" class="link-underline link-underline-opacity-0"> {{$project->title}}</a>
                </li>
            @empty
                <li>No posts</li>
            @endforelse
        </ul>
    </section>
@endsection
