<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrangTua extends Migration
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
			'nik'       => [
				'type'       => 'DOUBLE',
			],
			'nama_awal'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'nama_akhir'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'alamat'       => [
				'type'       => 'TEXT',
			],
			'jenis_kelamin'       => [
				'type'       => 'INT',
				'constraint' => 2,
			],
			'siswa_id'       => [
				'type'       => 'INT',
				'constraint' => 5,
				'unsigned'       => true,
			],
			'agama_id'       => [
				'type'       => 'INT',
				'constraint' => 5,
				'unsigned'       => true,
			],
			'pendidikan_id'       => [
				'type'       => 'INT',
				'constraint' => 5,
				'unsigned'       => true,
			],
			'pekerjaan_id'       => [
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
		$this->forge->addForeignKey('agama_id', 'master_agama','id');
		$this->forge->addForeignKey('pendidikan_id', 'master_pendidikan','id');
		$this->forge->addForeignKey('pekerjaan_id', 'master_pekerjaan','id');
		$this->forge->createTable('orang_tua');
	}

	public function down()
	{
		$this->forge->dropTable('orang_tua');
	}
}
