<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailTransactionMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BINARY',
                'constraint' => 16
            ],
            'transaction_id' => [
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
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('transaction_id', 'transactions', 'id');
        $this->forge->addForeignKey('product_id', 'products', 'id');
        $this->forge->createTable('detailtransactions', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('detailtransactions', TRUE);
    }
}
