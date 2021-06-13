<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PekerjaanSeeder extends Seeder
{
	public function run()
	{
		$data = [
			['nama' => 'Guru'],
			['nama' => 'Petani'],
			['nama' => 'Pedagang'],
			['nama' => 'Polisi'],
			['nama' => 'Ibu Rumah Tangga'],
			['nama' => 'Sopir'],
			['nama' => 'Ojek']
		];
		
		// Using Query Builder
		foreach($data as $d) {
			$this->db->table('master_pekerjaan')->insert($d);
		}
	}
}
