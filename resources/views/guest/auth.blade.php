@extends('guest.layouts.app')

@section('title', 'Login')

@section('content')
    <section class="contact-form-area section-padding30">
        <div class="container" style="max-width: 600px; margin-top: 60px;">
            <div class="section-tittle text-center mb-40">
                <span>FM Barbershop</span>
                <h2>Login Admin</h2>
                <p>Masukkan username dan password Anda.</p>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('guest.login') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}"
                        required>
                </div>

                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    Login
                </button>

                <a href="{{ route('guest.register') }}" class="btn btn-secondary">
                    Register
                </a>
            </form>
        </div>
    </section>
@endsection
