<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MuridSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nisn' => '123456789',
                'username_murid' => 'murid01',
                'password_murid' => password_hash('123456789', PASSWORD_DEFAULT),
                'email_murid'    => 'hehe@gmail.com',  
                'nama_murid'    => 'Arlechino',
                'kelas' => '9A',   
                'jenis_kelamin'    => 'Perempuan',  
                'foto_profile'    => 'user.png',  
            ],
            [
                'nisn' => '987654321',
                'username_murid' => 'murid02',
                'password_murid' => password_hash('123456789', PASSWORD_DEFAULT),
                'email_murid'    => 'hehe@gmail.com',  
                'nama_murid'    => 'Wanderer', 
                'kelas' => '9I', 
                'jenis_kelamin'    => 'Laki laki',  
                'foto_profile'    => 'user.png',
            ],
        ];

        $this->db->table('murid')->insertBatch($data);
    }
}
