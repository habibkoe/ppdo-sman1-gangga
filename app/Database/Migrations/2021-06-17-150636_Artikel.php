<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Artikel extends Migration
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
			'judul'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'deskripsi'       => [
				'type'       => 'TEXT',
			],
			'status'       => [
				'type'       => 'INT',
				'constraint' => 5,
			],
			'kategori_id'       => [
				'type'       => 'INT',
				'constraint' => 2,
			],
			'user_id'       => [
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
		$this->forge->createTable('artikel');
	}

	public function down()
	{
		$this->forge->dropTable('artikel');
	}
}
