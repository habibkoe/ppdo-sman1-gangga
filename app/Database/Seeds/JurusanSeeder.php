<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JurusanSeeder extends Seeder
{
	public function run()
	{
		$data = [
			['singkatan'=> 'IPS','nama' => 'Ilmu Pengetahuan Sosial'],
			['singkatan'=> 'IPA','nama' => 'Ilmu Pengetahuan ALAM'],
			['singkatan'=> 'BI','nama' => 'Bahasa Indonesia']
		];
		
		// Using Query Builder
		foreach($data as $d) {
			$this->db->table('master_jurusan')->insert($d);
		}
	}
}
