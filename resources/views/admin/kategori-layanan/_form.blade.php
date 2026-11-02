@if ($errors->any())
    <div class="alert alert-error">
        Periksa kembali isian formulir. Pesan kesalahan tersedia
        di bawah kolom terkait.
    </div>
@endif

<div class="card form-card">

    @if (isset($dataKategori))
        <form action="{{ route('admin.kategori-layanan.update', $dataKategori->kategori_id) }}" method="POST">
            @csrf
            @method('PUT')
    @else
            <form action="{{ route('admin.kategori-layanan.store') }}" method="POST">
                @csrf
        @endif

            <div class="form-grid">

                <div class="field">
                    <label for="nama_kategori">
                        Nama Kategori <span>*</span>
                    </label>

                    <input class="form-control" type="text" id="nama_kategori" name="nama_kategori"
                        value="{{ old('nama_kategori', $dataKategori->nama_kategori ?? '') }}" maxlength="100"
                        placeholder="Contoh: Haircut" required>

                    @error('nama_kategori')
                        <small class="field-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="field" style="grid-column:1/-1">
                    <label for="deskripsi">
                        Deskripsi
                    </label>

                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" maxlength="500"
                        placeholder="Masukkan deskripsi kategori...">{{ old('deskripsi', $dataKategori->deskripsi ?? '') }}</textarea>

                    @error('deskripsi')
                        <small class="field-error">{{ $message }}</small>
                    @enderror
                </div>

            </div>

            <div class="form-actions">
                <a href="{{ route('admin.kategori-layanan.index') }}" class="btn btn-outline">
                    Batal
                </a>

                <button type="submit" class="btn btn-primary">
                    {{ isset($dataKategori) ? 'Simpan Perubahan' : 'Simpan Kategori' }}
                </button>
            </div>

        </form>
</div>
