# FM Barbershop — Project Akhir PFW

Aplikasi Laravel untuk website barbershop dengan dua area tampilan: Guest/customer pada `/` dan Admin pada `/admin`.

## Ringkasan

- Template Guest: Brber, asset di `public/assets-guest/`.
- Template Admin: asset dan style Admin sendiri di `public/assets-admin/`.
- Tiga tabel master Admin tanpa relasi satu sama lain: `pelanggan`, `layanan`, `barber`.
- Form pertanyaan Guest disimpan pada tabel tambahan `pertanyaan`.
- CRUD memiliki validation, pesan error per-field, repopulate dengan `old()`, redirect setelah aksi, dan success flash message.

## Menjalankan

Persyaratan: PHP 8.3 atau lebih baru (sesuai `composer.json`), Composer, dan MySQL Laragon.

1. Salin `.env.example` menjadi `.env` dan siapkan database MySQL `fm_barbershop`.
2. Jalankan `composer install`.
3. Jalankan `php artisan key:generate` jika `APP_KEY` belum ada.
4. Jalankan `php artisan migrate`.
5. Untuk mengisi data contoh ke tiga tabel master, jalankan `php artisan db:seed`.
6. Buka `/` untuk Guest dan `/admin` untuk Dashboard Admin.

Project ZIP tidak menyertakan `vendor/` atau `.env`. Harga dan identitas data pada demo seeder hanya contoh untuk pengembangan/screenshot; ganti dengan data sebenarnya sebelum digunakan secara nyata.

## Panduan tugas

Baca [PROJECT_AKHIR_PFW_GUIDE.md](PROJECT_AKHIR_PFW_GUIDE.md) untuk referensi template, konsep aplikasi, tabel CRUD, materi Pertemuan 4–6, checklist tldraw, dan langkah repository First Commit/push.

## Logo

Logo Guest masih menunggu konfirmasi. Jangan mengganti logo navbar, footer, atau preloader sebelum keputusan logo final diberikan.
