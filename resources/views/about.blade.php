<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About - AKID Hub</title>
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
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #111827; 
            padding: 0.5rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 0.2rem solid #374151;
            z-index: 1000; 
        }
        .logo {
            margin-top: 0.3rem;
            margin-left: 10rem;
            margin-bottom: 0.3rem;
            height: 3rem;
            filter: drop-shadow(0 0 10px rgba(244, 114, 182, 0.5));
        }
        .nav a {
            margin-left: 1.5rem;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: all 0.3s ease;
        }
        .nav a:hover {
            background-color: #374151;
        }
    </style>
</head>
<body>
    <header class="header">
        <img src="IMG/LOGO AKID_putih.png" alt="AKID Logo" class="logo">
        <nav class="nav">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('news') }}">News</a>
            @guest
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @else
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </nav>
    </header>
    <div style="padding-top: 5rem;">
        <h1>About AKID</h1>
        <p>This is the About page for AKID Hub. Learn more about our community here.</p>
    </div>
</body>
</html>