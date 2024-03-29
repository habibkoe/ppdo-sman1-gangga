<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasterJabatan extends Migration
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
			'deleted_at DATETIME'
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('master_jabatan');
	}

	public function down()
	{
		$this->forge->dropTable('master_jabatan');
	}
}
