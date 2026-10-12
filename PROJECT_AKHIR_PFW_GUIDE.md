# FM Barbershop — Panduan Kesesuaian Project Akhir PFW

## 1. Konsep aplikasi

**FM Barbershop** adalah website barbershop dengan dua area berbeda dalam satu aplikasi Laravel:

- **Guest / Customer (`/`)**: memperkenalkan barbershop, menampilkan layanan, galeri, artikel, informasi kontak, dan form pertanyaan.
- **Admin (`/admin`)**: halaman pengelolaan data dengan tema dashboard terpisah. Admin dapat mengelola tiga tabel master independen: Pelanggan, Layanan, dan Barber, serta melihat pesan dari form Guest.

Fokus implementasi saat ini adalah branding template, pemisahan asset, CRUD dasar dan materi praktikum Laravel. Fitur autentikasi admin, pembayaran, dan booking online belum dianggap selesai/tersedia.

## 2. Referensi template yang diteliti

### Guest — Brber

- Halaman referensi: https://themewagon.com/themes/free-bootstrap-4-html5-barbershop-website-template-brber/
- Repository/asset yang digunakan di project: folder template `brber-master` yang diberikan pemilik project.
- Alasan: template memang dibuat untuk barbershop, memiliki layout responsive, hero, navigasi, services, gallery/portfolio, testimonial, blog, dan contact form. Struktur asli dipertahankan agar modifikasi tidak berlebihan.
- Atribusi: jangan menghapus kredit/atribusi bawaan sampai ketentuan lisensi author template dipastikan.

### Alternatif referensi untuk dicatat di grand design

- **Barberz**: https://themewagon.com/themes/free-bootstrap-4-html5-barbar-shop-website-template-barberz/ — alternatif barbershop dengan service slideshow, pricing table, testimonial, blog, dan contact form.
- **Salone**: https://themewagon.com/themes/salone/ — alternatif template bisnis salon berbasis Bootstrap 5 dengan hero, carousel, dan beberapa elemen halaman bisnis.
- **Lisensi ThemeWagon**: https://themewagon.com/license/ — template gratis dapat digunakan untuk proyek, tetapi ketentuan atribusi tetap perlu dicek terhadap lisensi masing-masing author.

### Admin — template yang diberikan

- Referensi: file `FM_Barbershop_Admin_PHP` yang dikirim pemilik project.
- Pemilihan desain: dashboard admin dibuat berbeda dari Guest. Guest berfokus pada pengalaman calon pelanggan; Admin berfokus pada tabel, formulir, statistik, dan navigasi pengelolaan.
- Form dan tabel CRUD mengikuti komponen visual template Admin yang dipilih; teknik Blade, `asset()`, controller, migration, redirect, validation, flash data, serta CRUD mengikuti materi Pertemuan 4–6.

## 3. Logo resmi FM Barbershop — sudah diterapkan

Logo resmi yang dikirim pemilik project telah dipasang pada area Guest dan Admin. Bentuk logo tidak didesain ulang; hanya ruang transparan dipangkas dan ukuran disesuaikan supaya logo tampil proporsional.

- **Guest navbar/header**: `public/assets-guest/img/logo/logo.png`
- **Guest footer**: `public/assets-guest/img/logo/logo2_footer.png`
- **Guest preloader**: `public/assets-guest/img/logo/loder.png`
- **Admin sidebar**: `public/assets-admin/images/logo.png`
- **Favicon**: file pada `public/favicon.ico`, `public/assets-guest/img/favicon.ico`, dan `public/assets-admin/images/favicon.png` menggunakan simbol utama logo agar tetap terbaca saat ditampilkan kecil.

Ukuran logo Guest diatur oleh `public/assets-guest/css/branding.css`. Karena logo resmi berwarna putih dengan latar transparan, versi header/footer dipakai pada permukaan gelap, sementara CSS membalik kontrasnya di preloader dan sidebar Admin yang terang. Pada tema gelap Admin, logo kembali menggunakan warna aslinya.

