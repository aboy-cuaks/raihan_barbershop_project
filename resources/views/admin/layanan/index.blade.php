@extends('admin.layouts.app')
@section('title', 'Data Layanan')
@section('content')
<section class="page-head"><div><span class="eyebrow">DATA MASTER</span><h1>Data Layanan</h1><p>Kelola jenis layanan yang tersedia di FM Barbershop.</p></div><div class="page-head-actions"><a href="{{ route('admin.layanan.create') }}" class="btn btn-primary">+ Tambah Layanan</a></div></section>
@if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="card table-card">
    <div class="table-toolbar"><div><h2>Daftar Layanan</h2><p>{{ $dataLayanan->total() }} data layanan</p></div><form action="{{ route('admin.layanan.index') }}" method="GET" class="table-search"><input type="search" name="search" value="{{ $search }}" placeholder="Cari nama atau deskripsi layanan..."><button type="submit" class="btn btn-outline">Cari</button>@if ($search !== '')<a href="{{ route('admin.layanan.index') }}" class="btn btn-outline">Reset</a>@endif</form></div>
    @if ($dataLayanan->isEmpty())<div class="empty-state">{{ $search !== '' ? 'Layanan tidak ditemukan.' : 'Belum ada layanan. Klik Tambah Layanan untuk mengisi data.' }}</div>
    @else<div class="table-wrap"><table class="data-table"><thead><tr><th>Nama Layanan</th><th>Durasi</th><th>Harga</th><th>Status</th><th>Aksi</th></tr></thead><tbody>
        @foreach ($dataLayanan as $item)
        <tr class="searchable" data-search="{{ strtolower($item->nama_layanan.' '.$item->deskripsi.' '.$item->status) }}"><td><strong>{{ $item->nama_layanan }}</strong><div class="muted-cell">{{ \Illuminate\Support\Str::limit($item->deskripsi ?? 'Tidak ada deskripsi.', 70) }}</div></td><td>{{ $item->durasi_menit }} menit</td><td>Rp {{ number_format((float) $item->harga, 0, ',', '.') }}</td><td><span class="status-pill {{ $item->status === 'aktif' ? 'status-active' : '' }}">{{ ucfirst($item->status) }}</span></td><td><div class="table-actions"><a class="btn btn-small btn-outline" href="{{ route('admin.layanan.show', $item->layanan_id) }}">Detail</a><a class="btn btn-small btn-outline" href="{{ route('admin.layanan.edit', $item->layanan_id) }}">Edit</a><form action="{{ route('admin.layanan.destroy', $item->layanan_id) }}" method="POST" onsubmit="return confirm('Hapus layanan ini?')">@csrf @method('DELETE')<button type="submit" class="btn btn-small btn-danger">Hapus</button></form></div></td></tr>
        @endforeach
    </tbody></table></div><div class="table-pagination">{{ $dataLayanan->links() }}</div>@endif
</div>
@endsection
