<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Notely</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .jumbotron-custom {
            
            width: 90%;
            height: 50%;
            margin-left: 60px;
            padding: 2rem 2rem;
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }
        .jumbotron{
            background-color: white;
        }
        .jumbotron-custom img {
            max-width: 70%;
            height: auto;
            margin-bottom: 2rem;
        }
        .jumbotron-custom h1 {
            font-size: 2.5rem;
            font-weight: 300;
            margin-bottom: 1rem;
        }
        .jumbotron-custom p {
            font-size: 1.25rem;
            font-weight: 300;
        }
    </style>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="jumbotron jumbotron-custom text-center" style="background-color: white;height:80%">
            <h1 class="display-4">Welcome to Notely</h1>
            <img src="https://theplaidzebra.com/wp-content/uploads/2015/12/1_-lazy-student%E2%80%99s-guide-to-taking-notes.jpg" alt="Notely">
           
        </div>
    </div>
    @endsection

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
