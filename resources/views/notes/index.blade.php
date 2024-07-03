<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            gap: 5px;
            list-style: none;
            padding: 0;
        }

        .pagination li {
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            border-radius: 50%;
        }

        .pagination li a, .pagination li span {
            display: inline-block;
            width: 100%;
            height: 100%;
            color: #000;
            background-color: #ccc;
            border: 1px solid transparent;
            border-radius: 50%;
            text-decoration: none;
        }

        .pagination li.active span {
            background-color: #333;
            color: #fff;
        }

        .pagination li.disabled span {
            pointer-events: none;
            background-color: #ddd;
        }
    </style>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="">
                    <h3>Notes</h3>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="mb-3">
                        <a href="{{ route('notes.create') }}" class="btn btn-primary">Create Note</a>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($notes as $note)
                                <tr>
                                    <td>{{ $note->id }}</td>
                                    <td>{{ $note->title }}</td>
                                    <td>{{ $note->content }}</td>
                                    <td>{{ $note->category ? $note->category->name : 'Uncategorized' }}</td>
                                    <td>
                                        <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this note?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center mt-4">
                        <ul class="pagination">
                            {{-- Previous Page Link --}}
                            @if ($notes->onFirstPage())
                                <li class="disabled"><span>&lsaquo;</span></li>
                            @else
                                <li><a href="{{ $notes->previousPageUrl() }}" rel="prev">&lsaquo;</a></li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($notes->getUrlRange(1, $notes->lastPage()) as $page => $url)
                                @if ($page == $notes->currentPage())
                                    <li class="active"><span>{{ $page }}</span></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($notes->hasMorePages())
                                <li><a href="{{ $notes->nextPageUrl() }}" rel="next">&rsaquo;</a></li>
                            @else
                                <li class="disabled"><span>&rsaquo;</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
