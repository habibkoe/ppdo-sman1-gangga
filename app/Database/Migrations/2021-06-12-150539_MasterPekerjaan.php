<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasterPekerjaan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
					'type'           => 'INT',
					'constraint'     => 5,
					'unsigned'       => true,
					'auto_increment' => true,
			],
			'nama'       => [
					'type'       => 'VARCHAR',
					'constraint' => '100',
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'deleted_at DATETIME DEFAULT CURRENT_TIMESTAMP'
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('master_pekerjaan');
	}

	public function down()
	{
		$this->forge->dropTable('master_pekerjaan');
	}
}
