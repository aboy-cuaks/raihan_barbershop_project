@extends('admin.layouts.app')
@section('title', 'Edit Layanan')
@section('content')
<section class="page-head"><div><span class="eyebrow">DATA MASTER</span><h1>Edit Layanan</h1><p>Perbarui informasi layanan yang dipilih.</p></div><div class="page-head-actions"><a href="{{ route('admin.layanan.index') }}" class="btn btn-outline">← Kembali</a></div></section>
@include('admin.layanan._form')
@endsection
