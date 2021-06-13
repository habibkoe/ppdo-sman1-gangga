<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AgamaSeeder extends Seeder
{
	public function run()
	{
		$data = [
			['nama' => 'Islam'],
			['nama' => 'Protestan'],
			['nama' => 'Katolik'],
			['nama' => 'Hindu'],
			['nama' => 'Buddha'],
			['nama' => 'Khonghucu']
		];
		
		// Using Query Builder

		foreach($data as $d) {
			$this->db->table('master_agama')->insert($d);
		}
	}
}
