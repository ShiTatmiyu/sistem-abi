<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Guru extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_guru' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username_guru' => [
                'type' => 'varchar',
                'constraint' => '30',
            ],
            'password_guru' => [
                'type' => 'varchar',
                'constraint' => '255',
            ],
            'email_guru' => [
                'type' => 'varchar',
                'constraint' => '20'
            ],
            'nama_guru' => [
                'type' => 'varchar',
                'constraint' => '100'
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
        $this->forge->addKey('id_guru', true);
        $this->forge->addUniqueKey('username_guru');
        $this->forge->createTable('guru');
    }

    public function down()
    {
        $this->forge->dropTable('guru');
    }
}
