@php
    $isEdit = isset($dataPelanggan) && $dataPelanggan !== null;

    $gender = old(
        'gender',
        $isEdit ? $dataPelanggan->gender : ''
    );

    $birthday = old(
        'birthday',
        $isEdit ? $dataPelanggan->birthday?->format('Y-m-d') : ''
    );
@endphp

@if ($errors->any())
    <div class="alert alert-error">
        Periksa kembali data yang dimasukkan.
        Pastikan semua kolom wajib sudah benar.
    </div>
@endif

<div class="card form-card">
    <form
        action="{{ $isEdit
            ? route('admin.pelanggan.update', $dataPelanggan->pelanggan_id)
            : route('admin.pelanggan.store') }}"
        method="POST">

        @csrf

        @if ($isEdit)
            @method('PUT')
        @endif

        <div class="form-grid">

            <div class="field">
                <label for="first_name">
                    Nama Depan <span>*</span>
                </label>

                <input
                    class="form-control"
                    type="text"
                    id="first_name"
                    name="first_name"
                    value="{{ old('first_name', $isEdit ? $dataPelanggan->first_name : '') }}"
                    maxlength="100"
                    required
                >

                @error('first_name')
                    <small class="field-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="field">
                <label for="last_name">
                    Nama Belakang <span>*</span>
                </label>

                <input
                    class="form-control"
                    type="text"
                    id="last_name"
                    name="last_name"
                    value="{{ old('last_name', $isEdit ? $dataPelanggan->last_name : '') }}"
                    maxlength="100"
                    required
                >

                @error('last_name')
                    <small class="field-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="field">
                <label for="birthday">
                    Tanggal Lahir <span>*</span>
                </label>

                <input
                    class="form-control"
                    type="date"
                    id="birthday"
                    name="birthday"
                    value="{{ $birthday }}"
                    required
                >

                @error('birthday')
                    <small class="field-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="field">
                <label for="gender">
                    Jenis Kelamin <span>*</span>
                </label>

                <select
                    class="form-control"
                    id="gender"
                    name="gender"
                    required>

                    <option value="">Pilih jenis kelamin</option>

                    <option value="Male" @selected($gender === 'Male')>
                        Laki-laki
                    </option>

                    <option value="Female" @selected($gender === 'Female')>
                        Perempuan
                    </option>
                </select>

                @error('gender')
                    <small class="field-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="field">
                <label for="email">
                    Email <span>*</span>
                </label>

                <input
                    class="form-control"
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $isEdit ? $dataPelanggan->email : '') }}"
                    maxlength="255"
                    required
                >

                @error('email')
                    <small class="field-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="field">
                <label for="phone">
                    Nomor Telepon <span>*</span>
                </label>

                <input
                    class="form-control"
                    type="tel"
                    inputmode="numeric"
                    id="phone"
                    name="phone"
                    value="{{ old('phone', $isEdit ? $dataPelanggan->phone : '') }}"
                    required
                >

                @error('phone')
                    <small class="field-error">{{ $message }}</small>
                @enderror
            </div>

        </div>

        <div class="form-actions">
            <a
                href="{{ route('admin.pelanggan.index') }}"
                class="btn btn-outline">
                Batal
            </a>

            <button type="submit" class="btn btn-primary">
                {{ $isEdit ? 'Simpan Perubahan' : 'Simpan Pelanggan' }}
            </button>
        </div>

    </form>
</div>
