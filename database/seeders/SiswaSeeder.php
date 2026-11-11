<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nis' => '2024001', 'nama' => 'Ahmad Fauzi',    'jenis_kelamin' => 'L', 'tanggal_lahir' => '2008-03-12', 'kelas' => 'X-IPA-1',   'email' => 'ahmad@example.com', 'alamat' => 'Jl. Merdeka No. 10, Surabaya'],
            ['nis' => '2024002', 'nama' => 'Siti Aisyah',    'jenis_kelamin' => 'P', 'tanggal_lahir' => '2008-07-25', 'kelas' => 'X-IPA-1',   'email' => 'siti@example.com',  'alamat' => 'Jl. Diponegoro No. 5, Surabaya'],
            ['nis' => '2024003', 'nama' => 'Budi Santoso',   'jenis_kelamin' => 'L', 'tanggal_lahir' => '2007-11-02', 'kelas' => 'XI-IPS-2',  'email' => null,                'alamat' => 'Jl. Pahlawan No. 21, Sidoarjo'],
            ['nis' => '2024004', 'nama' => 'Dewi Lestari',   'jenis_kelamin' => 'P', 'tanggal_lahir' => '2007-01-18', 'kelas' => 'XI-IPS-2',  'email' => 'dewi@example.com',  'alamat' => 'Jl. Kenanga No. 7, Gresik'],
            ['nis' => '2024005', 'nama' => 'Rizky Ramadhan', 'jenis_kelamin' => 'L', 'tanggal_lahir' => '2006-09-30', 'kelas' => 'XII-IPA-1', 'email' => null,                'alamat' => 'Jl. Melati No. 3, Surabaya'],
        ];

        foreach ($data as $item) {
            Siswa::updateOrCreate(['nis' => $item['nis']], $item);
        }
    }
}
