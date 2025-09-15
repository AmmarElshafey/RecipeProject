<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Project</title>
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
</head>
<body>

   <nav class="navbar">
    <h1>Chef Ammar 👨‍🍳</h1>
    <div class="nav-links">
        <a href="{{ route('recipes.index') }}">Home</a>
        <a href="{{ route('recipes.create') }}">Add Recipe</a>

        @auth
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
       @else
            <a href="{{ route('login') }}">Login</a>
          @endauth
    </div>
</nav>


    <div class="container">
        @yield('content')
    </div>

</body>
</html>
