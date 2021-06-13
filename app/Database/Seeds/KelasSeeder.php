<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KelasSeeder extends Seeder
{
	public function run()
	{
		$data = [
			['nama'=> 'IPS A','lokasi' => 'Ilmu Pengetahuan Sosial','daya_tampung' => 20, 'inventaris' => 'meja, kursi, papan tulis, meja guru, lemari, sapu, kemoceng'],
			['nama'=> 'IPA A','lokasi' => 'Ilmu Pengetahuan ALAM','daya_tampung' => 20, 'inventaris' => 'meja, kursi, papan tulis, meja guru, lemari, sapu, kemoceng'],
			['nama'=> 'B A','lokasi' => 'Bahasa','daya_tampung' => 20, 'inventaris' => 'meja, kursi, papan tulis, meja guru, lemari, sapu, kemoceng'],
			['nama'=> 'IPS B','lokasi' => 'Ilmu Pengetahuan Sosial','daya_tampung' => 20, 'inventaris' => 'meja, kursi, papan tulis, meja guru, lemari, sapu, kemoceng'],
			['nama'=> 'IPA B','lokasi' => 'Ilmu Pengetahuan ALAM','daya_tampung' => 20, 'inventaris' => 'meja, kursi, papan tulis, meja guru, lemari, sapu, kemoceng'],
			['nama'=> 'B B','lokasi' => 'Bahasa','daya_tampung' => 20, 'inventaris' => 'meja, kursi, papan tulis, meja guru, lemari, sapu, kemoceng'],
			['nama'=> 'IPS C','lokasi' => 'Ilmu Pengetahuan Sosial','daya_tampung' => 20, 'inventaris' => 'meja, kursi, papan tulis, meja guru, lemari, sapu, kemoceng'],
			['nama'=> 'IPA C','lokasi' => 'Ilmu Pengetahuan ALAM','daya_tampung' => 20, 'inventaris' => 'meja, kursi, papan tulis, meja guru, lemari, sapu, kemoceng'],
			['nama'=> 'B C','lokasi' => 'Bahasa','daya_tampung' => 20, 'inventaris' => 'meja, kursi, papan tulis, meja guru, lemari, sapu, kemoceng'],
			['nama'=> 'IPS D','lokasi' => 'Ilmu Pengetahuan Sosial','daya_tampung' => 20, 'inventaris' => 'meja, kursi, papan tulis, meja guru, lemari, sapu, kemoceng'],
			['nama'=> 'IPA D','lokasi' => 'Ilmu Pengetahuan ALAM','daya_tampung' => 20, 'inventaris' => 'meja, kursi, papan tulis, meja guru, lemari, sapu, kemoceng'],
			['nama'=> 'B D','lokasi' => 'Bahasa','daya_tampung' => 20, 'inventaris' => 'meja, kursi, papan tulis, meja guru, lemari, sapu, kemoceng'],
		];
		
		// Using Query Builder
		foreach($data as $d) {
			$this->db->table('kelas')->insert($d);
		}
	}
}
