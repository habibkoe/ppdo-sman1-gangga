<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MasterAgama as ModelsMasterAgama;
use Config\Services;

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

	public function getData()
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

	public function getForm()
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

	public function simpanData()
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

				$data = new ModelsMasterAgama();

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

			$dataModel = new ModelsMasterAgama();

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

				$data = new ModelsMasterAgama();

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
