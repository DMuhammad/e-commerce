<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CompanyProfileMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
            ],
            'visi' => [
                'type' => 'TEXT',
            ],
            'misi' => [
                'type' => 'TEXT',
            ],
            'bank' => [
                'type' => 'ENUM',
                'constraint' => ["BCA", "MANDIRI", "BRI", "BSI"],
            ],
            'no_rek' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('companyprofiles', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('companyprofiles', TRUE);
    }
}
