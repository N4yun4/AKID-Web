<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add News - AKID Hub</title>
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
        form {
            width: 50%;
            margin: 2rem auto;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
        }
        input, textarea, select {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            background-color: #1f2937;
            border: 1px solid #374151;
            color: #d1d5db;
            border-radius: 0.25rem;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
        }
        button {
            padding: 0.5rem 1rem;
            background-color: #10b981;
            color: white;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
        }
        button:hover {
            background-color: #059669;
        }
        .btn-back {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #6b7280;
            border-radius: 0.25rem;
        }
        .btn-back:hover {
            background-color: #4b5563;
        }
        .error {
            color: #ef4444;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <h1>Add News, {{ Auth::user()->name }}!</h1>
    <p>Create a new news article below.</p>

    @if (session('success'))
        <p style="color: #10b981;">{{ session('success') }}</p>
    @endif

    <!-- Form untuk menambah berita -->
    <form action="{{ route('admin/news/store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            @error('title')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="category">Category</label>
            <input type="text" name="category" id="category" value="{{ old('category') }}">
            @error('category')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="content">Content</label>
            <textarea name="content" id="content" rows="5" required>{{ old('content') }}</textarea>
            @error('content')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="source">Source (optional)</label>
            <input type="text" name="source" id="source" value="{{ old('source') }}">
            @error('source')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="image_url">Image URL (optional)</label>
            <input type="url" name="image_url" id="image_url" value="{{ old('image_url') }}">
            @error('image_url')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Add News</button>
        <a href="{{ route('admin/news') }}" class="btn-back">Go Back</a>
    </form>

    <!-- Logout -->
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>