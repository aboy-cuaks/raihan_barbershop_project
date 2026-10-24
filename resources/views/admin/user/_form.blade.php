@if ($errors->any())
    <div class="alert alert-error">
        <strong>Data belum valid.</strong>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card form-card">
    @if (isset($user))
        <form action="{{ route('admin.user.update', $user->id) }}"
            method="POST">
            @csrf
            @method('PUT')
    @else
        <form action="{{ route('admin.user.store') }}"
            method="POST">
            @csrf
    @endif

        <div class="form-grid">
            <div class="field">
                <label for="name">Nama User *</label>

                <input
                    class="form-control"
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $user->name ?? '') }}"
                    maxlength="255"
                    required
                >

                @error('name')
                    <small class="field-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="field">
                <label for="email">Email *</label>

                <input
                    class="form-control"
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $user->email ?? '') }}"
                    maxlength="255"
                    required
                >

                @error('email')
                    <small class="field-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="field">
                <label for="password">
                    {{ isset($user) ? 'Password Baru' : 'Password' }}
                    @unless (isset($user))
                        *
                    @endunless
                </label>

                <input
                    class="form-control"
                    type="password"
                    id="password"
                    name="password"
                    minlength="8"
                    @unless (isset($user))
                        required
                    @endunless
                >

                @error('password')
                    <small class="field-error">{{ $message }}</small>
                @enderror

                @if (isset($user))
                    <small>Kosongkan jika tidak ingin mengganti password.</small>
                @endif
            </div>

            <div class="field">
                <label for="password_confirmation">
                    Konfirmasi Password
                    @unless (isset($user))
                        *
                    @endunless
                </label>

                <input
                    class="form-control"
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    minlength="8"
                    @unless (isset($user))
                        required
                    @endunless
                >
            </div>
        </div>

        <div class="form-actions">
            <a href="{{ route('admin.user.index') }}"
            class="btn btn-outline">Batal</a>

            <button type="submit" class="btn btn-primary">
                {{ isset($user) ? 'Simpan Perubahan' : 'Simpan User' }}
            </button>
        </div>
    </form>
</div>
