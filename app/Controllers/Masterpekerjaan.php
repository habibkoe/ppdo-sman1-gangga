<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MasterPekerjaan as ModelsMasterPekerjaan;
use Config\Services;

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

	public function getData()
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

	public function getForm()
	{
		if($this->request->isAJAX()) {
			$element = [
				'data' => view('back_content/master_pekerjaan/form')
			];

			echo json_encode($element);
		}else {
			exit('Maaf tidak dapa di proses');
		}
	}

	public function simpanData()
	{
		if($this->request->isAJAX()) {
			$validasi = Services::validation();

			$valid = $this->validate([
				'nama' => [
					'label' => 'Nama',
					'rules' => 'required|is_unique[master_pekerjaan.nama]',
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

				$data = new ModelsMasterPekerjaan();

				$data->insert($simpanData);

				$pesan = [
					'berhasil' => 'Data berhasil disimpan'
				];
			}

			echo json_encode($pesan);
		}else {
			
		}
	}

	public function getFormEdit($id)
	{
		if($this->request->isAJAX()) {

			$dataModel = new ModelsMasterPekerjaan();

			$datas = $dataModel->find($id);

			$data = [
				'id' => $datas['id'],
				'nama' => $datas['nama']
			];

			$element = [
				'data' => view('back_content/master_pekerjaan/form_edit', $data)
			];

			echo json_encode($element);
		}else {
			exit('Maaf tidak dapa di proses');
		}
	}

	public function updateData()
	{
		if($this->request->isAJAX()) {
			$validasi = Services::validation();

			$valid = $this->validate([
				'nama' => [
					'label' => 'Nama',
					'rules' => 'required|is_unique[master_pekerjaan.nama]',
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

				$data = new ModelsMasterPekerjaan();

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
