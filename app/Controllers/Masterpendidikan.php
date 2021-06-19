<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MasterPendidikan as ModelsMasterPendidikan;

class Masterpendidikan extends BaseController
{

	private string $nama_halaman = "Master Pendidikan";

	public function index()
	{
		$session = session();
		$data['session'] = $session;
		$data['nama_halaman'] = $this->nama_halaman;
		return view('back_content/master_pendidikan/index', $data);
	}

	public function getDataPendidikan()
	{
		if($this->request->isAJAX()) {
			$dataModel = new ModelsMasterPendidikan();

			$datas = [
				'datas' => $dataModel->findAll()
			];

			$pesan  = [
				'data' => view('back_content/master_pendidikan/data', $datas)
			];

			echo json_encode($pesan);

		}else {
			exit('Maaf tidak dapat di proses');
		}
	}

	public function getFormPendidikan()
	{
		if($this->request->isAJAX()) {
			$element = [
				'data' => view('back_content/master_pendidikan/form')
			];

			echo json_encode($element);
		}else {
			exit('Maaf tidak dapa di proses');
		}
	}

	public function simpanDataPendidikan()
	{
		if($this->request->isAJAX()) {

		}else {
			
		}
	}
}
