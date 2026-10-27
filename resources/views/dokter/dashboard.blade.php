@extends('dokter.layout')

@section('title', 'Dashboard Dokter Hewan')

@push('scripts')
    @vite(['resources/js/dokter-dashboard.js'])
@endpush

@section('content')

    <div class="kw-dokter-page-head">
        <h1 class="kw-dokter-page-title">Halo, <span>{{ auth()->user()->name }}</span></h1>
        <p class="kw-dokter-page-sub">Ringkasan pelayanan pemeriksaan hewan hari ini.</p>
    </div>

    <div class="kw-dokter-stats">
        <div class="kw-dokter-stat">
            <div class="kw-dokter-stat-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <div>
                <p class="kw-dokter-stat-label">Pasien Hari Ini</p>
                <p class="kw-dokter-stat-value">{{ $stat['pasien_hari_ini'] }}</p>
            </div>
        </div>
        <div class="kw-dokter-stat">
            <div class="kw-dokter-stat-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
            </div>
            <div>
                <p class="kw-dokter-stat-label">Menunggu Pemeriksaan</p>
                <p class="kw-dokter-stat-value">{{ $stat['menunggu'] }}</p>
            </div>
        </div>
        <div class="kw-dokter-stat">
            <div class="kw-dokter-stat-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="M22 4L12 14.01l-3-3"/></svg>
            </div>
            <div>
                <p class="kw-dokter-stat-label">Selesai Diperiksa Hari Ini</p>
                <p class="kw-dokter-stat-value">{{ $stat['selesai_hari_ini'] }}</p>
            </div>
        </div>
        <div class="kw-dokter-stat">
            <div class="kw-dokter-stat-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M9 13h6M9 17h6"/></svg>
            </div>
            <div>
                <p class="kw-dokter-stat-label">Total Pemeriksaan</p>
                <p class="kw-dokter-stat-value">{{ $stat['total_pemeriksaan'] }}</p>
            </div>
        </div>
    </div>

    <div class="kw-dokter-charts">
        <section class="kw-dokter-card kw-dokter-card-wide">
            <h2 class="kw-dokter-card-title">Pemeriksaan 7 Hari Terakhir</h2>
            <p class="kw-dokter-card-sub">Jumlah pemeriksaan yang dicatat per hari.</p>
            <div class="kw-dokter-chart-box">
                <canvas id="chart-harian"></canvas>
            </div>
        </section>

        <section class="kw-dokter-card">
            <h2 class="kw-dokter-card-title">Jenis Hewan Diperiksa</h2>
            <p class="kw-dokter-card-sub">Perbandingan berdasarkan jenis hewan.</p>
            @if (count($grafik['jenis']['data']) > 0)
                <div class="kw-dokter-chart-box">
                    <canvas id="chart-jenis"></canvas>
                </div>
            @else
                <p class="kw-dokter-empty">Belum ada data pemeriksaan.</p>
            @endif
        </section>
    </div>

    <section class="kw-dokter-card">
        <h2 class="kw-dokter-card-title">Antrean Hari Ini</h2>
        <p class="kw-dokter-card-sub">Daftar pemesanan pada jadwal pelayanan hari ini.</p>

        @if ($antreanHariIni->isEmpty())
            <p class="kw-dokter-empty">Belum ada antrean untuk hari ini.</p>
        @else
            <div class="kw-dokter-table-wrap">
                <table class="kw-dokter-table">
                    <thead>
                        <tr>
                            <th>Jam</th>
                            <th>Pemilik</th>
                            <th>Hewan</th>
                            <th>Jenis</th>
                            <th>Ras</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($antreanHariIni as $item)
                            <tr>
                                <td>{{ substr($item->jadwalPelayanan->waktu_mulai, 0, 5) }} - {{ substr($item->jadwalPelayanan->waktu_selesai, 0, 5) }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->hewan->nama }}</td>
                                <td>{{ $item->hewan->jenis }}</td>
                                <td>{{ $item->hewan->ras ?? '-' }}</td>
                                <td>
                                    @if ($item->pemeriksaan)
                                        <span class="kw-dokter-badge is-done">Selesai</span>
                                    @else
                                        <span class="kw-dokter-badge is-wait">{{ ucfirst($item->status) }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>

    <script id="dokter-chart-data" type="application/json">@json($grafik)</script>

@endsection