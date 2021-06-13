<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ApplicationUser extends Migration
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
			'username'       => [
					'type'       => 'VARCHAR',
					'constraint' => '50',
					'unique'	=> true,
			],
			'password'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'role_id'       => [
				'type'       => 'INT',
				'constraint' => 5,
				'unsigned'   => true,
			],
			'is_aktif'       => [
				'type'       => 'BOOLEAN',
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'deleted_at DATETIME'
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('role_id', 'role','id');
		$this->forge->createTable('application_user');
	}

	public function down()
	{
		$this->forge->dropTable('application_user');
	}
}
