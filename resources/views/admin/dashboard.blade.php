@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
<section class="page-head"><div><span class="eyebrow">FM BARBERSHOP ADMIN</span><h1>Dashboard</h1><p>Ringkasan tiga data master dan pesan dari website Guest.</p></div><div class="page-head-actions"><a class="btn btn-primary" href="{{ route('admin.pelanggan.create') }}">+ Tambah Pelanggan</a></div></section>
@if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<section class="stats-grid">
    <article class="stat-card searchable" data-search="total pelanggan"><div class="stat-head"><span>Total Pelanggan</span><span class="stat-icon">♙</span></div><div class="stat-value">{{ number_format($totalPelanggan) }}</div><div class="stat-meta">Data pelanggan terdaftar</div></article>
    <article class="stat-card searchable" data-search="total layanan"><div class="stat-head"><span>Total Layanan</span><span class="stat-icon">✂</span></div><div class="stat-value">{{ number_format($totalLayanan) }}</div><div class="stat-meta">Jenis layanan terdaftar</div></article>
    <article class="stat-card searchable" data-search="total barber"><div class="stat-head"><span>Total Barber</span><span class="stat-icon">♟</span></div><div class="stat-value">{{ number_format($totalBarber) }}</div><div class="stat-meta">Data barber terdaftar</div></article>
    <article class="stat-card searchable" data-search="total pesan pertanyaan"><div class="stat-head"><span>Pesan Masuk</span><span class="stat-icon">✉</span></div><div class="stat-value">{{ number_format($totalPertanyaan) }}</div><div class="stat-meta">{{ number_format($pertanyaanBaru) }} pesan berstatus baru</div></article>
</section>
<div class="content-grid admin-dashboard-grid">
    <article class="card"><div class="card-head"><div><h2>Pelanggan Terbaru</h2><p>Lima data pelanggan yang terakhir ditambahkan.</p></div><a href="{{ route('admin.pelanggan.index') }}" class="text-link">Lihat semua</a></div>
        @if ($pelangganTerbaru->isEmpty())<div class="empty-state">Belum ada data pelanggan. Tambahkan data pertama melalui menu Pelanggan.</div>@else
        <div class="table-wrap"><table class="data-table"><thead><tr><th>Nama</th><th>Email</th><th>Telepon</th><th>Ditambahkan</th></tr></thead><tbody>@foreach ($pelangganTerbaru as $pelanggan)<tr class="searchable" data-search="{{ strtolower($pelanggan->first_name.' '.$pelanggan->last_name.' '.$pelanggan->email.' '.$pelanggan->phone) }}"><td>{{ $pelanggan->first_name }} {{ $pelanggan->last_name }}</td><td>{{ $pelanggan->email }}</td><td>{{ $pelanggan->phone }}</td><td>{{ optional($pelanggan->created_at)->format('d M Y') }}</td></tr>@endforeach</tbody></table></div>@endif
    </article>
    <article class="card"><div class="card-head"><div><h2>Pesan Terbaru</h2><p>Pesan yang dikirim melalui halaman kontak.</p></div><a href="{{ route('admin.pertanyaan.index') }}" class="text-link">Lihat semua</a></div>
        @if ($pertanyaanTerbaru->isEmpty())<div class="empty-state">Belum ada pesan dari pelanggan.</div>@else<div class="message-list">@foreach ($pertanyaanTerbaru as $pesan)<div class="message-row searchable" data-search="{{ strtolower($pesan->nama.' '.$pesan->email.' '.$pesan->subjek.' '.$pesan->pertanyaan) }}"><div class="message-avatar">{{ strtoupper(substr($pesan->nama, 0, 1)) }}</div><div class="message-content"><strong>{{ $pesan->nama }}</strong><span>{{ $pesan->email }}</span><p>{{ \Illuminate\Support\Str::limit($pesan->pertanyaan, 75) }}</p></div><span class="status-pill {{ $pesan->status === 'baru' ? 'status-new' : '' }}">{{ ucfirst($pesan->status) }}</span></div>@endforeach</div>@endif
    </article>
</div>
<div class="content-grid admin-dashboard-grid">
    <article class="card"><div class="card-head"><div><h2>Layanan Tersedia</h2><p>Ringkasan katalog layanan barbershop.</p></div><a href="{{ route('admin.layanan.index') }}" class="text-link">Kelola layanan</a></div>
        @if ($layananTerbaru->isEmpty())<div class="empty-state">Belum ada layanan. Tambahkan data layanan terlebih dahulu.</div>@else<div class="message-list">@foreach ($layananTerbaru as $layanan)<div class="message-row"><div class="message-avatar">✂</div><div class="message-content"><strong>{{ $layanan->nama_layanan }}</strong><span>{{ $layanan->durasi_menit }} menit · Rp {{ number_format((float) $layanan->harga, 0, ',', '.') }}</span></div><span class="status-pill {{ $layanan->status === 'aktif' ? 'status-active' : '' }}">{{ ucfirst($layanan->status) }}</span></div>@endforeach</div>@endif
    </article>
    <article class="card"><div class="card-head"><div><h2>Tim Barber</h2><p>Daftar barber yang tersimpan pada data master.</p></div><a href="{{ route('admin.barber.index') }}" class="text-link">Kelola barber</a></div>
        @if ($barberTerbaru->isEmpty())<div class="empty-state">Belum ada data barber. Tambahkan data barber terlebih dahulu.</div>@else<div class="message-list">@foreach ($barberTerbaru as $barber)<div class="message-row"><div class="message-avatar">{{ strtoupper(substr($barber->nama, 0, 1)) }}</div><div class="message-content"><strong>{{ $barber->nama }}</strong><span>{{ $barber->spesialisasi }} · {{ $barber->email }}</span></div><span class="status-pill {{ $barber->status === 'aktif' ? 'status-active' : '' }}">{{ ucfirst($barber->status) }}</span></div>@endforeach</div>@endif
    </article>
</div>
@endsection
