<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BerkasNilai extends Migration
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
			'mata_pelajaran'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'nilai'       => [
				'type'       => 'INT',
				'constraint' => 3,
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
		$this->forge->createTable('berkas_nilai');
	}

	public function down()
	{
		$this->forge->dropTable('berkas_nilai');
	}
}
