@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')
    <section class="page-head">
        <div>
            <span class="eyebrow">MANAJEMEN USER</span>
            <h1>Edit User</h1>
            <p>Perbarui informasi pengguna.</p>
        </div>

        <div class="page-head-actions">
            <a href="{{ route('admin.user.index') }}" class="btn btn-outline">Kembali</a>
        </div>
    </section>

    @include('admin.user._form')
@endsection
