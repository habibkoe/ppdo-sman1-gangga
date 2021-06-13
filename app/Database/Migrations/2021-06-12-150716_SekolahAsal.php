<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SekolahAsal extends Migration
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
			'no_ijazah'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'nama_sekolah'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'alamat_sekolah'       => [
				'type'       => 'TEXT',
			],
			'siswa_id'       => [
				'type'       => 'INT',
				'constraint' => 5,
				'unsigned'       => true,
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'deleted_at DATETIME'
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('siswa_id', 'siswa','id');
		$this->forge->createTable('sekolah_asal');
	}

	public function down()
	{
		$this->forge->dropTable('sekolah_asal');
	}
}
