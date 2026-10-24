@extends('admin.layouts.app')

@section('title', 'Edit Pelanggan')

@section('content')
    <section class="page-head">
        <div>
            <span class="eyebrow">DATA PELANGGAN</span>
            <h1>Edit Pelanggan</h1>
            <p>Perbarui informasi pelanggan yang dipilih.</p>
        </div>

        <div class="page-head-actions">
            <a href="{{ route('admin.pelanggan.index') }}" class="btn btn-outline">
                ← Kembali
            </a>
        </div>
    </section>

    @include('admin.pelanggan._form')
@endsection
