<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<style>
    .card{
        margin-left: 90px;
        gap: 2px;
        margin-top: 14px;
    }
    .form-control{
        width: 300px;
    }
    .search-form {
        margin-left: 190px;
        max-width: 550px; /* Adjust as needed */
        margin-bottom: 10px; /* Optional: Adjust margin */
    }
</style>
<body>
    <!-- resources/views/categories/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <center><h3>{{ $category->name }}</h3></center>

        <!-- Search Form -->
        <form method="GET" action="{{ route('categories.show', $category->id) }}" class="search-form">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search notes..." value="{{ request()->query('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i> <!-- Replace with the appropriate Font Awesome class -->
                    </button>
                </div>
            </div>
        </form>
        
        
        <ul>
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 g-2">
                    @forelse($notes as $note)
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $note->title }}</h5>
                                    <hr>
                                    <p class="card-text">{{ $note->content }}</p>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-sm me-2">
                                            <i class="fa fa-edit text-success"></i> 
                                        </a>
                                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this note?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm">
                                                <i class="fa fa-trash text-danger"></i> 
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col">
                            <h1>No notes in this category</h1>
                        </div>
                    @endforelse
                </div>
            </div>
        </ul>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
