@extends('admin.layouts.app')
@section('title', 'Detail Layanan')
@section('content')
<section class="page-head"><div><span class="eyebrow">DATA MASTER</span><h1>Detail Layanan</h1><p>Informasi lengkap layanan FM Barbershop.</p></div><div class="page-head-actions"><a href="{{ route('admin.layanan.edit', $dataLayanan->layanan_id) }}" class="btn btn-primary">Edit Layanan</a><a href="{{ route('admin.layanan.index') }}" class="btn btn-outline">← Kembali</a></div></section>
<div class="card detail-card"><dl class="detail-list"><div><dt>Nama Layanan</dt><dd>{{ $dataLayanan->nama_layanan }}</dd></div><div><dt>Status</dt><dd>{{ ucfirst($dataLayanan->status) }}</dd></div><div><dt>Durasi</dt><dd>{{ $dataLayanan->durasi_menit }} menit</dd></div><div><dt>Harga</dt><dd>Rp {{ number_format((float) $dataLayanan->harga, 0, ',', '.') }}</dd></div><div style="grid-column:1/-1"><dt>Deskripsi</dt><dd>{{ $dataLayanan->deskripsi ?: 'Belum ada deskripsi.' }}</dd></div></dl></div>
@endsection
