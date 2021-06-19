<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MasterJabatan as ModelsMasterJabatan;

class Masterjabatan extends BaseController
{
	private string $nama_halaman = "Master Jabatan";

	public function index()
	{
		$session = session();

		$data['session'] = $session;
		$data['nama_halaman'] = $this->nama_halaman;
		return view('back_content/master_jabatan/index', $data);
	}

	public function getDataJabatan()
	{
		if($this->request->isAJAX()) {
			$dataModel = new ModelsMasterJabatan();

			$datas = [
				'datas' => $dataModel->findAll()
			];

			$pesan  = [
				'data' => view('back_content/master_jabatan/data', $datas)
			];

			echo json_encode($pesan);

		}else {
			exit('Maaf tidak dapat di proses');
		}
	}
}
