<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Layanan;
use App\Models\Pelanggan;
use App\Models\Pertanyaan;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalPelanggan = Pelanggan::count();
        $totalLayanan = Layanan::count();
        $totalBarber = Barber::count();
        $totalPertanyaan = Pertanyaan::count();
        $pertanyaanBaru = Pertanyaan::where('status', 'baru')->count();
        $pertanyaanTerbaru = Pertanyaan::latest()->take(5)->get();
        $pelangganTerbaru = Pelanggan::latest()->take(5)->get();
        $layananTerbaru = Layanan::orderBy('nama_layanan')->take(5)->get();
        $barberTerbaru = Barber::orderBy('nama')->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPelanggan',
            'totalLayanan',
            'totalBarber',
            'totalPertanyaan',
            'pertanyaanBaru',
            'pertanyaanTerbaru',
            'pelangganTerbaru',
            'layananTerbaru',
            'barberTerbaru'
        ));
    }
}
