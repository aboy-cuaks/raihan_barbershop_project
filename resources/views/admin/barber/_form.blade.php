@if ($errors->any())
    <div class="alert alert-error">Periksa kembali isian formulir. Pesan kesalahan tercantum di bawah kolom terkait.</div>
@endif
<div class="card form-card">
    @if (isset($dataBarber))
        <form action="{{ route('admin.barber.update', $dataBarber->barber_id) }}" method="POST">
            @csrf
            @method('PUT')
    @else
            <form action="{{ route('admin.barber.store') }}" method="POST">
                @csrf
        @endif
            <div class="form-grid">
                <div class="field">
                    <label for="nama">Nama Barber <span>*</span></label>
                    <input class="form-control" type="text" id="nama" name="nama"
                        value="{{ old('nama', $dataBarber->nama ?? '') }}" maxlength="100" required>
                    @error('nama')<small class="field-error">{{ $message }}</small>@enderror
                </div>
                <div class="field">
                    <label for="email">Email <span>*</span></label>
                    <input class="form-control" type="email" id="email" name="email"
                        value="{{ old('email', $dataBarber->email ?? '') }}" maxlength="255" required>
                    @error('email')<small class="field-error">{{ $message }}</small>@enderror
                </div>
                <div class="field">
                    <label for="no_telepon">Nomor Telepon <span>*</span></label>
                    <input class="form-control" type="tel" id="no_telepon" name="no_telepon"
                        value="{{ old('no_telepon', $dataBarber->no_telepon ?? '') }}" maxlength="20" required>
                    @error('no_telepon')<small class="field-error">{{ $message }}</small>@enderror
                </div>
                <div class="field">
                    <label for="spesialisasi">Spesialisasi <span>*</span></label>
                    <input class="form-control" type="text" id="spesialisasi" name="spesialisasi"
                        value="{{ old('spesialisasi', $dataBarber->spesialisasi ?? '') }}" maxlength="100"
                        placeholder="Contoh: Classic Cut, Fade" required>
                    @error('spesialisasi')<small class="field-error">{{ $message }}</small>@enderror
                </div>
                <div class="field">
                    <label for="status">Status <span>*</span></label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="aktif" @selected(old('status', $dataBarber->status ?? 'aktif') === 'aktif')>Aktif
                        </option>
                        <option value="nonaktif" @selected(old('status', $dataBarber->status ?? '') === 'nonaktif')>
                            Nonaktif</option>
                    </select>
                    @error('status')<small class="field-error">{{ $message }}</small>@enderror
                </div>
            </div>
            <div class="form-actions">
                <a href="{{ route('admin.barber.index') }}" class="btn btn-outline">Batal</a>
                <button type="submit"
                    class="btn btn-primary">{{ isset($dataBarber) ? 'Simpan Perubahan' : 'Simpan Barber' }}</button>
            </div>
        </form>
</div>
