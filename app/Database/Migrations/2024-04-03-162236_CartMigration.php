<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CartMigration extends Migration
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
            'product_id' => [
                'type' => 'BINARY',
                'constraint' => 16
            ],
            'qty' => [
                'type' => 'INT'
            ],
            'total_harga' => [
                'type' => 'double'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->addForeignKey('product_id', 'products', 'id');
        $this->forge->createTable('carts', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('carts', TRUE);
    }
}
