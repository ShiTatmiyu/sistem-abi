<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{

    public function up()
    {
        $this->forge->addField([
            'id_admin' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username_admin' => [
                'type' => 'varchar',
                'constraint' => '30',
            ],
            'password_admin' => [
                'type' => 'varchar',
                'constraint' => '255',
            ],
            'email_admin' => [
                'type' => 'varchar',
                'constraint' => '20'
            ],
            'nama_admin' => [
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

        $this->forge->addKey('id_admin', true);
        $this->forge->addUniqueKey('username_admin');
        $this->forge->createTable('admin');
    }

    public function down()
    {
        $this->forge->dropTable('admin');
    }
}
