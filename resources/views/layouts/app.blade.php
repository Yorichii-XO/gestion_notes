<!-- app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar{
            margin-top: 20px;
            height: 90%;
           
        }
        .sidebar-icon {
            margin-right: 10px;
        }

        .sidebar-footer {
            padding: 10px;
            text-align: center;
            background-color: #e9ecef;
        }
        nav{
            background-color:#101011;
            color: white;
        }
        nav ul li{
             color: white;
        }
       /* public/css/app.css or your stylesheet */
.pagination {
    display: flex;
    justify-content: center;
    gap: 5px;
    list-style: none;
}

.pagination li {
    width: 30px;
    height: 30px;
    text-align: center;
    line-height: 30px;
    border-radius: 50%;
}

.pagination li a {
    display: inline-block;
    width: 100%;
    height: 100%;
    color: #000;
    background-color: #ccc;
    border: 1px solid transparent;
    border-radius: 50%;
    text-decoration: none;
}

.pagination li.active a {
    background-color: #333;
    color: #fff;
}

.pagination li.disabled a {
    pointer-events: none;
    background-color: #ddd;
}

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md text-white  bg-black">
            <a class="navbar-brand text-white" href="#">Notely</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('notes.index') }}">Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('categories.index') }}">Categories</a>
                    </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
                        </li>
                    @endguest
                </ul>
                @auth
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <a class="dropdown-item" href="#">
                                Settings
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                
                
                @endauth
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 sidebar">
                    @include('partials.sidebar')
                </div>
             
                <div class="col-md-10 content">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
               
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>




