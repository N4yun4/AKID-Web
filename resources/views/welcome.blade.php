<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="AKID Hub adalah komunitas game Arknights terbesar di Indonesia, menyediakan informasi, berita, dan kegiatan untuk para penggemar Arknights.">
    <meta name="keywords" content="AKID, Arknights, komunitas game, Indonesia, cosplay, gathering, event">
    <title>AKID Hub</title>
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
</head>
<body>
    <div class="container">
        <header class="header">
            <img src="{{ asset('IMG/LOGO AKID_putih.png') }}" alt="Logo AKID" class="logo">
            <nav class="nav">
                <a href="#beranda"><i class="bi bi-house"></i> HOME</a>
                <a href="#tentang"><i class="bi bi-info-circle"></i> INFORMATION</a>
                <a href="#lore"><i class="bi bi-book"></i> LORE</a>
                <a href="#berita"><i class="bi bi-newspaper"></i> NEWS</a>
                <a href="#video"><i class="bi bi-controller"></i> GAMEPLAY</a>
                @guest
                    <a href="{{ route('login') }}" class="profile-icon"><i class="bi bi-person-circle"></i></a>
                @else
                    <a href="{{ route('dashboard') }}">Dasbor</a>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </nav>
            <div class="hamburger" onclick="toggleMenu()">
                <i class="bi bi-list"></i>
            </div>
            <nav class="mobile-nav" id="mobileNav">
                <a href="#beranda"><i class="bi bi-house"></i> HOME</a>
                <a href="#tentang"><i class="bi bi-info-circle"></i> INFORMATION</a>
                <a href="#lore"><i class="bi bi-book"></i> LORE</a>
                <a href="#berita"><i class="bi bi-newspaper"></i> NEWS</a>
                <a href="#video"><i class="bi bi-controller"></i> GAMEPLAY</a>
                @guest
                    <a href="{{ route('login') }}" class="profile-icon"><i class="bi bi-person-circle"></i></a>
                @else
                    <a href="{{ route('dashboard') }}">Dasbor</a>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i>
                    </a>
                @endguest
            </nav>
        </header>

        <!-- Beranda Section -->
        <section id="beranda" class="hero">
            <img src="{{ asset('IMG/LOGO AKID kotak.png') }}" alt="Logo AKID" class="background" data-aos="fade-up" data-aos-duration="3000">
            <h1 class="text-4xl" data-aos="fade-up" data-aos-duration="3000">Selamat Datang di Informasi AKID</h1>
            <p class="mt-4 text-lg max-w-2xl mx-auto" data-aos="fade-up" data-aos-duration="3000">
                AKID adalah sebuah komunitas game Arknights asal Indonesia yang berisikan sepuh-sepuh dan leluhur dengan bigbrain tiada tandingannya.
            </p>
            <main id="AKID" class="grid" data-aos="fade-up" data-aos-duration="3000">
                <section class="card">
                    <div class="card-icon">
                        <svg class="w-6 h-6" fill="none" stroke="#f472b6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl mt-4">Siapakah Kami?</h2>
                    <p class="mt-2 text-sm">
                        AKID adalah sebuah komunitas game Arknights asal Indonesia yang berisikan sepuh-sepuh dan leluhur dengan bigbrain tiada tandingannya.
                    </p>
                    <a href="#tentang" class="mt-4 inline-block">Baca Selengkapnya</a>
                </section>
                <section class="card">
                    <div class="card-icon">
                        <svg class="w-6 h-6" fill="none" stroke="#f472b6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl mt-4">Partnership</h2>
                    <p class="mt-2 text-sm">
                        AMBOY ISI APE NI
                    </p>
                    <a href="#tentang" class="mt-4 inline-block">Baca Selengkapnya</a>
                </section>
                <section class="card">
                    <div class="card-icon">
                        <svg class="w-6 h-6" fill="none" stroke="#f472b6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl mt-4">Bergabunglah dengan AKID</h2>
                    <p class="mt-2 text-sm">
                        Bergabung bersama kami di AKID sekarang, kami menunggu mu untuk disiksa XD
                    </p>
                    <a href="https://heylink.me/AKID" class="mt-4 inline-block">Link Grup WA</a>
                </section>
            </main>
        </section>

        <!-- Tentang Section -->
        <section id="tentang" class="information">
            <div class="info-box" data-aos="fade-up" data-aos-duration="3000">
                <h2>Arknights</h2>
                <p>
                    Arknights berlatar di dunia fiksi bernama Terra, yang mirip Bumi tetapi dihuni oleh manusia dengan ciri-ciri hewan atau makhluk mitologi. Dunia ini sering dilanda bencana alam besar bernama "Catastrophes," yang meninggalkan mineral berharga sekaligus berbahaya bernama Originium...
                </p>
            </div>
            <div class="info-box" data-aos="fade-up" data-aos-duration="3000">
                <h2>Sejarah AKID</h2>
                <p>
                    AKID didirikan pada tahun 2020 oleh sekelompok penggemar Arknights di Indonesia. Awalnya hanya beranggotakan beberapa orang, komunitas ini berkembang pesat...
                </p>
            </div>
            <div class="info-box" data-aos="fade-up" data-aos-duration="3000">
                <h2>Misi Kami</h2>
                <p>
                    Misi AKID adalah menciptakan ruang yang aman dan menyenangkan bagi para penggemar Arknights untuk berkumpul, berbagi, dan berkreasi...
                </p>
            </div>
        </section>

         <!-- Include Lore Section -->
        <section id="lore" class="lore">
            <div class="lore-box"  data-aos="fade-up" data-aos-duration="3000">
                <h2>Lore Arknights</h2>
                <p>
                    Dunia Arknights, yang dikenal sebagai Terra, adalah tempat yang penuh dengan konflik dan misteri. Penduduk Terra memiliki ciri-ciri hewan atau makhluk mitologi, dan mereka menghadapi bencana alam besar yang disebut "Catastrophes." Bencana ini meninggalkan mineral berbahaya bernama Originium, yang menjadi sumber energi sekaligus penyebab penyakit mematikan bernama Oripathy...
                </p>
            </div>
            <div class="lore-box"  data-aos="fade-up" data-aos-duration="3000">
                <h2>Originium dan Oripathy</h2>
                <p>
                    Originium adalah mineral yang sangat berharga di Terra, digunakan untuk teknologi dan sihir. Namun, paparan Originium dapat menyebabkan Oripathy, penyakit yang tidak dapat disembuhkan dan sering kali mematikan. Penderita Oripathy, yang disebut "Infected," sering menghadapi diskriminasi dan pengasingan...
                </p>
            </div>
            <div class="lore-box"  data-aos="fade-up" data-aos-duration="3000">
                <h2>Rhodes Island</h2>
                <p>
                    Rhodes Island adalah organisasi farmasi yang berperan besar dalam cerita Arknights. Mereka berusaha mencari obat untuk Oripathy sambil melindungi para Infected dari diskriminasi. Sebagai Dokter, kamu memimpin Rhodes Island dalam misi-misi untuk menyelamatkan dunia...
                </p>
            </div>
        </section>

        <!-- Berita Section -->
        <section id="berita" class="section" >
            <h1>Berita AKID</h1>
            <p>Tetap terupdate dengan berita terbaru dari AKID Hub.</p>
            <div class="news-grid" data-aos="fade-up" data-aos-duration="3000">
                @forelse ($news as $item)
                    <div class="news-card">
                        @if ($item->image_url)
                            <img src="{{ asset('storage/' . $item->image_url) }}" alt="{{ $item->title }}" style="max-width: 100%; height: auto; margin-bottom: 10px;">
                        @endif
                        <h3>{{ $item->title }}</h3>
                        <p class="date">
                            {{ $item->date_published ? \Carbon\Carbon::parse($item->date_published)->format('d F Y') : 'No date' }}
                        </p>
                        <p>{{ Str::limit($item->content, 400) }}</p>
                        @if ($item->source)
                            <p class="text-muted small mt-1">
                                <strong>Sumber:</strong> 
                                <a href="{{ $item->source }}" target="_blank" rel="noopener noreferrer" style="color: #f472b6; text-decoration: none;">
                                    {{ $item->source }}
                                </a>
                            </p>
                        @endif
                        <a href="{{ route('news.show', $item->slug) }}" class="mt-2 inline-block" style="color: #f472b6; text-decoration: none;">
                            Baca Selengkapnya
                        </a>
                    </div>
                @empty
                    <p>Tidak ada berita tersedia saat ini.</p>
                @endforelse
            </div>
        </section>

  <!-- Video Section -->
  <section id="video" class="section">
            <h1>Video Terkait AKID</h1>
            <p>Tonton video menarik seputar Arknights dan komunitas AKID.</p>
            <div class="video-grid" data-aos="fade-up" data-aos-duration="3000">
                <!-- Video 1 -->
                <div class="video-card">
                    <a href="https://youtu.be/T36wBPCrG68?si=74H-TMEcv1XfXgx4" target="_blank" rel="noopener noreferrer">
                        <div class="video-wrapper">
                            <iframe src="https://www.youtube.com/embed/T36wBPCrG68" title="Arknights Official Trailer" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <h3>Arknights X Delicious in Dungeon</h3>
                    </a>
                </div>
                <!-- Video 2 -->
                <div class="video-card">
                    <a href="https://www.youtube.com/live/Rz9vYHlrtjE?si=hd-qxnubPjOtI2d_" target="_blank" rel="noopener noreferrer">
                        <div class="video-wrapper">
                            <iframe src="https://www.youtube.com/embed/Rz9vYHlrtjE" title="Arknights Gameplay Guide" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <h3>Arknights Gacha</h3>
                    </a>
                </div>
                <!-- Video 3 -->
                <div class="video-card">
                    <a href="https://youtu.be/5NPNb7Yt7Bk?si=mO15WWB3Z0QTPzk1" target="_blank" rel="noopener noreferrer">
                        <div class="video-wrapper">
                            <iframe src="https://www.youtube.com/embed/5NPNb7Yt7Bk" title="AKID Community Event Highlights" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <h3>Luthfi Halimawan Arknight Indonesia</h3>
                    </a>
                </div>
            </div>
        </section>
        <footer class="footer">
            AKID Hub © 2025 | Mengguncang Masa Depan
            <a href="#beranda" class="back-to-top" id="back-to-top">
                <i class="bi bi-arrow-up"></i>
                <span>TOP</span>
            </a>
        </footer>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>