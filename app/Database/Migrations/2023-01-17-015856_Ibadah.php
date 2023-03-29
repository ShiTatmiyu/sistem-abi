<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ibadah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ibadah' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_ibadah' => [
                'type' => 'varchar',
                'constraint' => '20',
            ],
            'hukum_ibadah' => [
                'type' => 'varchar',
                'constraint' => '6' 
            ],
            'jadwal_ibadah' => [
                'type' => 'varchar',
                'constraint' => '9'
            ]
        ]);
        $this->forge->addKey('id_ibadah', true);
        $this->forge->createTable('ibadah');
    }

    public function down()
    {
        $this->forge->dropTable('ibadah');
    }
}
