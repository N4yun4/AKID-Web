<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News - AKID Hub</title>
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
        table {
            width: 80%;
            margin: 2rem auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 1rem;
            border: 1px solid #374151;
        }
        th {
            background-color: #1f2937;
        }
    </style>
</head>
<body>
    <h1>Admin News, {{ Auth::user()->name }}!</h1>
    <p>This is your news management page.</p>

    @if (session('success'))
        <p style="color: #10b981;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('admin/news/create') }}">Add News</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Content</th>
                <th>Source</th>
                <th>Image URL</th>
                <th>Slug</th>
            </tr>
        </thead>
        <tbody>
   
        </tbody>
    </table>

    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>