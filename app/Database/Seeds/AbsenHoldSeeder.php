<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AbsenHoldSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nisn_murid' => '123456789',
                'absenhold_ibadah' => 'Sholat Dzhuhur',
                'status_ibadah' => 'Dilakukan',
                'waktu_isi' => date('Y-m-d H:i:s'),
            ],
            [
                'nisn_murid' => '123456789',
                'absenhold_ibadah' => 'Puasa Senin',
                'status_ibadah' => 'Dilakukan',
                'waktu_isi' => date('Y-m-d H:i:s'),
            ],
            [
                'nisn_murid' => '987654321',
                'absenhold_ibadah' => 'Puasa Senin',
                'status_ibadah' => 'Tidak Dilakukan',
                'waktu_isi' => '2050-04-01 20:20:20',
            ],
            [
                'nisn_murid' => '987654321',
                'absenhold_ibadah' => 'Puasa Kamis',
                'status_ibadah' => 'Tidak Dilakukan',
                'waktu_isi' => '2050-04-01 20:20:20',
            ],
        ];

        $this->db->table('absenibadahhold')->insertBatch($data);
    }
}
