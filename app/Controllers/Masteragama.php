<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MasterAgama as ModelsMasterAgama;

class Masteragama extends BaseController
{
	private string $nama_halaman = "Master Agama";

	public function index()
	{
		$session = session();

		$data['session'] = $session;
		$data['nama_halaman'] = $this->nama_halaman;
		return view('back_content/master_agama/index', $data);
	}

	public function getDataAgama()
	{
		if($this->request->isAJAX()) {
			$dataModel = new ModelsMasterAgama();

			$datas = [
				'datas' => $dataModel->findAll()
			];

			$pesan  = [
				'data' => view('back_content/master_agama/data', $datas)
			];

			echo json_encode($pesan);

		}else {
			exit('Maaf tidak dapat di proses');
		}
	}
}
