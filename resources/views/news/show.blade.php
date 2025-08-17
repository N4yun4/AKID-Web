<!-- resources/views/news/show.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="AKID Hub adalah komunitas game Arknights terbesar di Indonesia, menyediakan informasi, berita, dan kegiatan untuk para penggemar Arknights.">
    <meta name="keywords" content="AKID, Arknights, komunitas game, Indonesia, cosplay, gathering, event">
    <title>{{ $news->title }} - AKID Hub</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('IMG/favicon.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Custom CSS -->
    <style>
        /* Header dengan Gambar Latar */
        .news-header {
            position: relative;
            height: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            border-radius: 0.5rem;
        }

        .news-header h1 {
            position: relative;
            z-index: 1;
            font-size: 2.5rem;
            font-weight: 600;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        /* Konten Berita */
        .news-content {
            background: #1f2937;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            color: #e5e7eb;
        }

        .news-meta {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            color: #9ca3af;
        }

        .news-meta i {
            margin-right: 0.5rem;
            color: #f472b6;
        }

        .news-content p {
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }
        /* Tombol Kembali */
        .back-button {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            color: #f472b6;
            text-decoration: none;
            border: 1px solid #f472b6;
            border-radius: 0.25rem;
            transition: background-color 0.3s, color 0.3s;
        }

        .back-button:hover {
            background-color: #f472b6;
            color: white;
        }

        .back-button i {
            margin-right: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Berita dengan Gambar Latar -->
        <section class="news-header" style="background-image: url('https://via.placeholder.com/1200x400?text=AKID+News');">
            <h1>{{ $news->title }}</h1>
        </section>

        <!-- Konten Detail Berita -->
        <section id="detail-berita" class="section" data-aos="fade-up" data-aos-duration="3000">
            <div class="news-content" style="max-width: 800px; margin: 0 auto;">
                <!-- Meta Informasi -->
                <div class="news-meta">
                    <span>
                        <i class="bi bi-calendar3"></i>
                        @if ($news->date_published)
                            {{ \Carbon\Carbon::parse($news->date_published)->format('d F Y') }}
                        @else
                            No date
                        @endif
                    </span>
                    @if ($news->category)
                        <span>
                            <i class="bi bi-tag"></i>
                            {{ $news->category }}
                        </span>
                    @endif
                    <span>
                        <i class="bi bi-eye"></i>
                        {{ $news->views }} Views
                    </span>
                </div>

                <!-- Konten Berita -->
                <p>{{ $news->content }}</p>
                @if ($news->image_url)
                    <img src="{{ asset('storage/' . $news->image_url) }}" alt="{{ $news->title }}" style="max-width: 100%; height: auto; margin-top: 20px; margin-bottom: 20px;">
                @endif

                <!-- Tampilkan Sumber sebagai Link -->
                @if ($news->source)
                    <p class="text-muted small mb-4">
                        <strong>Sumber:</strong> 
                        <a href="{{ $news->source }}" target="_blank" rel="noopener noreferrer" style="color: #f472b6;">{{ $news->source }}</a>
                    </p>
                @endif

                <!-- Tombol Kembali -->
                <a href="{{ url('/') }}" class="back-button mt-4">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            AKID Hub © 2025 | Mengguncang Masa Depan
            <a href="#detail-berita" class="back-to-top" id="back-to-top">
                <i class="bi bi-arrow-up"></i>
                <span>TOP</span>
            </a>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        AOS.init();

        // Back to Top
        const backToTop = document.getElementById('back-to-top');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTop.style.display = 'flex';
            } else {
                backToTop.style.display = 'none';
            }
        });

        // Toggle Mobile Menu
        function toggleMenu() {
            const mobileNav = document.getElementById('mobileNav');
            mobileNav.classList.toggle('active');
        }
    </script>
</body>
</html>