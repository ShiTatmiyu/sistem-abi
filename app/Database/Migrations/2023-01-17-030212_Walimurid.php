<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Walimurid extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_walimurid' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username_walimurid' => [
                'type' => 'varchar',
                'constraint' => '30',
            ],
            'password_walimurid' => [
                'type' => 'varchar',
                'constraint' => '255',
            ],
            'email_walimurid' => [
                'type' => 'varchar',
                'constraint' => '20'
            ],
            'nama_walimurid' => [
                'type' => 'varchar',
                'constraint' => '100'
            ],
            'nisn_murid' => [
                'type' => 'int',
                'constraint' => '10',
                'unsigned' => true
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
        $this->forge->addKey('id_walimurid', true);
        $this->forge->addForeignKey('nisn_murid', 'murid', 'nisn'); 
        $this->forge->createTable('walimurid');
    }

    public function down()
    {
        $this->forge->dropTable('walimurid');
    }
}
