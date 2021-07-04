<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MasterJurusan as ModelsMasterJurusan;
use Config\Services;

class Masterjurusan extends BaseController
{
	private string $nama_halaman = "Master Jurusan";

	public function index()
	{
		$session = session();

		$data['session'] = $session;
		$data['nama_halaman'] = $this->nama_halaman;
		return view('back_content/master_jurusan/index', $data);
	}

	public function getData()
	{
		if ($this->request->isAJAX()) {
			$dataModel = new ModelsMasterJurusan();

			$datas = [
				'datas' => $dataModel->findAll()
			];

			$pesan  = [
				'data' => view('back_content/master_jurusan/data', $datas)
			];

			echo json_encode($pesan);
		} else {
			exit('Maaf tidak dapat di proses');
		}
	}

	public function getForm()
	{
		if ($this->request->isAJAX()) {
			$element = [
				'data' => view('back_content/master_jurusan/form')
			];

			echo json_encode($element);
		} else {
			exit('Maaf tidak dapa di proses');
		}
	}

	public function simpanData()
	{
		if ($this->request->isAJAX()) {
			$validasi = Services::validation();

			$valid = $this->validate([
				'nama' => [
					'label' => 'Nama',
					'rules' => 'required|is_unique[master_jurusan.nama]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_unique' => '{field} tidak boleh sama'
					]
				],

				'singkatan' => [
					'label' => 'Singkatan',
					'rules' => 'required|is_unique[master_jurusan.singkatan]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_unique' => '{field} tidak boleh sama'
					]
				],
			]);

			if (!$valid) {
				$pesan = [
					'error' => [
						'nama' => $validasi->getError('nama'),
						'singkatan' => $validasi->getError('singkatan'),
					]
				];
			} else {
				$simpanData = [
					'nama' => $this->request->getVar('nama'),
					'singkatan' => $this->request->getVar('singkatan'),
				];

				$data = new ModelsMasterJurusan();

				$data->insert($simpanData);

				$pesan = [
					'berhasil' => 'Data berhasil disimpan'
				];
			}

			echo json_encode($pesan);
		} else {
		}
	}

	public function getFormEdit($id)
	{
		if ($this->request->isAJAX()) {

			$dataModel = new ModelsMasterJurusan();

			$datas = $dataModel->find($id);

			$data = [
				'id' => $datas['id'],
				'nama' => $datas['nama'],
				'singkatan' => $datas['singkatan'],
			];

			$element = [
				'data' => view('back_content/master_jurusan/form_edit', $data)
			];

			echo json_encode($element);
		} else {
			exit('Maaf tidak dapa di proses');
		}
	}

	public function updateData()
	{
		if ($this->request->isAJAX()) {
			$id = $this->request->getVar('id');
			$simpanData = [
				'nama' => $this->request->getVar('nama'),
				'singkatan' => $this->request->getVar('singkatan'),
			];

			$data = new ModelsMasterJurusan();

			$data->update($id, $simpanData);

			$pesan = [
				'berhasil' => 'Data berhasil diupdate'
			];

			echo json_encode($pesan);
		} else {
		}
	}
}
