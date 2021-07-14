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

	public function getDataDitolak()
	{
		if($this->request->isAJAX()) {
			$dataModel = new Siswa();
			$datas = [
				'datas' => $dataModel->getDataDitolakJoinAll()
			];

			$pesan  = [
				'data' => view('back_content/manajemen_siswa/data_ditolak', $datas)
			];

			echo json_encode($pesan);

		}else {
			exit('Maaf tidak dapat di proses');
		}
	}

	public function tolakSiswa()
	{
		if ($this->request->isAJAX()) {
			$id = $this->request->getVar('siswa_id');
			$keputusan = $this->request->getVar('keputusan');

			if($keputusan == 0) {
				$dataUpdate = [
					'deleted_at' => date('Y-m-d H:i:s')
				];
			}else {
				$dataUpdate = [
					'deleted_at' => null
				];
			}
			
			$data = new Siswa();

			$data->update($id, $dataUpdate);

			$pesan = [
				'berhasil' => 'Siswa ditolak'
			];

			echo json_encode($pesan);
		}
	}
}
