<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    // Menampilkan halaman utama dengan berita
    public function index()
    {
        $news = News::latest()->take(5)->get();
        return view('welcome', compact('news'));
    }

    // Menyimpan berita baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string|max:255',
            'source' => 'nullable|string|max:255',
            'date_published' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Debugging: Log jika file gambar ada
        if ($request->hasFile('image')) {
            Log::info('File gambar ditemukan: ' . $request->file('image')->getClientOriginalName());
        } else {
            Log::info('Tidak ada file gambar yang diunggah.');
        }

        // Generate slug
        $slug = Str::slug($request->title);
        $counter = 1;
        while (News::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->title) . '-' . $counter++;
        }

        // Handle image upload
        $imageUrl = null;
        if ($request->hasFile('image')) {
            $imageUrl = $request->file('image')->store('news', 'public');
            Log::info('Gambar disimpan di: ' . $imageUrl);
        }

        News::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category' => $validated['category'],
            'source' => $validated['source'],
            'image_url' => $imageUrl,
            'date_published' => $validated['date_published'] ?? now(),
            'slug' => $slug,
            'views' => 0,
        ]);

        return redirect()->route('dashboard')->with('success', 'Berita berhasil dibuat!');
    }

    // Menampilkan detail berita
    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        $news->increment('views'); // Increment view count
        return view('news.show', compact('news'));
    }

    // Menampilkan form edit berita
    public function edit($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        return view('news.edit', compact('news'));
    }

    // Memperbarui berita
    public function update(Request $request, $slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string|max:255',
            'source' => 'nullable|string|max:255',
            'date_published' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Debugging: Log jika file gambar ada
        if ($request->hasFile('image')) {
            Log::info('File gambar ditemukan untuk update: ' . $request->file('image')->getClientOriginalName());
        } else {
            Log::info('Tidak ada file gambar baru yang diunggah untuk update.');
        }

        // Handle image upload
        $imageUrl = $news->image_url;
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($imageUrl) {
                Storage::disk('public')->delete(str_replace('storage/', '', $imageUrl));
                Log::info('Gambar lama dihapus: ' . $imageUrl);
            }
            $imageUrl = $request->file('image')->store('news', 'public');
            Log::info('Gambar baru disimpan di: ' . $imageUrl);
        }

        // Update slug only if title changes
        $newSlug = $news->slug;
        if ($news->title !== $request->title) {
            $newSlug = Str::slug($request->title);
            $counter = 1;
            while (News::where('slug', $newSlug)->where('id', '!=', $news->id)->exists()) {
                $newSlug = Str::slug($request->title) . '-' . $counter++;
            }
        }

        $news->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category' => $validated['category'],
            'source' => $validated['source'],
            'image_url' => $imageUrl,
            'date_published' => $validated['date_published'] ?? $news->date_published,
            'slug' => $newSlug,
        ]);

        return redirect()->route('dashboard')->with('success', 'Berita berhasil diperbarui!');
    }

    // Menghapus berita
    public function destroy($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        // Hapus gambar jika ada
        if ($news->image_url) {
            Storage::disk('public')->delete(str_replace('storage/', '', $news->image_url));
            Log::info('Gambar dihapus saat menghapus berita: ' . $news->image_url);
        }

        $news->delete();
        return redirect()->route('dashboard')->with('success', 'Berita berhasil dihapus!');
    }
}