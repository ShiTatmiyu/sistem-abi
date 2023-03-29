<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class WalimuridSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username_walimurid' => 'parent01',
                'password_walimurid' => password_hash('123456789', PASSWORD_DEFAULT),
                'email_walimurid'    => 'hehe@gmail.com',  
                'nama_walimurid'    => 'Arlechino',  
                'nisn_murid'        => '987654321',
                'jenis_kelamin'    => 'Perempuan',  
                'foto_profile'    => 'user.png',  
            ],
            [
                'username_walimurid' => 'parent02',
                'password_walimurid' => password_hash('123456789', PASSWORD_DEFAULT),
                'email_walimurid'    => 'hehe@gmail.com',  
                'nama_walimurid'    => 'Wanderer',  
                'nisn_murid'         => '123456789',
                'jenis_kelamin'    => 'Laki laki',  
                'foto_profile'    => 'user.png',
            ],
        ];

        $this->db->table('walimurid')->insertBatch($data);
    }
}
