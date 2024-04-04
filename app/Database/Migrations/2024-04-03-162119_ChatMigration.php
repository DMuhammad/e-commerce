<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChatMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BINARY',
                'constraint' => 16
            ],
            'user_id' => [
                'type' => 'BINARY',
                'constraint' => 16
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
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->createTable('chats', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('chats', TRUE);
    }
}
