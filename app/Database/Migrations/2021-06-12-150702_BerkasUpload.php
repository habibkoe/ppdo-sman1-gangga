<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BerkasUpload extends Migration
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
				'constraint' => '50',
			],
			'path'       => [
				'type'       => 'text',
			],
			'siswa_id'       => [
				'type'       => 'INT',
				'constraint' => 5,
				'unsigned'       => true,
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'deleted_at DATETIME DEFAULT CURRENT_TIMESTAMP'
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('siswa_id', 'siswa','id');
		$this->forge->createTable('berkas_upload');
	}

	public function down()
	{
		$this->forge->dropTable('berkas_upload');
	}
}
