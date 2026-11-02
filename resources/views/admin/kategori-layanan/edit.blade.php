@extends('admin.layouts.app')

@section('title', 'Edit Kategori')

@section('content')

    <section class="page-head">
        <div>
            <span class="eyebrow">DATA MASTER</span>
            <h1>Edit Kategori</h1>
            <p>Perbarui informasi kategori layanan.</p>
        </div>

        <div class="page-head-actions">
            <a href="{{ route('admin.kategori-layanan.index') }}" class="btn btn-outline">
                ← Kembali
            </a>
        </div>
    </section>

    @include('admin.kategori-layanan._form')

@endsection
