<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .text-center-custom {
            font-size: 18px;
        }
        .bg-blue-custom {
            height: 90%;
            overflow: hidden;
            background-color: #111111; /* Custom dark color */
            border-radius: 5px;
        }
        .nav-link {
            font-size: 17px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    @auth
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-blue-custom mt-6" style="width: 280px; min-height: 85vh;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <strong class="fs-4 text-white text-center-custom">📝My Categories</strong>
        </a>
        <hr>
        <a href="{{ route('categories.create') }}" class="btn btn-light mb-3">Create Category&nbsp; ➕</a>
        <ul class="nav nav-pills flex-column mb-auto">
            @foreach($categories as $category)
                <li class="nav-item">
                    <a href="{{ route('categories.show', $category->id) }}" class="nav-link text-white">
                         🔗  {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
        <hr>
        <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                <span class="d-none d-sm-inline mx-1">loser</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="href="{{ route('logout') }}"">Sign out</a></li>
            </ul>
        </div>
    </div>
    @endauth
   
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log('DOM fully loaded and parsed');
            const dropdownUser1 = document.getElementById('dropdownUser1');
            dropdownUser1.addEventListener('click', function () {
                console.log('Dropdown clicked');
            });
        });
    </script>
</body>
</html>
