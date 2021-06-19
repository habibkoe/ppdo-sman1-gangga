<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MasterJurusan as ModelsMasterJurusan;

class Masterjurusan extends BaseController
{
	private string $nama_halaman = "Master Jurusan";

	public function index()
	{
		$session = session();

		$data['session'] = $session;
		$data['nama_halaman'] = $this->nama_halaman;
		return view('back_content/master_jurusan/index', $data);
	}

	public function getDataJurusan()
	{
		if($this->request->isAJAX()) {
			$dataModel = new ModelsMasterJurusan();

			$datas = [
				'datas' => $dataModel->findAll()
			];

			$pesan  = [
				'data' => view('back_content/master_jurusan/data', $datas)
			];

			echo json_encode($pesan);

		}else {
			exit('Maaf tidak dapat di proses');
		}
	}
}
