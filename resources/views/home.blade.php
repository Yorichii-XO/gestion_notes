<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h1 class="display-4">Welcome to Notely</h1>
    <p class="lead">Notely is your go-to application for managing notes and categories efficiently.</p>
    <hr class="my-4">
    <p>Start organizing your notes today!</p>
    <a class="btn btn-primary btn-lg" href="{{ route('notes.index') }}" role="button">Get Started</a>
</div>
@endsection
