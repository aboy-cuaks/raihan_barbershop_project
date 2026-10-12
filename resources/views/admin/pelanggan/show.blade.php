@extends('admin.layouts.app')
@section('title', 'Detail Pelanggan')
@section('content')
<section class="page-head"><div><span class="eyebrow">DATA PELANGGAN</span><h1>Detail Pelanggan</h1><p>Informasi pelanggan terdaftar.</p></div><div class="page-head-actions"><a href="{{ route('admin.pelanggan.index') }}" class="btn btn-outline">← Kembali</a><a href="{{ route('admin.pelanggan.edit', $dataPelanggan->pelanggan_id) }}" class="btn btn-primary">Edit Data</a></div></section>
<div class="card detail-card"><dl class="detail-list"><div><dt>Nama Lengkap</dt><dd>{{ $dataPelanggan->first_name }} {{ $dataPelanggan->last_name }}</dd></div><div><dt>Tanggal Lahir</dt><dd>{{ $dataPelanggan->birthday?->format('d-m-Y') ?? '-' }}</dd></div><div><dt>Jenis Kelamin</dt><dd>{{ $dataPelanggan->gender === 'Male' ? 'Laki-laki' : 'Perempuan' }}</dd></div><div><dt>Email</dt><dd>{{ $dataPelanggan->email }}</dd></div><div><dt>Nomor Telepon</dt><dd>{{ $dataPelanggan->phone }}</dd></div><div><dt>Terdaftar</dt><dd>{{ $dataPelanggan->created_at?->format('d-m-Y H:i') ?? '-' }}</dd></div></dl></div>
@endsection
