@extends('admin.layouts.app')
@section('title', 'Data Barber')
@section('content')
<section class="page-head"><div><span class="eyebrow">DATA MASTER</span><h1>Data Barber</h1><p>Kelola informasi barber yang bekerja di FM Barbershop.</p></div><div class="page-head-actions"><a href="{{ route('admin.barber.create') }}" class="btn btn-primary">+ Tambah Barber</a></div></section>
@if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="card table-card"><div class="table-toolbar"><div><h2>Daftar Barber</h2><p>{{ $dataBarber->total() }} data barber</p></div><form action="{{ route('admin.barber.index') }}" method="GET" class="table-search"><input type="search" name="search" value="{{ $search }}" placeholder="Cari nama, email, atau spesialisasi..."><button type="submit" class="btn btn-outline">Cari</button>@if ($search !== '')<a href="{{ route('admin.barber.index') }}" class="btn btn-outline">Reset</a>@endif</form></div>
@if ($dataBarber->isEmpty())<div class="empty-state">{{ $search !== '' ? 'Data barber tidak ditemukan.' : 'Belum ada data barber. Klik Tambah Barber untuk mengisi data.' }}</div>
@else<div class="table-wrap"><table class="data-table"><thead><tr><th>Nama</th><th>Email</th><th>Telepon</th><th>Spesialisasi</th><th>Status</th><th>Aksi</th></tr></thead><tbody>
@foreach ($dataBarber as $item)<tr class="searchable" data-search="{{ strtolower($item->nama.' '.$item->email.' '.$item->no_telepon.' '.$item->spesialisasi) }}"><td><strong>{{ $item->nama }}</strong></td><td>{{ $item->email }}</td><td>{{ $item->no_telepon }}</td><td>{{ $item->spesialisasi }}</td><td><span class="status-pill {{ $item->status === 'aktif' ? 'status-active' : '' }}">{{ ucfirst($item->status) }}</span></td><td><div class="table-actions"><a class="btn btn-small btn-outline" href="{{ route('admin.barber.show', $item->barber_id) }}">Detail</a><a class="btn btn-small btn-outline" href="{{ route('admin.barber.edit', $item->barber_id) }}">Edit</a><form action="{{ route('admin.barber.destroy', $item->barber_id) }}" method="POST" onsubmit="return confirm('Hapus data barber ini?')">@csrf @method('DELETE')<button type="submit" class="btn btn-small btn-danger">Hapus</button></form></div></td></tr>@endforeach
</tbody></table></div><div class="table-pagination">{{ $dataBarber->links() }}</div>@endif
</div>
@endsection
