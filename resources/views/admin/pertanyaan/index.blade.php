@extends('admin.layouts.app')
@section('title', 'Pesan Masuk')
@section('content')
<section class="page-head"><div><span class="eyebrow">KOMUNIKASI PELANGGAN</span><h1>Pesan Masuk</h1><p>Pesan yang dikirimkan melalui formulir kontak website Guest.</p></div><div class="page-head-actions"><a href="{{ route('guest.contact') }}" target="_blank" class="btn btn-outline">Buka Form Kontak</a></div></section>
<div class="card table-card"><div class="table-toolbar"><div><h2>Daftar Pesan</h2><p>{{ $dataPertanyaan->total() }} pesan diterima</p></div></div>
@if ($dataPertanyaan->isEmpty())<div class="empty-state">Belum ada pesan yang diterima.</div>@else
<div class="table-wrap"><table class="data-table"><thead><tr><th>Pengirim</th><th>Email</th><th>Subjek</th><th>Pesan</th><th>Status</th><th>Tanggal</th></tr></thead><tbody>
@foreach ($dataPertanyaan as $item)<tr class="searchable" data-search="{{ strtolower($item->nama.' '.$item->email.' '.$item->subjek.' '.$item->pertanyaan) }}"><td><strong>{{ $item->nama }}</strong></td><td>{{ $item->email }}</td><td>{{ $item->subjek ?: '-' }}</td><td class="message-cell">{{ $item->pertanyaan }}</td><td><span class="status-pill {{ $item->status === 'baru' ? 'status-new' : '' }}">{{ ucfirst($item->status) }}</span></td><td>{{ $item->created_at?->format('d-m-Y H:i') }}</td></tr>@endforeach
</tbody></table></div><div class="table-pagination">{{ $dataPertanyaan->links() }}</div>
@endif
</div>
@endsection