## 4. Route aplikasi

| URL | Fungsi |
|---|---|
| `/` | Homepage Guest |
| `/about`, `/services`, `/portfolio`, `/blog`, `/blog-details`, `/contact` | Halaman Guest |
| `/admin` | Dashboard Admin |
| `/admin/pelanggan` | CRUD tabel master Pelanggan |
| `/admin/layanan` | CRUD tabel master Layanan |
| `/admin/barber` | CRUD tabel master Barber |
| `/admin/pertanyaan` | Daftar pesan dari form Guest |
| `/contact/send` (POST) | Menyimpan form pertanyaan Guest |

Satu path persis `/` tidak dapat menampilkan dua halaman berbeda sekaligus dalam routing biasa. Karena itu Guest ada pada `/`, sedangkan Admin berada di `/admin`; keduanya berjalan dari project yang sama tanpa perlu mengganti folder/template secara manual.

## 5. Tiga tabel master Admin — tanpa relasi

Tiga tabel yang disiapkan adalah tabel independen dan tidak menggunakan foreign key satu sama lain.

### `pelanggan`

Tabel berasal dari migration praktikum yang ada. Kolom utama: `pelanggan_id`, `first_name`, `last_name`, `birthday`, `gender`, `email`, `phone`, timestamps.

### `layanan`

Migration baru: `2026_10_12_214000_create_layanan_table.php`.

Kolom: `layanan_id`, `nama_layanan`, `deskripsi`, `durasi_menit`, `harga`, `status`, timestamps.

### `barber`

Migration baru: `2026_10_12_214100_create_barber_table.php`.

Kolom: `barber_id`, `nama`, `email`, `no_telepon`, `spesialisasi`, `status`, timestamps.

Tabel `pertanyaan` tetap ada sebagai fitur form kontak Guest dari materi Pertemuan 4. Tabel tersebut bukan pengganti salah satu dari tiga data master Admin.

## 6. Materi Laravel yang harus terlihat pada implementasi

### Form dan CSRF

Setiap form mengarah ke named route dan menggunakan `@csrf`. Form update menggunakan `@method('PUT')`, sedangkan penghapusan menggunakan `@method('DELETE')`.

### Validation dan pesan error

Contoh pola dari controller:

```php
$validated = $request->validate([
    'nama_layanan' => ['required', 'string', 'min:3', 'max:100'],
    'durasi_menit' => ['required', 'integer', 'min:10', 'max:480'],
    'harga' => ['required', 'numeric', 'min:0', 'max:10000000'],
    'status' => ['required', 'in:aktif,nonaktif'],
], [
    'nama_layanan.required' => 'Nama layanan wajib diisi.',
    'harga.numeric' => 'Harga harus berupa angka.',
]);
```

### Create, redirect, dan success flash

```php
Layanan::create($validated);

return redirect()
    ->route('admin.layanan.index')
    ->with('success', 'Data layanan berhasil ditambahkan.');
```

Pola yang sama digunakan setelah update dan delete dengan pesan success yang sesuai. Validasi Laravel otomatis kembali ke form sebelumnya jika gagal; pesan error ditampilkan dengan `@error` dan alert.

### Repopulate form

```blade
<input
    name="nama_layanan"
    value="{{ old('nama_layanan', $dataLayanan->nama_layanan ?? '') }}"
>
@error('nama_layanan')
    <small class="field-error">{{ $message }}</small>
@enderror
```

`old()` mempertahankan input terakhir setelah validasi gagal. Ini juga digunakan pada form Pelanggan dan form Pertanyaan Guest.

## 7. Checklist visual / tldraw

Buat satu board tldraw dengan beberapa area/frame agar tetap mudah dibaca. Cantumkan:

