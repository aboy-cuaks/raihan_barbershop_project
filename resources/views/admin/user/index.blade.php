@extends('admin.layouts.app')

@section('title', 'Data User')

@section('content')
    <section class="page-head">
        <div>
            <span class="eyebrow">MANAJEMEN USER</span>
            <h1>Data User</h1>
            <p>Kelola pengguna sistem FM Barbershop.</p>
        </div>

        <div class="page-head-actions">
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">+ Tambah User</a>
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
                <h2>Daftar User</h2>
                <p>{{ $users->total() }} pengguna terdaftar</p>
            </div>
        </div>

        @if ($users->isEmpty())
            <div class="empty-state">
                Belum ada User yang terdaftar.
            </div>
        @else
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-small btn-outline">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus User ini?')">
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
                {{ $users->links() }}
            </div>
        @endif
    </div>
@endsection
