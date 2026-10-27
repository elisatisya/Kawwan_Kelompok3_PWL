<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Pemeriksaan;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $hariIni = now()->toDateString();

        $antreanHariIni = Pemesanan::with(['hewan', 'user', 'jadwalPelayanan', 'pemeriksaan'])
            ->whereHas('jadwalPelayanan', fn ($q) => $q->whereDate('tanggal', $hariIni))
            ->get()
            ->sortBy(fn ($p) => $p->jadwalPelayanan->waktu_mulai)
            ->values();

        $stat = [
            'pasien_hari_ini' => $antreanHariIni->count(),
            'menunggu' => $antreanHariIni->filter(fn ($p) => $p->pemeriksaan === null)->count(),
            'selesai_hari_ini' => Pemeriksaan::whereDate('created_at', $hariIni)->count(),
            'total_pemeriksaan' => Pemeriksaan::count(),
        ];

        $labelHari = [];
        $dataHari = [];
        for ($i = 6; $i >= 0; $i--) {
            $tanggal = now()->subDays($i);
            $labelHari[] = $tanggal->format('d M');
            $dataHari[] = Pemeriksaan::whereDate('created_at', $tanggal->toDateString())->count();
        }

        $jenisHewan = DB::table('pemeriksaan')
            ->join('pemesanan', 'pemeriksaan.pemesanan_id', '=', 'pemesanan.id')
            ->join('hewan', 'pemesanan.hewan_id', '=', 'hewan.id')
            ->select('hewan.jenis', DB::raw('count(*) as total'))
            ->groupBy('hewan.jenis')
            ->orderByDesc('total')
            ->pluck('total', 'jenis');

        $grafik = [
            'harian' => ['labels' => $labelHari, 'data' => $dataHari],
            'jenis' => [
                'labels' => $jenisHewan->keys()->values(),
                'data' => $jenisHewan->values(),
            ],
        ];

        return view('dokter.dashboard', compact('stat', 'antreanHariIni', 'grafik'));
    }
}