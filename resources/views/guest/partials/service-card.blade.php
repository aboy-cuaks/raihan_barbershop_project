<div class="col-xl-4 col-lg-4 col-md-6">
    <div class="services-caption text-center mb-30">

        <div class="service-icon">
            <i class="flaticon-healthcare-and-medical"></i>
        </div>

        <div class="service-cap">

            <span class="eyebrow">
                {{ $item->nama_kategori ?? 'Layanan' }}
            </span>

            <h4>
                {{ $item->nama_layanan }}
            </h4>

            <p>
                {{ $item->deskripsi ?? 'Layanan profesional FM Barbershop.' }}
            </p>

            <p>
                Durasi: {{ $item->durasi_menit }} menit
            </p>

            <h5>
                Rp {{ number_format((float) $item->harga, 0, ',', '.') }}
            </h5>

        </div>
    </div>
</div>
