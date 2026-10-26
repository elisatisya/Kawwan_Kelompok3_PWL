<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up — KAWWAN</title>
    
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
            <h2 class="kw-auth-welcome-sub">REGISTRASI PEMILIK HEWAN</h2>
            <p class="kw-auth-welcome-desc">
                Daftarkan akun pemilik hewan untuk mengelola profil sahabat kesayangan, mengambil nomor antrean Puskeswan secara daring, dan menyimpan rekam medis terpadu.
            </p>
        </div>

        <div class="kw-auth-white-box">
            <h3 class="kw-auth-box-title">Sign up</h3>
            <p class="kw-auth-box-subtitle">Lengkapi data diri Anda untuk pendaftaran akun baru.</p>

            @if ($errors->any())
                <div class="kw-auth-error-box">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="kw-auth-box-form">
                @csrf

                <div class="kw-auth-box-input-wrap">
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name') }}" 
                           required 
                           autofocus 
                           class="kw-auth-box-input" 
                           placeholder="Nama Lengkap">
                </div>

                <div class="kw-auth-box-input-wrap">
                    <input type="text" 
                           id="nik" 
                           name="nik" 
                           value="{{ old('nik') }}" 
                           required 
                           maxlength="20"
                           class="kw-auth-box-input" 
                           placeholder="NIK (16 Digit Angka)">
                </div>

                <div class="kw-auth-box-input-wrap">
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           class="kw-auth-box-input" 
                           placeholder="Alamat Email">
                </div>

                <div class="kw-auth-box-input-wrap">
                    <input type="password" 
                           id="password" 
                           name="password" 
                           required 
                           class="kw-auth-box-input kw-auth-box-input-has-btn" 
                           placeholder="Password (Minimal 8 karakter)">
                    <button type="button" class="kw-auth-show-btn" data-target="password" aria-label="Tampilkan atau sembunyikan password">
                        SHOW
                    </button>
                </div>

                <div class="kw-auth-box-input-wrap">
                    <input type="password" 
                           id="password_confirmation" 
                           name="password_confirmation" 
                           required 
                           class="kw-auth-box-input kw-auth-box-input-has-btn" 
                           placeholder="Ulangi Password">
                    <button type="button" class="kw-auth-show-btn" data-target="password_confirmation" aria-label="Tampilkan atau sembunyikan konfirmasi password">
                        SHOW
                    </button>
                </div>

                <button type="submit" class="kw-auth-box-btn">
                    Sign up
                </button>
            </form>

            <p class="kw-auth-box-footer">
                Already have an account? <a href="{{ route('login') }}">Sign in</a>
            </p>
        </div>

    </div>

</body>
</html>
