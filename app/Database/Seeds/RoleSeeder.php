<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
	public function run()
	{
		$data = [
			['nama' => 'Admin'],
			['nama' => 'Staf Sekolah'],
			['nama' => 'Siswa']
		];
		
		// Using Query Builder
		foreach($data as $d) {
			$this->db->table('role')->insert($d);
		}
	}
}
