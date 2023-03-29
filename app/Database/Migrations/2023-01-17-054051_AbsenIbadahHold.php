<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AbsenIbadahHold extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_absenhold' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true 
            ],
            'nisn_murid' => [
                'type' => 'int',
                'constraint' => '10',
                'unsigned' => true
            ],
            'absenhold_ibadah' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'status_ibadah' => [
                'type' => 'varchar',
                'constraint' => '20'
            ],
            'waktu_isi' => [
                'type' => 'datetime'
            ]
        ]);
        $this->forge->addKey('id_absenhold', true);
        $this->forge->addForeignKey('nisn_murid', 'murid', 'nisn');
        $this->forge->createTable('AbsenIbadahHold');
    }

    public function down()
    {
        $this->forge->dropTable('AbsenIbadahHold');
    }
}
