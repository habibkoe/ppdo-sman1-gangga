<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pesan extends Migration
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
				'constraint' => '255',
			],
			'email'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'telp'       => [
				'type'       => 'VARCHAR',
				'constraint' => '15',
			],
			'subject'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'isi_pesan'       => [
				'type'       => 'TEXT',
			],
			'is_dibaca'       => [
				'type'       => 'BOOLEAN',
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'deleted_at DATETIME'
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('pesan');
	}

	public function down()
	{
		$this->forge->dropTable('pesan');
	}
}
