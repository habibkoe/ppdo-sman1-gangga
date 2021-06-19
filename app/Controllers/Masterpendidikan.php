<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MasterPendidikan as ModelsMasterPendidikan;
use Config\Services;

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
			$validasi = Services::validation();

			$valid = $this->validate([
				'nama' => [
					'label' => 'Nama',
					'rules' => 'required|is_unique[master_pendidikan.nama]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_unique' => '{field} tidak boleh sama'
					]
				]
			]);

			if(!$valid) {
				$pesan = [
					'error' => [
						'nama' => $validasi->getError('nama')
					]
				];	
			}else {
				$simpanData =[
					'nama' => $this->request->getVar('nama')
				];

				$data = new ModelsMasterPendidikan();

				$data->insert($simpanData);

				$pesan = [
					'berhasil' => 'Data berhasil disimpan'
				];
			}

			echo json_encode($pesan);
		}else {
			
		}
	}

	public function getFormEditPendidikan($id)
	{
		if($this->request->isAJAX()) {

			$dataModel = new ModelsMasterPendidikan();

			$datas = $dataModel->find($id);

			$data = [
				'id' => $datas['id'],
				'nama' => $datas['nama']
			];

			$element = [
				'data' => view('back_content/master_pendidikan/form_edit', $data)
			];

			echo json_encode($element);
		}else {
			exit('Maaf tidak dapa di proses');
		}
	}

	public function updateDataPendidikan()
	{
		if($this->request->isAJAX()) {
			$validasi = Services::validation();

			$valid = $this->validate([
				'nama' => [
					'label' => 'Nama',
					'rules' => 'required|is_unique[master_pendidikan.nama]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_unique' => '{field} tidak boleh sama'
					]
				]
			]);

			if(!$valid) {
				$pesan = [
					'error' => [
						'nama' => $validasi->getError('nama')
					]
				];	
			}else {
				$id = $this->request->getVar('id');
				$simpanData =[
					'nama' => $this->request->getVar('nama')
				];

				$data = new ModelsMasterPendidikan();

				$data->update($id, $simpanData);

				$pesan = [
					'berhasil' => 'Data berhasil diupdate'
				];
			}

			echo json_encode($pesan);
		}else {
			
		}
	}
}