<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JabatanSeeder extends Seeder
{
	public function run()
	{
		$data = [
			['nama' => 'Kepala Sekolah'],
			['nama' => 'Wakil Kepala Sekolah'],
			['nama' => 'Sekretaris'],
			['nama' => 'TU'],
			['nama' => 'Guru Mata Pelajaran'],
			['nama' => 'Guru Wali Kelas'],
			['nama' => 'Panitia Seleksi']
		];
		
		// Using Query Builder
		foreach($data as $d) {
			$this->db->table('master_jabatan')->insert($d);
		}
	}
}
