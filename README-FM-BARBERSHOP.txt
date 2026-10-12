FM BARBERSHOP — LARAVEL INTEGRATION
==================================

Project Akhir PFW: FM Barbershop

AREA WEBSITE
- Guest/customer: / (homepage), /about, /services, /portfolio, /blog, /blog-details, /contact.
- Admin: /admin (dashboard).
- CRUD Pelanggan: /admin/pelanggan.
- CRUD Layanan: /admin/layanan.
- CRUD Barber: /admin/barber.
- Pesan masuk dari Guest: /admin/pertanyaan.

PEMISAHAN ASSET
- public/assets/        : asset umum/shared dari project praktikum.
- public/assets-admin/  : CSS, JS, image, font/template Admin.
- public/assets-guest/  : CSS, JS, image, font/template Guest Brber.
- Views memakai helper Laravel asset() agar path mengikuti public/.

DATABASE
- pelanggan: data master Pelanggan.
- layanan: data master Layanan (migration baru).
- barber: data master Barber (migration baru).
- pertanyaan: pesan dari form kontak Guest (fitur form, bukan salah satu dari tiga tabel master Admin).
Tiga tabel master Admin tidak memiliki foreign key/relasi satu sama lain. Data contoh tersedia melalui MasterDataDemoSeeder; harga/nama di seeder bukan data resmi.

MATERI PERTEMUAN 4–6
- Submit form ke controller, Request, @csrf.
- Validation dengan pesan error Bahasa Indonesia.
- Redirect dan flash success setelah create/update/delete serta pesan error saat validasi gagal.
- Repopulate input melalui old() dan tampilan error menggunakan @error.
- Model + migration + resource controller + CRUD Blade.
- Admin asset dan Guest asset memakai folder terpisah.

MENJALANKAN DI LARAGON
Prasyarat: PHP 8.3 atau lebih baru, Composer, dan MySQL.
1. Ekstrak ke C:\laragon\www\fm-barbershop (folder Project Akhir terpisah dari project praktikum).
2. Buat database MySQL fm_barbershop.
3. Salin .env.example menjadi .env, lalu atur DB_DATABASE, DB_USERNAME, DB_PASSWORD.
4. Jalankan:
   composer install
   php artisan key:generate
   php artisan migrate
   php artisan db:seed (opsional, untuk data contoh screenshot)
5. Aktifkan Apache dan MySQL di Laragon.
6. Buka http://fm-barbershop.test/ dan http://fm-barbershop.test/admin.
   Alternatif: php artisan serve lalu buka http://127.0.0.1:8000/ dan /admin.

LOGO
Logo Guest belum diganti tanpa persetujuan pemilik project. Setelah diputuskan, periksa logo navbar, footer, preloader, serta favicon jika relevan.

GIT
Repository Project Akhir wajib berbeda dari repository Project Praktikum. Lihat PROJECT_AKHIR_PFW_GUIDE.md untuk nama repo sesuai format dosen, perintah First Commit/push, referensi template, dan checklist tldraw.

CATATAN
- Paket tidak menyertakan .env atau vendor/.
- Jangan gunakan migrate:fresh pada database yang berisi data penting.
- Push ke GitHub dilakukan dari akun pemilik setelah membuat repository yang benar; tidak ada push otomatis dari paket ini.
