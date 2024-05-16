<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CompanyImageMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 32
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('companyimages', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('companyimages', TRUE);
    }
}
