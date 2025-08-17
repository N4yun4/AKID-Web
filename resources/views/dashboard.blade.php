<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __("Create New News") }}</h3>

                    @if (session('success'))
                        <div class="mb-4 text-green-500">{{ session('success') }}</div>
                    @endif

                    <!-- Form untuk membuat berita baru -->
                    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Judul -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                            @error('title')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Konten -->
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content</label>
                            <textarea name="content" id="content" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required></textarea>
                            @error('content')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category (Optional)</label>
                            <input type="text" name="category" id="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @error('category')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Sumber -->
                        <div class="mb-4">
                            <label for="source" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Source (Optional)</label>
                            <input type="text" name="source" id="source" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @error('source')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Gambar -->
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image (Optional)</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full text-gray-700 dark:text-gray-300">
                            @error('image')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tombol Submit -->
                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Create News') }}
                            </button>
                        </div>
                    </form>

                    <!-- Daftar Berita -->
                    <h3 class="text-lg font-semibold mt-8 mb-4">{{ __("Existing News") }}</h3>
                    @forelse (\App\Models\News::latest()->get() as $item)
                        <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-md">
                            <h4 class="text-md font-semibold">{{ $item->title }}</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $item->date_published ? $item->date_published->format('d F Y') : 'No date' }}</p>
                            <div class="mt-2">
                                <a href="{{ route('news.edit', $item->slug) }}" class="text-indigo-600 hover:underline">Edit</a>
                                <form action="{{ route('news.destroy', $item->slug) }}" method="POST" class="inline-block ml-4" onsubmit="return confirm('Are you sure you want to delete this news?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p>No news available.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>