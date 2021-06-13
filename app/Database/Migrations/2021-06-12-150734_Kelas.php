<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelas extends Migration
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
				'constraint' => '60',
			],
			'lokasi'       => [
				'type'       => 'VARCHAR',
				'constraint' => '60',
			],
			'daya_tampung'       => [
				'type'       => 'INT',
				'constraint' => 5,
			],
			'inventaris'       => [
				'type'       => 'TEXT',
			],
			'wali_kelas_id'       => [
				'type'       => 'INT',
				'constraint' => 5,
				'unsigned'       => true,
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'deleted_at DATETIME'
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('wali_kelas_id', 'staf','id');
		$this->forge->createTable('kelas');
	}

	public function down()
	{
		$this->forge->dropTable('kelas');
	}
}
