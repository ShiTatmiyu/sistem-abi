<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use function PHPSTORM_META\type;

class AbsenIbadah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_absen' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true 
            ],
            'nisn_murid' => [
                'type' => 'int',
                'constraint' => '10'
            ],
            'nama_ibadah' => [
                'type' => 'varchar',
                'constraint' => '100'
            ],
            'status_ibadah' => [
                'type' => 'varchar',
                'constraint' => '20'
            ],
            'waktu_isi' => [
                'type' => 'datetime'
            ],
            'keterangan_walimurid' => [
                'type' => 'text',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id_absen', true);
        $this->forge->createTable('AbsenIbadah');
    }

    public function down()
    {
        $this->forge->dropTable('AbsenIbadah');
    }
}
