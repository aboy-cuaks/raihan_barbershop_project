<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('guest.index');
    }

    public function about(): View
    {
        return view('guest.about');
    }

    public function services(): View
    {
        $dataLayanan = DB::table('layanan as l')
            ->leftJoin(
                'kategori_layanan as k',
                'l.kategori_id',
                '=',
                'k.kategori_id'
            )
            ->select(
                'l.*',
                'k.nama_kategori'
            )
            ->where('l.status', 'aktif')
            ->orderBy('k.nama_kategori')
            ->orderBy('l.nama_layanan')
            ->get();

        return view('guest.services', compact('dataLayanan'));
    }

    public function portfolio(): View
    {
        return view('guest.portfolio');
    }

    public function blog(): View
    {
        return view('guest.blog');
    }

    public function blogDetails(): View
    {
        return view('guest.blog_details');
    }

    public function contact(): View
    {
        return view('guest.contact');
    }

    public function elements(): View
    {
        return view('guest.elements');
    }
}
