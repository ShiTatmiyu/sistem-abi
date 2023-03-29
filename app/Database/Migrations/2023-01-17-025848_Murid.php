<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Murid extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nisn' => [
                'type' => 'int',
                'constraint' => '10',
                'unsigned' => true
            ],
            'username_murid' => [
                'type' => 'varchar',
                'constraint' => '30',
            ],
            'password_murid' => [
                'type' => 'varchar',
                'constraint' => '255',
            ],
            'email_murid' => [
                'type' => 'varchar',
                'constraint' => '20'
            ],
            'nama_murid' => [
                'type' => 'varchar',
                'constraint' => '100'
            ],
            'kelas' => [
                'type' => 'varchar',
                'constraint' => '10'
            ],
            'jenis_kelamin' => [
                'type' => 'varchar',
                'constraint' => '9'
            ],
            'foto_profile' => [
                'type' => 'varchar',
                'constraint' => '255'
            ]
        ]);
        $this->forge->addKey('nisn', true);
        $this->forge->addUniqueKey('username_murid');
        $this->forge->createTable('murid');
    }

    public function down()
    {
        $this->forge->dropTable('murid');
    }
}
