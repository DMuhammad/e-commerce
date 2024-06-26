<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => "VARCHAR",
                'constraint' => 32,
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint'     => 255,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint'     => 255,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint'     => 255,
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint'     => ["Owner", "Admin", "User"],
                'default' => "User"
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint'     => 255,
            ],
            'no_telp' => [
                'type' => 'VARCHAR',
                'constraint'     => 25,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('users', TRUE);
    }
}
