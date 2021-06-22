<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Artikel as ModelsArtikel;
use Config\Services;

class Artikel extends BaseController
{

	private string $nama_halaman = "Artikel";

	public function index()
	{
		$session = session();

		$data['session'] = $session;
		$data['nama_halaman'] = $this->nama_halaman;
		return view('back_content/artikel/index', $data);
	}

	public function getData()
	{
		if($this->request->isAJAX()) {
			$dataModel = new ModelsArtikel();

			$status = [1 => 'Posting', 'Draft'];
			$kategori = [1 => 'Tentang', 'Cara Daftar', 'Jurusan', 'Ekstara Kulikuler'];


			$datas = [
				'datas' => $dataModel->findAll(),
				'status' => $status,
				'kategori' => $kategori
			];

			$pesan  = [
				'data' => view('back_content/artikel/data', $datas)
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
				'data' => view('back_content/artikel/form')
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
					'label' => 'Judul',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'kategori_id' => [
					'label' => 'Kategori',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'status' => [
					'label' => 'Status',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
			]);

			if(!$valid) {
				$pesan = [
					'error' => [
						'judul' => $validasi->getError('judul'),
						'kategori_id' => $validasi->getError('kategori_id'),
						'status' => $validasi->getError('status'),
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

				$data = new ModelsArtikel();

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

			$dataModel = new ModelsArtikel();

			$datas = $dataModel->find($id);

			$data = [
				'id' => $datas['id'],
				'judul' => $datas['judul'],
				'deskripsi' => $datas['deskripsi'],
				'status' => $datas['status'],
				'kategori_id' => $datas['kategori_id']
			];

			$element = [
				'data' => view('back_content/artikel/form_edit', $data)
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
				'judul' => [
					'label' => 'Judul',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'kategori_id' => [
					'label' => 'Kategori',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'status' => [
					'label' => 'Status',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
			]);

			if(!$valid) {
				$pesan = [
					'error' => [
						'judul' => $validasi->getError('judul'),
						'kategori_id' => $validasi->getError('kategori_id'),
						'status' => $validasi->getError('status'),
					]
				];	
			}else {
				$id = $this->request->getVar('id');
				$simpanData =[
					'judul' => $this->request->getVar('judul'),
					'deskripsi' => $this->request->getVar('deskripsi'),
					'kategori_id' => $this->request->getVar('kategori_id'),
					'status' => $this->request->getVar('status'),
					'user_id' => session()->get('user_id'),
				];

				$data = new ModelsArtikel();

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
