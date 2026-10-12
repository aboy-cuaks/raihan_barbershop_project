@extends('admin.layouts.app')
@section('title', 'Tambah Layanan')
@section('content')
<section class="page-head"><div><span class="eyebrow">DATA MASTER</span><h1>Tambah Layanan</h1><p>Masukkan informasi layanan barbershop.</p></div><div class="page-head-actions"><a href="{{ route('admin.layanan.index') }}" class="btn btn-outline">← Kembali</a></div></section>
@include('admin.layanan._form', ['dataLayanan' => null])
@endsection
