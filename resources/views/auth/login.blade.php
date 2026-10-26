<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in — KAWWAN</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/styles.css', 'resources/js/script.js'])
</head>
<body class="kw-auth-page">

    <div class="kw-auth-landscape-card">
        
        <div class="kw-auth-welcome-col">
            <span class="kw-auth-welcome-badge">KAWWAN &bull; KAWAN HEWAN</span>
            <h1 class="kw-auth-welcome-title">WELCOME</h1>
            <h2 class="kw-auth-welcome-sub">PORTAL LAYANAN PUSKESWAN</h2>
            <p class="kw-auth-welcome-desc">
                Sistem informasi pelayanan kesehatan hewan terpadu untuk mengelola data sahabat kesayangan, reservasi antrean dokter, dan akses rekam medis digital secara praktis.
            </p>
        </div>

        <div class="kw-auth-white-box">
            <h3 class="kw-auth-box-title">Sign in</h3>
            <p class="kw-auth-box-subtitle">Silakan masukkan Email atau NIK dan password akun Anda.</p>

            @if ($errors->any())
                <div class="kw-auth-error-box">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="kw-auth-box-form">
                @csrf

                <div class="kw-auth-box-input-wrap">
                    <input type="text" 
                           id="login" 
                           name="login" 
                           value="{{ old('login') }}" 
                           required 
                           autofocus 
                           class="kw-auth-box-input" 
                           placeholder="Email atau NIK">
                </div>

                <div class="kw-auth-box-input-wrap">
                    <input type="password" 
                           id="password" 
                           name="password" 
                           required 
                           class="kw-auth-box-input kw-auth-box-input-has-btn" 
                           placeholder="Password">
                    <button type="button" class="kw-auth-show-btn" data-target="password" aria-label="Tampilkan atau sembunyikan password">
                        SHOW
                    </button>
                </div>

                <div class="kw-auth-box-meta-row">
                    <label class="kw-auth-box-checkbox">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>Remember me</span>
                    </label>

                    <a href="{{ route('landing') }}" class="kw-auth-box-forgot">
                        Ke Beranda
                    </a>
                </div>

                <button type="submit" class="kw-auth-box-btn">
                    Sign in
                </button>
            </form>

            <p class="kw-auth-box-footer">
                Don't have an account? <a href="{{ route('register') }}">Sign up</a>
            </p>
        </div>

    </div>

</body>
</html>
