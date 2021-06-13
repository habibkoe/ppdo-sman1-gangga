<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PendidikanSeeder extends Seeder
{
	public function run()
	{
		$data = [
			['singkatan'=> 'S.T','nama' => 'Sarjana Teknik'],
			['singkatan'=> 'S.Pd','nama' => 'Sarjana Pendidikan'],
			['singkatan'=> 'S.Ag','nama' => 'Sarjana Agama'],
			['singkatan'=> 'M.Pd','nama' => 'Magister Pendidikan'],
			['singkatan'=> 'S.Kom','nama' => 'Sarjana Komputer'],
		];
		
		// Using Query Builder
		foreach($data as $d) {
			$this->db->table('master_pendidikan')->insert($d);
		}
	}
}
