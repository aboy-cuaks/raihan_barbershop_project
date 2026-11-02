@extends('admin.layouts.app')

@section('title', 'Kategori Layanan')

@section('content')
    <section class="page-head">
        <div>
            <span class="eyebrow">DATA MASTER</span>
            <h1>Kategori Layanan</h1>
            <p>Kelola kategori layanan FM Barbershop.</p>
        </div>

        <div class="page-head-actions">
            <a href="{{ route('admin.kategori-layanan.create') }}" class="btn btn-primary">
                + Tambah Kategori
            </a>
        </div>
    </section>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    <div class="card table-card">
        <div class="table-toolbar">
            <div>
                <h2>Daftar Kategori</h2>
                <p>{{ $dataKategori->total() }} data kategori</p>
            </div>

            <form action="{{ route('admin.kategori-layanan.index') }}" method="GET" class="table-search">

                <input type="search" name="search" value="{{ $search }}" placeholder="Cari kategori...">

                <button type="submit" class="btn btn-outline">
                    Cari
                </button>

                @if ($search !== '')
                    <a href="{{ route('admin.kategori-layanan.index') }}" class="btn btn-outline">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        @if ($dataKategori->isEmpty())

            <div class="empty-state">
                Belum ada kategori layanan.
            </div>

        @else

            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Jumlah Layanan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($dataKategori as $item)
                            <tr>
                                <td>
                                    <strong>{{ $item->nama_kategori }}</strong>
                                </td>

                                <td>
                                    {{ $item->deskripsi ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->layanans_count }} layanan
                                </td>

                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.kategori-layanan.edit', $item->kategori_id) }}"
                                            class="btn btn-small btn-outline">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.kategori-layanan.destroy', $item->kategori_id) }}"
                                            method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-small btn-danger">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="table-pagination">
                {{ $dataKategori->links() }}
            </div>

        @endif
    </div>
@endsection
