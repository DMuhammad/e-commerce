<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoryMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BINARY',
                'constraint' => 16
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('nama');
        $this->forge->createTable('categories', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('categories', TRUE);
    }
}
