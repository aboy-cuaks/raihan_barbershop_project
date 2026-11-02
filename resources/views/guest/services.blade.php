@extends('guest.layouts.app')

@section('title', 'Services')

@section('content')

    <!-- Hero Start -->
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 pt-70 text-center">
                            <h2>Our Services</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Services Area Start -->
    <section class="service-area section-padding30">
        <div class="container">

            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-11 col-sm-11">
                    <div class="section-tittle text-center mb-90">
                        <span>Professional Services</span>
                        <h2>Our Best Services That We Offer to You</h2>
                    </div>
                </div>
            </div>

            <!-- Daftar Layanan -->
            <div class="row">

                @forelse ($dataLayanan as $item)

                    @include('guest.partials.service-card', [
                        'item' => $item
                    ])

                @empty

                    <div class="col-12 text-center">
                        <p>Belum ada layanan yang tersedia saat ini.</p>
                    </div>

                @endforelse

            </div>
        </div>
    </section>
    <!-- Services Area End -->

@endsection
