<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChatMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 32
            ],
            'from' => [
                'type' => 'VARCHAR',
                'constraint' => 32
            ],
            'to' => [
                'type' => 'VARCHAR',
                'constraint' => 32
            ],
            'pesan' => [
                'type' => 'TEXT'
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ["pending", "read"],
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('chats', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('chats', TRUE);
    }
}
