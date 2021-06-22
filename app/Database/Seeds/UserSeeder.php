<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'username' => 'admin',
				'password' => password_hash('testing123', PASSWORD_DEFAULT),
				'role_id' => 1,
				'is_aktif' => true,
				'is_lengkap' => false		
			],
		];
		
		// Using Query Builder
		foreach($data as $d) {
			$this->db->table('application_user')->insert($d);
		}
	}
}
