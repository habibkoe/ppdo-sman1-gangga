<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Staf;
use Config\Services;

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

	public function getForm()
	{
		if($this->request->isAJAX()) {
			$element = [
				'data' => view('back_content/manajemen_staf/form')
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
				'judul' => [
					'label' => 'Nama',
					'rules' => 'required|is_unique[master_pendidikan.nama]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_unique' => '{field} tidak boleh sama'
					]
					],
					'kategori_id' => [
						'label' => 'Kategori',
						'rules' => 'required',
						'errors' => [
							'required' => '{field} tidak boleh kosong',
						]
					]
			]);

			if(!$valid) {
				$pesan = [
					'error' => [
						'judul' => $validasi->getError('judul'),
						'kategori_id' => $validasi->getError('kategori_id'),
					]
				];	
			}else {
				$simpanData =[
					'judul' => $this->request->getVar('judul'),
					'deskripsi' => $this->request->getVar('deskripsi'),
					'kategori_id' => $this->request->getVar('kategori_id'),
					'status' => $this->request->getVar('status'),
					'user_id' => session()->get('user_id'),
				];

				$data = new Staf();

				$data->insert($simpanData);

				$pesan = [
					'berhasil' => 'Data berhasil disimpan'
				];
			}

			echo json_encode($pesan);
		}else {
			exit('Maaf tidak dapa di proses');
		}
	}

	public function getFormEdit($id)
	{
		if($this->request->isAJAX()) {

			$dataModel = new Staf();

			$datas = $dataModel->find($id);

			$data = [
				'id' => $datas['id'],
				'nama' => $datas['nama'],
				'singkatan' => $datas['singkatan'],
			];

			$element = [
				'data' => view('back_content/master_pendidikan/form_edit', $data)
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
					'rules' => 'required|is_unique[master_pendidikan.nama]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_unique' => '{field} tidak boleh sama'
				]
				],
				'singkatan' => [
					'label' => 'Singkatan',
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
						'nama' => $validasi->getError('nama'),
						'singkatan' => $validasi->getError('singkatan')
					]
				];	
			}else {
				$id = $this->request->getVar('id');
				$simpanData =[
					'nama' => $this->request->getVar('nama'),
					'singkatan' => $this->request->getVar('singkatan')
				];

				$data = new Staf();

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
