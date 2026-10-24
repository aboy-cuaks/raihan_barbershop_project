@extends('admin.layouts.app')

@section('title', 'Tambah Pelanggan')

@section('content')
    <section class="page-head">
        <div>
            <span class="eyebrow">DATA PELANGGAN</span>
            <h1>Tambah Pelanggan</h1>
            <p>Isi informasi pelanggan baru dengan lengkap.</p>
        </div>

        <div class="page-head-actions">
            <a href="{{ route('admin.pelanggan.index') }}" class="btn btn-outline">
                ← Kembali
            </a>
        </div>
    </section>

    @include('admin.pelanggan._form', [
        'dataPelanggan' => null
    ])
@endsection
