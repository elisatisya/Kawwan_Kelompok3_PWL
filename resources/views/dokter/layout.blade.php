<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — KAWWAN Dokter</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/styles.css', 'resources/css/dokter.css'])
    @stack('scripts')
</head>
<body class="kw-dokter-body">

    <div class="kw-dokter-shell">

        <aside class="kw-dokter-sidebar">
            <a href="{{ route('dokter.dashboard') }}" class="kw-logo">
                <div class="kw-logo-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2a10 10 0 1 0 10 10H12V2z"/>
                        <path d="M12 12L2.5 7.5"/>
                    </svg>
                </div>
                KAW<span class="kw-logo-accent">WAN</span>
            </a>

            <p class="kw-dokter-sidebar-label">Menu Dokter</p>

            <nav class="kw-dokter-nav" aria-label="Navigasi Dokter">
                <a href="{{ route('dokter.dashboard') }}" class="kw-dokter-nav-link {{ request()->routeIs('dokter.dashboard') ? 'is-active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/><rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/></svg>
                    Dashboard
                </a>
                <a href="#" class="kw-dokter-nav-link">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                    Jadwal Pelayanan
                </a>
                <a href="#" class="kw-dokter-nav-link">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M9 13h6M9 17h6"/></svg>
                    Pemeriksaan
                </a>
                <a href="#" class="kw-dokter-nav-link">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                    Riwayat Pemeriksaan
                </a>
            </nav>

            <form method="POST" action="{{ route('logout') }}" class="kw-dokter-logout">
                @csrf
                <button type="submit" class="kw-btn kw-btn-secondary kw-btn-sm">Keluar</button>
            </form>
        </aside>

        <div class="kw-dokter-main">
            <header class="kw-dokter-topbar">
                <div>
                    <p class="kw-dokter-topbar-title">@yield('title', 'Dashboard')</p>
                </div>
                <div class="kw-dokter-user">
                    <div class="kw-dokter-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                    <div class="kw-dokter-user-text">
                        <span class="kw-dokter-user-name">{{ auth()->user()->name }}</span>
                        <span class="kw-dokter-user-role">Dokter Hewan</span>
                    </div>
                </div>
            </header>

            <main class="kw-dokter-content">
                @yield('content')
            </main>
        </div>

    </div>

</body>
</html>