@extends('admin.layouts.app')
@section('title', 'Detail Barber')
@section('content')
<section class="page-head"><div><span class="eyebrow">DATA MASTER</span><h1>Detail Barber</h1><p>Informasi lengkap barber FM Barbershop.</p></div><div class="page-head-actions"><a href="{{ route('admin.barber.edit', $dataBarber->barber_id) }}" class="btn btn-primary">Edit Barber</a><a href="{{ route('admin.barber.index') }}" class="btn btn-outline">← Kembali</a></div></section>
<div class="card detail-card"><dl class="detail-list"><div><dt>Nama</dt><dd>{{ $dataBarber->nama }}</dd></div><div><dt>Status</dt><dd>{{ ucfirst($dataBarber->status) }}</dd></div><div><dt>Email</dt><dd>{{ $dataBarber->email }}</dd></div><div><dt>Nomor Telepon</dt><dd>{{ $dataBarber->no_telepon }}</dd></div><div style="grid-column:1/-1"><dt>Spesialisasi</dt><dd>{{ $dataBarber->spesialisasi }}</dd></div></dl></div>
@endsection
