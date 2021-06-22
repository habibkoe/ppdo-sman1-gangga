<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
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
			'nis'       => [
				'type'       => 'DOUBLE',
			],
			'nik'       => [
				'type'       => 'VARCHAR',
				'constraint' => '16'
			],
			'pas_poto'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'nama_awal'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'nama_akhir'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null'           => true,
			],
			'tempat_lahir'       => [
				'type'       => 'TEXT',
			],
			'tanggal_lahir'       => [
				'type'       => 'DATE',
			],
			'alamat'       => [
				'type'       => 'TEXT',
			],
			'jenis_kelamin'       => [
				'type'       => 'INT',
				'constraint' => 2,
			],
			'user_id'       => [
				'type'       => 'INT',
				'constraint' => 5,
				'unsigned'       => true,
			],
			'agama_id'       => [
				'type'       => 'INT',
				'constraint' => 5,
				'unsigned'       => true,
			],
			'jurusan_id'       => [
				'type'       => 'INT',
				'constraint' => 5,
				'unsigned'       => true,
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'deleted_at DATETIME'
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('user_id', 'application_user','id');
		$this->forge->addForeignKey('agama_id', 'master_agama','id');
		$this->forge->addForeignKey('jurusan_id', 'master_jurusan','id');
		$this->forge->createTable('siswa');
	}

	public function down()
	{
		$this->forge->dropTable('siswa');
	}
}
