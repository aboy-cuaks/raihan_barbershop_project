<?php

namespace Database\Seeders;

use App\Models\Barber;
use App\Models\Layanan;
use App\Models\Pelanggan;
use Illuminate\Database\Seeder;

class MasterDataDemoSeeder extends Seeder
{
    /**
     * Example records only. They are not real customer or business records.
     * This seeder uses the three master tables independently, without relations.
     */
    public function run(): void
    {
        $customers = [
            ['first_name' => 'Andi', 'last_name' => 'Pratama', 'birthday' => '2002-02-14', 'gender' => 'Male', 'email' => 'andi.pratama@example.com', 'phone' => '081234560101'],
            ['first_name' => 'Rizky', 'last_name' => 'Maulana', 'birthday' => '2001-08-09', 'gender' => 'Male', 'email' => 'rizky.maulana@example.com', 'phone' => '081234560102'],
            ['first_name' => 'Dimas', 'last_name' => 'Saputra', 'birthday' => '2003-04-21', 'gender' => 'Male', 'email' => 'dimas.saputra@example.com', 'phone' => '081234560103'],
            ['first_name' => 'Nadia', 'last_name' => 'Putri', 'birthday' => '2002-11-30', 'gender' => 'Female', 'email' => 'nadia.putri@example.com', 'phone' => '081234560104'],
            ['first_name' => 'Fajar', 'last_name' => 'Ramadhan', 'birthday' => '2000-06-18', 'gender' => 'Male', 'email' => 'fajar.ramadhan@example.com', 'phone' => '081234560105'],
        ];

        foreach ($customers as $customer) {
            Pelanggan::firstOrCreate(['email' => $customer['email']], $customer);
        }

        $services = [
            ['nama_layanan' => 'Classic Haircut', 'deskripsi' => 'Potongan klasik dengan hasil rapi.', 'durasi_menit' => 30, 'harga' => 35000, 'status' => 'aktif'],
            ['nama_layanan' => 'Fade Haircut', 'deskripsi' => 'Potongan fade dengan gradasi yang presisi.', 'durasi_menit' => 45, 'harga' => 45000, 'status' => 'aktif'],
            ['nama_layanan' => 'Haircut + Wash', 'deskripsi' => 'Potong rambut dan keramas.', 'durasi_menit' => 45, 'harga' => 50000, 'status' => 'aktif'],
            ['nama_layanan' => 'Beard Trim', 'deskripsi' => 'Merapikan jenggot dan kumis.', 'durasi_menit' => 20, 'harga' => 25000, 'status' => 'nonaktif'],
        ];

        foreach ($services as $service) {
            Layanan::firstOrCreate(['nama_layanan' => $service['nama_layanan']], $service);
        }

        $barbers = [
            ['nama' => 'Andi Barber', 'email' => 'andi.barber@example.com', 'no_telepon' => '081234560201', 'spesialisasi' => 'Classic Cut', 'status' => 'aktif'],
            ['nama' => 'Rizky Barber', 'email' => 'rizky.barber@example.com', 'no_telepon' => '081234560202', 'spesialisasi' => 'Fade & Taper', 'status' => 'aktif'],
            ['nama' => 'Dimas Barber', 'email' => 'dimas.barber@example.com', 'no_telepon' => '081234560203', 'spesialisasi' => 'Hair Styling', 'status' => 'aktif'],
        ];

        foreach ($barbers as $barber) {
            Barber::firstOrCreate(['email' => $barber['email']], $barber);
        }
    }
}
