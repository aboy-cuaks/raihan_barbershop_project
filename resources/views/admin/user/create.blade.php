@extends('admin.layouts.app')

@section('title', 'Tambah User')

@section('content')
    <section class="page-head">
        <div>
            <span class="eyebrow">MANAJEMEN USER</span>
            <h1>Tambah User</h1>
            <p>Tambahkan pengguna baru ke sistem.</p>
        </div>

        <div class="page-head-actions">
            <a href="{{ route('admin.user.index') }}" class="btn btn-outline">Kembali</a>
        </div>
    </section>

    @include('admin.user._form', ['user' => null])
@endsection
