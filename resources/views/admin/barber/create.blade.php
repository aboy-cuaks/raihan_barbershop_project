@extends('admin.layouts.app')
@section('title', 'Tambah Barber')
@section('content')
<section class="page-head"><div><span class="eyebrow">DATA MASTER</span><h1>Tambah Barber</h1><p>Masukkan informasi barber baru.</p></div><div class="page-head-actions"><a href="{{ route('admin.barber.index') }}" class="btn btn-outline">← Kembali</a></div></section>
@include('admin.barber._form', ['dataBarber' => null])
@endsection
