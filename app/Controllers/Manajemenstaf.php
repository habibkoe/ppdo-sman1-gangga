<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Staf;

class Manajemenstaf extends BaseController
{
	private string $nama_halaman = "Manajemen Staf";

	public function index()
	{
		$session = session();

		$data['session'] = $session;
		$data['nama_halaman'] = $this->nama_halaman;
		return view('back_content/manajemen_staf/index', $data);
	}

	public function getData()
	{
		if($this->request->isAJAX()) {
			$dataModel = new Staf();

			$datas = [
				'datas' => $dataModel->findAll()
			];

			$pesan  = [
				'data' => view('back_content/manajemen_staf/data', $datas)
			];

			echo json_encode($pesan);

		}else {
			exit('Maaf tidak dapat di proses');
		}
	}
}
