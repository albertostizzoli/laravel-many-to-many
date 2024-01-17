@extends('layouts.app')
@section('content')
    <section class="container text-center">
        <h1>I MIEI PROGETTI</h1>
        <a class="btn btn-success" href="{{ route('admin.projects.index') }}">Visualizza i Progetti</a>
    </section>
@endsection
