<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PembagianKelas extends Migration
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
			'siswa_id'       => [
				'type'       => 'INT',
				'constraint' => 5,
				'unsigned'       => true,
			],
			'kelas_id'       => [
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
		$this->forge->addForeignKey('kelas_id', 'kelas','id');
		$this->forge->createTable('pembagian_kelas');
	}

	public function down()
	{
		$this->forge->dropTable('pembagian_kelas');
	}
}
