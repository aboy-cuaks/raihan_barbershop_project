@extends('admin.layouts.app')
@section('title', 'Data Pelanggan')
@section('content')
    <section class="page-head">
        <div><span class="eyebrow">PENGELOLAAN DATA</span>
            <h1>Data Pelanggan</h1>
            <p>Kelola informasi pelanggan FM Barbershop.</p>
        </div>
        <div class="page-head-actions"><a href="{{ route('admin.pelanggan.create') }}" class="btn btn-primary">+ Tambah
                Pelanggan</a></div>
    </section>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card table-card">
        <div class="table-toolbar">
            <div>
                <h2>Daftar Pelanggan</h2>
                <p>{{ $dataPelanggan->total() }} data pelanggan</p>
            </div>
            <form action="{{ route('admin.pelanggan.index') }}" method="GET" class="table-search"><input type="search"
                    name="search" value="{{ $search }}" placeholder="Cari nama, email, telepon..."><button
                    type="submit" class="btn btn-outline">Cari</button>
                @if ($search !== '')
                    <a href="{{ route('admin.pelanggan.index') }}" class="btn btn-outline">Reset</a>
                @endif
            </form>
        </div>
        @if ($dataPelanggan->isEmpty())
            <div class="empty-state">
                {{ $search !== '' ? 'Data pelanggan tidak ditemukan.' : 'Belum ada data pelanggan. Klik Tambah Pelanggan untuk mengisi data.' }}
            </div>
        @else
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPelanggan as $item)
                            <tr class="searchable"
                                data-search="{{ strtolower($item->first_name . ' ' . $item->last_name . ' ' . $item->email . ' ' . $item->phone) }}">
                                <td><strong>{{ $item->first_name }} {{ $item->last_name }}</strong></td>
                                <td>{{ $item->birthday?->format('d-m-Y') ?? '-' }}</td>
                                <td>{{ $item->gender === 'Male' ? 'Laki-laki' : ($item->gender === 'Female' ? 'Perempuan' : $item->gender) }}
                                </td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>
                                    <div class="table-actions"><a class="btn btn-small btn-outline"
                                            href="{{ route('admin.pelanggan.show', $item->pelanggan_id) }}">Detail</a><a
                                            class="btn btn-small btn-outline"
                                            href="{{ route('admin.pelanggan.edit', $item->pelanggan_id) }}">Edit</a>
                                        <form action="{{ route('admin.pelanggan.destroy', $item->pelanggan_id) }}"
                                            method="POST" onsubmit="return confirm('Hapus data pelanggan ini?')">@csrf
                                            @method('DELETE')<button type="submit"
                                                class="btn btn-small btn-danger">Hapus</button></form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-pagination">{{ $dataPelanggan->links() }}</div>
        @endif
    </div>
@endsection
