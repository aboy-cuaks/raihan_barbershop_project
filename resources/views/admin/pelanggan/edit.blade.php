@extends('admin.layouts.app')
@section('title', 'Edit Pelanggan')
@section('content')
<section class="page-head"><div><span class="eyebrow">DATA PELANGGAN</span><h1>Edit Pelanggan</h1><p>Perbarui informasi pelanggan yang dipilih.</p></div><div class="page-head-actions"><a href="{{ route('admin.pelanggan.index') }}" class="btn btn-outline">← Kembali</a></div></section>
@if ($errors->any())<div class="alert alert-error">Periksa kembali data yang dimasukkan. Pastikan semua kolom wajib sudah benar.</div>@endif
<div class="card form-card"><form action="{{ route('admin.pelanggan.update', $dataPelanggan->pelanggan_id) }}" method="POST">@csrf @method('PUT')
<div class="form-grid">
    <div class="field"><label for="first_name">Nama Depan <span>*</span></label><input class="form-control" type="text" id="first_name" name="first_name" value="{{ old('first_name', $dataPelanggan->first_name ?? '') }}" maxlength="100" required>@error('first_name')<small class="field-error">{{ $message }}</small>@enderror</div>
    <div class="field"><label for="last_name">Nama Belakang <span>*</span></label><input class="form-control" type="text" id="last_name" name="last_name" value="{{ old('last_name', $dataPelanggan->last_name ?? '') }}" maxlength="100" required>@error('last_name')<small class="field-error">{{ $message }}</small>@enderror</div>
    <div class="field"><label for="birthday">Tanggal Lahir <span>*</span></label><input class="form-control" type="date" id="birthday" name="birthday" value="{{ old('birthday', isset($dataPelanggan) ? $dataPelanggan->birthday?->format('Y-m-d') : '') }}" required>@error('birthday')<small class="field-error">{{ $message }}</small>@enderror</div>
    <div class="field"><label for="gender">Jenis Kelamin <span>*</span></label><select class="form-control" id="gender" name="gender" required><option value="">Pilih jenis kelamin</option><option value="Male" @selected(old('gender', $dataPelanggan->gender ?? '') === 'Male')>Laki-laki</option><option value="Female" @selected(old('gender', $dataPelanggan->gender ?? '') === 'Female')>Perempuan</option></select>@error('gender')<small class="field-error">{{ $message }}</small>@enderror</div>
    <div class="field"><label for="email">Email <span>*</span></label><input class="form-control" type="email" id="email" name="email" value="{{ old('email', $dataPelanggan->email ?? '') }}" maxlength="255" required>@error('email')<small class="field-error">{{ $message }}</small>@enderror</div>
    <div class="field"><label for="phone">Nomor Telepon <span>*</span></label><input class="form-control" type="tel" inputmode="numeric" id="phone" name="phone" value="{{ old('phone', $dataPelanggan->phone ?? '') }}" required>@error('phone')<small class="field-error">{{ $message }}</small>@enderror</div>
</div>
    <div class="form-actions"><a href="{{ route('admin.pelanggan.index') }}" class="btn btn-outline">Batal</a><button type="submit" class="btn btn-primary">Simpan Perubahan</button></div>
</form></div>
@endsection
