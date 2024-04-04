<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductImagesMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BINARY',
                'constraint' => 16
            ],
            'product_id' => [
                'type' => 'BINARY',
                'constraint' => 16
            ],
            'nama' => [
                'type' => 'blob'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('product_id', 'products', 'id');
        $this->forge->createTable('productimages', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('productimages', TRUE);
    }
}
