@if ($errors->any())
    <div class="alert alert-error">Periksa kembali isian formulir. Pesan kesalahan tercantum di bawah kolom terkait.</div>
@endif
<div class="card form-card">
    @if (isset($dataLayanan))
        <form action="{{ route('admin.layanan.update', $dataLayanan->layanan_id) }}" method="POST">
            @csrf
            @method('PUT')
    @else
        <form action="{{ route('admin.layanan.store') }}" method="POST">
            @csrf
    @endif
        <div class="form-grid">
            <div class="field">
                <label for="nama_layanan">Nama Layanan <span>*</span></label>
                <input class="form-control" type="text" id="nama_layanan" name="nama_layanan" value="{{ old('nama_layanan', $dataLayanan->nama_layanan ?? '') }}" maxlength="100" required>
                @error('nama_layanan')<small class="field-error">{{ $message }}</small>@enderror
            </div>
            <div class="field">
                <label for="durasi_menit">Durasi (menit) <span>*</span></label>
                <input class="form-control" type="number" id="durasi_menit" name="durasi_menit" value="{{ old('durasi_menit', $dataLayanan->durasi_menit ?? 30) }}" min="10" max="480" required>
                @error('durasi_menit')<small class="field-error">{{ $message }}</small>@enderror
            </div>
            <div class="field">
                <label for="harga">Harga (Rp) <span>*</span></label>
                <input class="form-control" type="number" id="harga" name="harga" value="{{ old('harga', $dataLayanan->harga ?? '') }}" min="0" max="10000000" step="1000" required>
                @error('harga')<small class="field-error">{{ $message }}</small>@enderror
            </div>
            <div class="field">
                <label for="status">Status <span>*</span></label>
                <select class="form-control" id="status" name="status" required>
                    <option value="aktif" @selected(old('status', $dataLayanan->status ?? 'aktif') === 'aktif')>Aktif</option>
                    <option value="nonaktif" @selected(old('status', $dataLayanan->status ?? '') === 'nonaktif')>Nonaktif</option>
                </select>
                @error('status')<small class="field-error">{{ $message }}</small>@enderror
            </div>
            <div class="field" style="grid-column:1/-1">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" maxlength="500">{{ old('deskripsi', $dataLayanan->deskripsi ?? '') }}</textarea>
                @error('deskripsi')<small class="field-error">{{ $message }}</small>@enderror
            </div>
        </div>
        <div class="form-actions">
            <a href="{{ route('admin.layanan.index') }}" class="btn btn-outline">Batal</a>
            <button type="submit" class="btn btn-primary">{{ isset($dataLayanan) ? 'Simpan Perubahan' : 'Simpan Layanan' }}</button>
        </div>
    </form>
</div>
