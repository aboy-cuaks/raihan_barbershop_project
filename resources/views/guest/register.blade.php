@extends('guest.layouts.app')

@section('title', 'Register')

@section('content')
    <section class="contact-form-area section-padding30">
        <div class="container" style="max-width: 600px; margin-top: 60px;">
            <div class="section-tittle text-center mb-40">
                <span>FM Barbershop</span>
                <h2>Register</h2>
                <p>Buat akun baru Anda.</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('guest.register.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="form-group mb-3">
                    <label for="password_confirmation">
                        Confirm Password
                    </label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        required>
                </div>

                <button type="submit" class="btn btn-primary">
                    Register
                </button>

                <a href="{{ route('guest.auth') }}" class="btn btn-secondary">
                    Kembali ke Login
                </a>
            </form>
        </div>
    </section>
@endsection

