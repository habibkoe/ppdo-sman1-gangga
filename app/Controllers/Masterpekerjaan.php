<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MasterPekerjaan as ModelsMasterPekerjaan;

class Masterpekerjaan extends BaseController
{
	private string $nama_halaman = "Master Pekerjaan";

	public function index()
	{
		$session = session();

		$data['session'] = $session;
		$data['nama_halaman'] = $this->nama_halaman;
		return view('back_content/master_pekerjaan/index', $data);
	}

	public function getDataPekerjaan()
	{
		if($this->request->isAJAX()) {
			$dataModel = new ModelsMasterPekerjaan();

			$datas = [
				'datas' => $dataModel->findAll()
			];

			$pesan  = [
				'data' => view('back_content/master_pekerjaan/data', $datas)
			];

			echo json_encode($pesan);

		}else {
			exit('Maaf tidak dapat di proses');
		}
	}
}
