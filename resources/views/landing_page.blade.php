<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>KAWWAN — Sistem Informasi Pelayanan Kesehatan Hewan</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/styles.css', 'resources/js/script.js'])
</head>
<body>

    <header class="kw-navbar">
        <div class="kw-container kw-navbar-inner">
            <a href="{{ route('landing') }}" class="kw-logo">
                <div class="kw-logo-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2a10 10 0 1 0 10 10H12V2z"/>
                        <path d="M12 12L2.5 7.5"/>
                    </svg>
                </div>
                KAW<span class="kw-logo-accent">WAN</span>
            </a>

            <nav class="kw-nav-menu" aria-label="Navigasi Utama">
                <a href="{{ route('landing') }}" class="kw-nav-link is-active">Beranda</a>
                <a href="#layanan" class="kw-nav-link">Layanan Kesehatan</a>
                <a href="#fitur" class="kw-nav-link">Fitur</a>
                <a href="#artikel" class="kw-nav-link">Artikel</a>
                @auth
                    <a href="#profil" class="kw-nav-link">Profil</a>
                @endauth
            </nav>

            <div class="kw-nav-actions">
                @auth
                    <form method="POST" action="{{ route('logout') }}" class="kw-nav-logout-form">
                        @csrf
                        <button type="submit" class="kw-nav-logout-btn">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="kw-nav-sign-in">Masuk</a>
                    <a href="{{ route('register') }}" class="kw-btn kw-btn-primary kw-btn-sm">
                        <span>Daftar Akun</span>
                        <div class="kw-btn-arrow-circle">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </div>
                    </a>
                @endauth
            </div>

            <button class="kw-mobile-toggle" aria-label="Buka menu navigasi" aria-expanded="false">
                <span class="kw-mobile-toggle-bar"></span>
                <span class="kw-mobile-toggle-bar"></span>
                <span class="kw-mobile-toggle-bar"></span>
            </button>
        </div>

        <div class="kw-mobile-menu">
            <a href="{{ route('landing') }}" class="kw-mobile-link">Beranda</a>
            <a href="#layanan" class="kw-mobile-link">Layanan Kesehatan</a>
            <a href="#fitur" class="kw-mobile-link">Fitur</a>
            <a href="#artikel" class="kw-mobile-link">Artikel</a>
            @auth
                <a href="#profil" class="kw-mobile-link">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="kw-nav-logout-btn">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="kw-mobile-link">Masuk</a>
                <a href="{{ route('register') }}" class="kw-mobile-link">Daftar Akun</a>
            @endauth
        </div>
    </header>

    <main>
        <section class="kw-modern-hero">
            <div class="kw-container kw-modern-hero-grid">
                
                <div class="kw-hero-left">
                    <div class="kw-hero-pill-badge">
                        <span class="kw-pill-tag">NEW</span>
                        <span>KAWWAN 2.0 &bull; Platform Puskeswan Modern</span>
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"/>
                        </svg>
                    </div>

                    <h1 class="kw-modern-hero-title">
                        Rawat Sahabatmu, <span class="kw-highlight">Lebih Mudah</span> Bersama KAWWAN.
                    </h1>

                    <p class="kw-modern-hero-desc">
                        Kelola data hewan, akses jadwal pelayanan dokter, dan pantau riwayat pemeriksaan Puskeswan dalam satu platform digital terpadu yang andal.
                    </p>

                    <div class="kw-hero-cta-group">
                        <a href="#layanan" class="kw-btn kw-btn-primary">
                            <span>Lihat Layanan</span>
                            <div class="kw-btn-arrow-circle">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                    <polyline points="12 5 19 12 12 19"/>
                                </svg>
                            </div>
                        </a>

                        <a href="#fitur" class="kw-btn kw-btn-secondary">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <polygon points="10 8 16 12 10 16 10 8"/>
                            </svg>
                            <span>Pelajari Alur</span>
                        </a>
                    </div>

                    <div class="kw-hero-trust-row">
                        <div class="kw-hero-trust-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                            <span>Tanpa antre manual</span>
                        </div>
                        <div class="kw-hero-trust-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                            <span>Rekam medis digital</span>
                        </div>
                        <div class="kw-hero-trust-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                            <span>Dokter terverifikasi</span>
                        </div>
                    </div>
                </div>

                <div class="kw-hero-mockup-wrap">
                    <div class="kw-dashboard-mockup">
                        <div class="kw-mockup-header">
                            <div class="kw-mockup-dots">
                                <span class="kw-mockup-dot kw-mockup-dot-red"></span>
                                <span class="kw-mockup-dot kw-mockup-dot-yellow"></span>
                                <span class="kw-mockup-dot kw-mockup-dot-green"></span>
                            </div>

                            <div class="kw-mockup-search">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"/>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                            </svg>
                            <span>Cari pasien atau antrean...</span>
                            </div>

                            <div class="kw-mockup-profile">
                                <div class="kw-mockup-avatar">DR</div>
                                <span>drh. Sinta Permata</span>
                            </div>
                        </div>

                        <div class="kw-mockup-body">
                            <div class="kw-mockup-welcome">
                                <h4>Dashboard Pelayanan Puskeswan</h4>
                                <p>Sistem operasional dan status antrean aktif hari ini.</p>
                            </div>

                            <div class="kw-mockup-metrics-grid">
                                <div class="kw-mockup-metric-card">
                                    <div class="kw-mockup-metric-label">Pasien Hewan</div>
                                    <div class="kw-mockup-metric-value">1,245</div>
                                    <div class="kw-mockup-metric-change">&uarr; +12% bln ini</div>
                                </div>
                                <div class="kw-mockup-metric-card">
                                    <div class="kw-mockup-metric-label">Jadwal Aktif</div>
                                    <div class="kw-mockup-metric-value">128</div>
                                    <div class="kw-mockup-metric-change">Tersedia</div>
                                </div>
                                <div class="kw-mockup-metric-card">
                                    <div class="kw-mockup-metric-label">Antrean Selesai</div>
                                    <div class="kw-mockup-metric-value">8,430</div>
                                    <div class="kw-mockup-metric-change">&uarr; 98.4%</div>
                                </div>
                                <div class="kw-mockup-metric-card">
                                    <div class="kw-mockup-metric-label">Indeks Sehat</div>
                                    <div class="kw-mockup-metric-value">99.2%</div>
                                    <div class="kw-mockup-metric-change">Optimal</div>
                                </div>
                            </div>

                            <div class="kw-mockup-chart-box">
                                <div class="kw-mockup-chart-header">
                                    <h5>Aktivitas Pemeriksaan Mingguan</h5>
                                    <span>Puskeswan Terpadu</span>
                                </div>
                                <svg viewBox="0 0 400 70" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 60px;">
                                    <path d="M0 50 C 40 40, 80 55, 120 30 C 160 15, 200 45, 240 20 C 280 10, 320 28, 360 15 L 400 8" stroke="#079FA8" stroke-width="2.5" stroke-linecap="round"/>
                                    <path d="M0 50 C 40 40, 80 55, 120 30 C 160 15, 200 45, 240 20 C 280 10, 320 28, 360 15 L 400 8 L 400 70 L 0 70 Z" fill="url(#tealGradient)" opacity="0.12"/>
                                    <defs>
                                        <linearGradient id="tealGradient" x1="0" y1="0" x2="0" y2="70" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#079FA8"/>
                                            <stop offset="1" stop-color="#079FA8" stop-opacity="0"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>

                            <div class="kw-mockup-table-wrap">
                                <div class="kw-mockup-row">
                                    <span class="kw-mockup-pet-name">Milo &bull; Kucing Domestik</span>
                                    <span class="kw-mockup-tag kw-tag-done">Pemeriksaan Selesai</span>
                                </div>
                                <div class="kw-mockup-row">
                                    <span class="kw-mockup-pet-name">Bruno &bull; Golden Retriever</span>
                                    <span class="kw-mockup-tag kw-tag-progress">Antrean Poli A-014</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="kw-network-banner">
            <div class="kw-container">
                <div class="kw-network-title">
                    Terhubung dengan Jaringan Pusat Kesehatan Hewan &amp; Dokter Hewan Daerah
                </div>
                <div class="kw-network-logos-row">
                    <span class="kw-network-badge">Puskeswan Wilayah</span>
                    <span class="kw-network-badge">Perhimpunan Dokter Hewan</span>
                    <span class="kw-network-badge">Klinik Hewan Pratama</span>
                    <span class="kw-network-badge">Laboratorium Diagnostik</span>
                    <span class="kw-network-badge">Dinas Peternakan</span>
                </div>
            </div>
        </section>

        <section class="kw-features-section" id="layanan">
            <div class="kw-container">
                <div class="kw-section-header">
                    <span class="kw-section-eyebrow">Layanan Unggulan</span>
                    <h2 class="kw-section-title">
                        Semua Kebutuhan Pelayanan <span>Sahabat Hewan</span>
                    </h2>
                    <p class="kw-section-desc">
                        Fitur-fitur komprehensif yang dirancang untuk mempermudah pemilik hewan dan tenaga medis Puskeswan dalam satu platform.
                    </p>
                </div>

                <div class="kw-features-grid">
                    <div class="kw-feature-card">
                        <div>
                            <div class="kw-feature-icon-box">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="4" r="2"/>
                                    <circle cx="18" cy="8" r="2"/>
                                    <circle cx="20" cy="16" r="2"/>
                                    <path d="M9 10a5 5 0 0 1 5 5v3.5a3.5 3.5 0 0 1-6.84 1.045Q6.52 17.48 4.46 16.83A3.5 3.5 0 0 1 5.5 10Z"/>
                                </svg>
                            </div>
                            <h3 class="kw-feature-title">Data Hewan Terpusat</h3>
                            <p class="kw-feature-desc">
                                Simpan identitas lengkap hewan kesayangan Anda, termasuk jenis ras, tanggal lahir, ciri khas, dan status vaksinasi secara terstruktur.
                            </p>
                        </div>
                        <a href="#profil" class="kw-feature-link">
                            <span>Kelola Data</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                    </div>

                    <div class="kw-feature-card">
                        <div>
                            <div class="kw-feature-icon-box">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                    <line x1="16" y1="2" x2="16" y2="6"/>
                                    <line x1="8" y1="2" x2="8" y2="6"/>
                                    <line x1="3" y1="10" x2="21" y2="10"/>
                                </svg>
                            </div>
                            <h3 class="kw-feature-title">Jadwal Pelayanan Real-time</h3>
                            <p class="kw-feature-desc">
                                Pantau jadwal operasional dokter hewan dan ketersediaan kuota pelayanan Puskeswan secara transparan sebelum berkunjung.
                            </p>
                        </div>
                        <a href="#layanan" class="kw-feature-link">
                            <span>Lihat Jadwal</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                    </div>

                    <div class="kw-feature-card">
                        <div>
                            <div class="kw-feature-icon-box">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M15 5v2"/>
                                    <path d="M15 11v2"/>
                                    <path d="M15 17v2"/>
                                    <path d="M5 5h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2z"/>
                                </svg>
                            </div>
                            <h3 class="kw-feature-title">Pemesanan Antrean Mandiri</h3>
                            <p class="kw-feature-desc">
                                Dapatkan nomor antrean digital langsung dari rumah tanpa harus menunggu berjam-jam di ruang tunggu Puskeswan.
                            </p>
                        </div>
                        <a href="#layanan" class="kw-feature-link">
                            <span>Pesan Sekarang</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                    </div>

                    <div class="kw-feature-card">
                        <div>
                            <div class="kw-feature-icon-box">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                </svg>
                            </div>
                            <h3 class="kw-feature-title">Rekam Medis &amp; Riwayat</h3>
                            <p class="kw-feature-desc">
                                Riwayat diagnosa, tindakan medis, resep obat, dan catatan dokter hewan tercatat aman serta dapat ditelusuri kapan pun.
                            </p>
                        </div>
                        <a href="#layanan" class="kw-feature-link">
                            <span>Buka Riwayat</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                    </div>

                    <div class="kw-feature-card">
                        <div>
                            <div class="kw-feature-icon-box">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                                </svg>
                            </div>
                            <h3 class="kw-feature-title">Edukasi &amp; Tips Medis</h3>
                            <p class="kw-feature-desc">
                                Artikel kesehatan terpercaya yang disusun oleh dokter hewan dan kader untuk menjaga nutrisi dan kebugaran sahabat peliharaan.
                            </p>
                        </div>
                        <a href="#artikel" class="kw-feature-link">
                            <span>Baca Artikel</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                    </div>

                    <div class="kw-feature-card">
                        <div>
                            <div class="kw-feature-icon-box">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                </svg>
                            </div>
                            <h3 class="kw-feature-title">Integrasi Layanan Daerah</h3>
                            <p class="kw-feature-desc">
                                Sinkronisasi data antara pemilik hewan, kader, dan dokter hewan untuk memastikan keberlanjutan pelayanan yang prima.
                            </p>
                        </div>
                        <a href="#fitur" class="kw-feature-link">
                            <span>Pelajari Selengkapnya</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="kw-split-section" id="fitur">
            <div class="kw-container kw-split-grid">
                
                <div class="kw-split-visual-card">
                    <div class="kw-split-perf-header">
                        <h5>Kinerja Pelayanan Puskeswan</h5>
                        <span class="kw-article-category-badge">Bulan Ini</span>
                    </div>

                    <div class="kw-split-stats-row">
                        <div class="kw-split-stat-box">
                            <span>Tindakan Medis</span>
                            <strong>2,450</strong>
                        </div>
                        <div class="kw-split-stat-box">
                            <span>Tepat Waktu</span>
                            <strong style="color: #059669;">94%</strong>
                        </div>
                        <div class="kw-split-stat-box">
                            <span>Kapasitas Poli</span>
                            <strong>85%</strong>
                        </div>
                    </div>

                    <div class="kw-split-doc-bar">
                        <span>Poli Pemeriksaan Umum</span>
                        <span style="color: var(--color-teal); font-weight: 600;">drh. Sinta Permata Aktif</span>
                    </div>
                </div>

                <div class="kw-split-content">
                    <span class="kw-section-eyebrow">STANDAR PELAYANAN</span>
                    <h2 class="kw-split-title">
                        Perawatan Terbaik <span>Tanpa Hambatan</span>
                    </h2>
                    <p class="kw-split-desc">
                        KAWWAN menghadirkan pengalaman pelayanan kesehatan hewan yang cepat, transparan, dan terstruktur demi kenyamanan pemilik dan kesehatan optimal anabul Anda.
                    </p>

                    <div class="kw-split-checklist">
                        <div class="kw-split-check-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                            <span>Pendaftaran hewan instan dalam hitungan menit</span>
                        </div>
                        <div class="kw-split-check-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                            <span>Keamanan data rekam medis terenkripsi</span>
                        </div>
                        <div class="kw-split-check-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                            <span>Pemantauan antrean real-time dari ponsel</span>
                        </div>
                        <div class="kw-split-check-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                            <span>Pendampingan dokter hewan berlisensi</span>
                        </div>
                    </div>

                    <a href="{{ route('register') }}" class="kw-btn kw-btn-primary">
                        <span>Mulai Sekarang</span>
                        <div class="kw-btn-arrow-circle">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </div>
                    </a>
                </div>

            </div>
        </section>

        <section class="kw-articles-section" id="artikel">
            <div class="kw-container">
                <div class="kw-articles-header-row">
                    <div>
                        <span class="kw-section-eyebrow">Edukasi &amp; Informasi</span>
                        <h2 class="kw-section-title">Kenali dan Rawat Sahabatmu</h2>
                        <p class="kw-section-desc">Artikel dan panduan kesehatan hewan terpercaya dari tenaga medis Puskeswan.</p>
                    </div>
                </div>

                @if($artikelTerbaru->isNotEmpty())
                    <div class="kw-articles-grid">
                        @foreach($artikelTerbaru as $artikel)
                            <article class="kw-article-card">
                                <div class="kw-article-media">
                                    @if($artikel->gambar)
                                        <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="kw-article-img" loading="lazy">
                                    @else
                                        <div class="kw-article-fallback">
                                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                                <circle cx="8.5" cy="8.5" r="1.5"/>
                                                <polyline points="21 15 16 10 5 21"/>
                                            </svg>
                                            <span style="font-size: 11px; font-weight: 600;">KAWWAN Edukasi</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="kw-article-body">
                                    <div class="kw-article-meta-row">
                                        <span class="kw-article-category-badge">{{ $artikel->kategori ?? 'Kesehatan Hewan' }}</span>
                                        <time class="kw-article-date">
                                            {{ $artikel->published_at ? $artikel->published_at->format('d M Y') : $artikel->created_at->format('d M Y') }}
                                        </time>
                                    </div>

                                    <h3 class="kw-article-title">{{ $artikel->judul }}</h3>

                                    @if($artikel->ringkasan)
                                        <p class="kw-article-summary">{{ $artikel->ringkasan }}</p>
                                    @endif

                                    <a href="#" class="kw-article-read-link">
                                        <span>Baca selengkapnya</span>
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="5" y1="12" x2="19" y2="12"/>
                                            <polyline points="12 5 19 12 12 19"/>
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="kw-article-empty-state">
                        <div class="kw-article-empty-icon">
                            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <polyline points="14 2 14 8 20 8"/>
                                <line x1="16" y1="13" x2="8" y2="13"/>
                                <line x1="16" y1="17" x2="8" y2="17"/>
                            </svg>
                        </div>
                        <h3 class="kw-article-empty-title">Belum Ada Artikel Dipublikasikan</h3>
                        <p class="kw-article-empty-desc">Artikel edukasi dan kesehatan hewan yang disusun oleh kader atau dokter hewan akan muncul di sini setelah dipublikasikan secara resmi.</p>
                    </div>
                @endif
            </div>
        </section>

        <section class="kw-profile-section" id="profil">
            <div class="kw-container">
                @auth
                    <div class="kw-profile-card">
                        <div class="kw-profile-info-group">
                            <div class="kw-profile-avatar" aria-hidden="true">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div class="kw-profile-details">
                                <div class="kw-profile-name-row">
                                    <span class="kw-profile-name">{{ $user->name }}</span>
                                    <span class="kw-profile-role-badge">Pemilik Hewan</span>
                                </div>
                                <span class="kw-profile-email">{{ $user->email }}</span>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="kw-btn kw-btn-secondary">Keluar dari Akun</button>
                        </form>
                    </div>
                @else
                    <div class="kw-profile-card">
                        <div class="kw-profile-info-group">
                            <div class="kw-profile-avatar" aria-hidden="true">K</div>
                            <div class="kw-profile-details">
                                <span class="kw-profile-name">Akses Layanan Puskeswan KAWWAN</span>
                                <span class="kw-profile-email">Masuk atau daftarkan akun pemilik hewan untuk akses penuh.</span>
                            </div>
                        </div>
                        <div class="kw-hero-cta-group" style="margin-bottom: 0;">
                            <a href="{{ route('login') }}" class="kw-btn kw-btn-secondary">Masuk</a>
                            <a href="{{ route('register') }}" class="kw-btn kw-btn-primary">Daftar Akun Baru</a>
                        </div>
                    </div>
                @endauth
            </div>
        </section>
    </main>

    <footer class="kw-footer">
        <div class="kw-container">
            <div class="kw-footer-grid">
                <div class="kw-footer-brand">
                    <a href="{{ route('landing') }}" class="kw-logo">
                        <div class="kw-logo-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2a10 10 0 1 0 10 10H12V2z"/>
                                <path d="M12 12L2.5 7.5"/>
                            </svg>
                        </div>
                        KAW<span class="kw-logo-accent">WAN</span>
                    </a>
                    <p>
                        Sistem Informasi Pelayanan Kesehatan Hewan Berbasis Web. Mendukung digitalisasi layanan, pencatatan rekam medis, dan keteraturan antrean Puskeswan.
                    </p>
                </div>

                <div class="kw-footer-col">
                    <h4>Navigasi</h4>
                    <div class="kw-footer-links-list">
                        <a href="{{ route('landing') }}" class="kw-footer-link">Beranda</a>
                        <a href="#layanan" class="kw-footer-link">Layanan Kesehatan</a>
                        <a href="#fitur" class="kw-footer-link">Fitur</a>
                        <a href="#artikel" class="kw-footer-link">Artikel Edukasi</a>
                    </div>
                </div>

                <div class="kw-footer-col">
                    <h4>Layanan</h4>
                    <div class="kw-footer-links-list">
                        <a href="#layanan" class="kw-footer-link">Data Hewan</a>
                        <a href="#layanan" class="kw-footer-link">Jadwal Pelayanan</a>
                        <a href="#layanan" class="kw-footer-link">Pemesanan Antrean</a>
                        <a href="#layanan" class="kw-footer-link">Rekam Medis</a>
                    </div>
                </div>

                <div class="kw-footer-col">
                    <h4>Pusat Informasi</h4>
                    <div class="kw-footer-hours">
                        <strong>Jam Layanan Puskeswan:</strong><br>
                        Senin — Jumat: 08.00 — 15.00 WIB<br>
                        Sabtu — Minggu: Tutup (Layanan Gawat Darurat Tersedia)
                    </div>
                </div>
            </div>

            <div class="kw-footer-bottom">
                <span>&copy; {{ date('Y') }} KAWWAN — Kawan Hewan. Hak Cipta Dilindungi.</span>
                <span>Proyek Pemrograman Web Lanjut (PWL)</span>
            </div>
        </div>
    </footer>

</body>
</html>
