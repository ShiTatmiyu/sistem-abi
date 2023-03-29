<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username_admin' => 'admin01',
                'password_admin' => password_hash('123456789', PASSWORD_DEFAULT),
                'email_admin'    => 'hehe@gmail.com',  
                'nama_admin'    => 'Arlechino',  
                'jenis_kelamin'    => 'Perempuan',  
                'foto_profile'    => 'user.png',  
            ],
            [
                'username_admin' => 'admin02',
                'password_admin' => password_hash('123456789', PASSWORD_DEFAULT),
                'email_admin'    => 'hehe@gmail.com',  
                'nama_admin'    => 'Wanderer',  
                'jenis_kelamin'    => 'Laki laki',  
                'foto_profile'    => 'user.png',
            ],
        ];

        $this->db->table('admin')->insertBatch($data);
    }
}
