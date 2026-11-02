@extends('admin.layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

    <section class="page-head">
        <div>
            <span class="eyebrow">DATA MASTER</span>
            <h1>Tambah Kategori</h1>
            <p>Masukkan informasi kategori layanan baru.</p>
        </div>

        <div class="page-head-actions">
            <a href="{{ route('admin.kategori-layanan.index') }}" class="btn btn-outline">
                ← Kembali
            </a>
        </div>
    </section>

    @include('admin.kategori-layanan._form', [
        'dataKategori' => null
    ])

@endsection
