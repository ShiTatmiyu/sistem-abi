<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class IbadahSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_ibadah' => 'Sholat dzhuhur',
                'hukum_ibadah' => 'Wajib',
                'jadwal_ibadah' => 'Harian',
            ],
            [
                'nama_ibadah' => 'Puasa Senin',
                'hukum_ibadah' => 'Shunah',
                'jadwal_ibadah' => 'Mingguan',
            ],
        ];

        $this->db->table('ibadah')->insertBatch($data);
    }
}
