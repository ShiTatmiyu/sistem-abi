<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Database\Seeds\AdminSeeder;
use CodeIgniter\Database\Seeds\GuruSeeder;
use CodeIgniter\Database\Seeds\MuridSeeder;
use CodeIgniter\Database\Seeds\WalimuridSeeder;

class MainSeeder extends Seeder
{
    public function run()
    {
        $this->call('AdminSeeder');
        $this->call('GuruSeeder');
        $this->call('MuridSeeder');
        $this->call('WalimuridSeeder');
        $this->call('IbadahSeeder');
        $this->call('AbsenHoldSeeder');
    }
}
