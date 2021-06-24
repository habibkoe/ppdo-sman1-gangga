<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kelas;
use App\Models\PembagianKelas;
use App\Models\Siswa;

class Manajemenkelas extends BaseController
{
	private string $nama_halaman = "Manajemen Kelas";

	public function index()
	{
		$session = session();

		$dataMasterKelas = new Kelas();

		$data['session'] = $session;
		$data['nama_halaman'] = $this->nama_halaman;
		$data['master_kelas'] = $dataMasterKelas->findAll();
		
		return view('back_content/manajemen_kelas/index', $data);
	}

	public function getForm($idKelas)
	{
		if($this->request->isAJAX()) {

			$masterKelas = new Kelas();
			$masterSiswa = new Siswa();
			$ambilDataKelas = $masterKelas->find($idKelas);

			$data['master_kelas'] = $ambilDataKelas;
			$data['siswa'] = $masterSiswa->where('jurusan_id', $ambilDataKelas['jurusan_id'])->findAll();
			$element = [
				'data' => view('back_content/manajemen_kelas/form', $data)
			];

			echo json_encode($element);
		}else {
			exit('Maaf tidak dapa di proses');
		}
	}

	public function simpanData()
	{
		if($this->request->isAJAX()) {
			$data = new PembagianKelas();
			$kelas_id = $this->request->getVar('kelas_id');
			$siswa_terpilih = $this->request->getVar('pilih_siswa');

			$simpanData = [];
			if(isset($siswa_terpilih) && count($siswa_terpilih) > 0) {
				foreach($siswa_terpilih as $index => $siswa) {
					$simpanData =[
						'kelas_id' => $kelas_id,
						'siswa_id' => $siswa,
					];

					$data->insert($simpanData);
				}
			}

			

			

			$pesan = [
				'berhasil' => 'Data berhasil disimpan'
			];

			echo json_encode($pesan);
		}else {
			
		}
	}
}
