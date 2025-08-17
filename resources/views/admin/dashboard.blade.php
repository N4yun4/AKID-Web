<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - AKID Hub</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            background-color: #111827;
            color: #d1d5db;
            font-family: Figtree, ui-sans-serif, system-ui, sans-serif;
            text-align: center;
            padding: 5rem;
        }
        a {
            color: #f472b6;
            text-decoration: none;
        }
        a:hover {
            color: #f9a8d4;
        }
    </style>
</head>
<body>
    <h1>Welcome to Dashboard Admin, {{ Auth::user()->name }}!</h1>
    <p>This is your dashboard page.</p>
    <p><a href="news" class="btn btn-primary">News</a></p>
    
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>