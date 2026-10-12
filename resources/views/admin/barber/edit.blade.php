@extends('admin.layouts.app')
@section('title', 'Edit Barber')
@section('content')
<section class="page-head"><div><span class="eyebrow">DATA MASTER</span><h1>Edit Barber</h1><p>Perbarui informasi barber yang dipilih.</p></div><div class="page-head-actions"><a href="{{ route('admin.barber.index') }}" class="btn btn-outline">← Kembali</a></div></section>
@include('admin.barber._form')
@endsection