1. **Grand Design**: nama project, masalah/tujuan, konsep website, sasaran pengguna, batasan fitur, pemisahan Admin–Guest, dan alur singkat aplikasi.
2. **Logo**: gambar logo final setelah mendapat konfirmasi; tambahkan alasan desain singkat.
3. **Template references**: screenshot/ref link Brber untuk Guest dan template Admin yang dipilih. Beri catatan bagian mana yang dipakai sebagai referensi.
4. **Tampilan awal**: screenshot homepage Guest dan Dashboard Admin, keduanya sudah menunjukkan logo yang disetujui.
5. **CRUD**: screenshot halaman list dan form untuk tabel master. Minimal tampilkan contoh data Pelanggan, Layanan, dan Barber.
6. **Redirect / alert**: screenshot success alert setelah create/update/delete dan error alert ketika validasi gagal.
7. **Repopulate form**: screenshot form dengan input tetap terisi setelah validasi gagal.
8. **Potongan kode**: controller `store()`/`update()`/`destroy()`, rule validation, `redirect()->route()->with('success', ...)`, dan Blade `old()` / `@error`.
9. **GitHub**: screenshot nama repository, halaman commit, dan keberhasilan push.
10. **Alasan desain**: logo = identitas brand; Guest = mempromosikan layanan; Admin = memudahkan pengelolaan data; tabel/form = mengikuti tema Admin yang dipilih; asset dipisah agar tidak bentrok.

Untuk permintaan awal yang menyebut satu gambar, atur board agar seluruh area penting bisa terlihat dalam satu overview; jika teks menjadi terlalu kecil, siapkan tangkapan layar tambahan untuk tiap area sebagai bukti keterbacaan.

## 8. Git Project Akhir — wajib terpisah dari Project Praktikum

Gunakan folder Project Akhir dan repository GitHub yang berbeda dari repository praktikum. Format nama repo mengikuti instruksi dosen: `{panggilan}-{1_kata_nama_sistem}`, misalnya `panggilan-barbershop` (ganti `panggilan` dengan panggilan yang kamu gunakan).

Buat repository GitHub terlebih dahulu, lalu dari folder Project Akhir jalankan:

```bash
git init
git add .
git commit -m "First Commit"
git branch -M main
git remote add github https://github.com/USERNAME/panggilan-barbershop.git
git push --set-upstream github main
```

Untuk perubahan berikutnya:

```bash
git add .
git commit -m "feat: implement master data CRUD"
git push
```

Ganti `USERNAME` serta `panggilan-barbershop` dengan akun dan nama repository milik sendiri. Jangan memasukkan `.env`, `vendor/`, kredensial, atau data pribadi ke commit. Setelah push berhasil, buka halaman GitHub repo, masuk ke tab commits, lalu ambil screenshot yang memperlihatkan nama repo dan commit. Push GitHub tidak dilakukan otomatis oleh paket project ini karena memerlukan repository dan autentikasi akun pemilik.

## 9. Langkah menjalankan di Laragon

Persyaratan: PHP 8.3 atau lebih baru (mengikuti `composer.json`), Composer, dan MySQL Laragon.

1. Ekstrak project ini ke folder Project Akhir terpisah, misalnya `C:\laragon\www\fm-barbershop`.
2. Buat database `fm_barbershop` dan sesuaikan `.env` dari `.env.example`.
3. Jalankan `composer install`.
4. Jalankan `php artisan key:generate` jika `APP_KEY` kosong.
5. Jalankan `php artisan migrate`.
6. Buka `http://fm-barbershop.test/` untuk Guest dan `http://fm-barbershop.test/admin` untuk Admin (atau gunakan `php artisan serve`).
7. Opsional jalankan `php artisan db:seed` untuk mengisi data contoh ke tabel master; semua nama dan harga pada seeder hanya data demo dan perlu diganti sesuai data sebenarnya.
8. Tes create, update, delete, validation error, repopulate form, flash alert, dan tampilan list sebelum mengambil screenshot tldraw.

**Catatan:** `migrate` hanya menjalankan migration yang belum tercatat. Jangan menggunakan `migrate:fresh` pada database yang berisi data penting.
