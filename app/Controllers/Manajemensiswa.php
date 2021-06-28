<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Siswa;

class Manajemensiswa extends BaseController
{

	private string $nama_halaman = "Manajemen Siswa";

	public function index()
	{
		$session = session();

		$data['session'] = $session;
		$data['nama_halaman'] = $this->nama_halaman;
		return view('back_content/manajemen_siswa/index', $data);
	}

	public function getData()
	{
		if($this->request->isAJAX()) {
			$dataModel = new Siswa();

			$datas = [
				'datas' => $dataModel->getDataJoinAll()
			];

			$pesan  = [
				'data' => view('back_content/manajemen_siswa/data', $datas)
			];

			echo json_encode($pesan);

		}else {
			exit('Maaf tidak dapat di proses');
		}
	}
}
