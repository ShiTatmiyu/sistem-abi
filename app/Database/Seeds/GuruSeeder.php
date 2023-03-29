<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GuruSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username_guru' => 'guru01',
                'password_guru' => password_hash('123456789', PASSWORD_DEFAULT),
                'email_guru'    => 'hehe@gmail.com',  
                'nama_guru'    => 'Arlechino',  
                'jenis_kelamin'    => 'Perempuan',  
                'foto_profile'    => 'user.png',  
            ],
            [
                'username_guru' => 'guru02',
                'password_guru' => password_hash('123456789', PASSWORD_DEFAULT),
                'email_guru'    => 'hehe@gmail.com',  
                'nama_guru'    => 'Wanderer',  
                'jenis_kelamin'    => 'Laki laki',  
                'foto_profile'    => 'user.png',
            ],
        ];

        $this->db->table('guru')->insertBatch($data);
    }
}
