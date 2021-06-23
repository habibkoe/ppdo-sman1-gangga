<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kelas as ModelsKelas;
use App\Models\MasterJabatan;
use App\Models\Staf;
use Config\Services;

class Masterkelas extends BaseController
{

	private string $nama_halaman = "Master Kelas";

	public function index()
	{
		$session = session();
		$data['session'] = $session;
		$data['nama_halaman'] = $this->nama_halaman;
		return view('back_content/master_kelas/index', $data);
	}

	public function getData()
	{
		if($this->request->isAJAX()) {
			$dataModel = new ModelsKelas();

			$datas = [
				'datas' => $dataModel->findAll()
			];

			$pesan  = [
				'data' => view('back_content/master_kelas/data', $datas)
			];

			echo json_encode($pesan);

		}else {
			exit('Maaf tidak dapat di proses');
		}
	}

	public function getForm()
	{
		if($this->request->isAJAX()) {

			$dataStaf = new Staf();

			$data['wali_kelas'] = $dataStaf->where('jabatan_id', MasterJabatan::GURU_WALI_KELAS)->findAll();

			$element = [
				'data' => view('back_content/master_kelas/form', $data)
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
					'rules' => 'required|is_unique[kelas.nama]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_unique' => '{field} tidak boleh sama'
					]
				],
				'lokasi' => [
					'label' => 'Lokasi',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'daya_tampung' => [
					'label' => 'Daya tampung',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'wali_kelas_id' => [
					'label' => 'Wali kelas',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
			]);

			if(!$valid) {
				$pesan = [
					'error' => [
						'nama' => $validasi->getError('nama'),
						'lokasi' => $validasi->getError('lokasi'),
						'daya_tampung' => $validasi->getError('daya_tampung'),
						'wali_kelas_id' => $validasi->getError('wali_kelas_id'),
					]
				];	
			}else {
				$simpanData =[
					'nama' => $this->request->getVar('nama'),
					'lokasi' => $this->request->getVar('lokasi'),
					'daya_tampung' => $this->request->getVar('daya_tampung'),
					'inventaris' => $this->request->getVar('inventaris'),
					'wali_kelas_id' => $this->request->getVar('wali_kelas_id'),
				];

				$data = new ModelsKelas();

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

			$dataModel = new ModelsKelas();

			$datas = $dataModel->find($id);

			$data = [
				'id' => $datas['id'],
				'nama' => $datas['nama'],
				'lokasi' => $datas['lokasi'],
				'daya_tampung' => $datas['daya_tampung'],
				'inventaris' => $datas['inventaris'],
				'wali_kelas_id' => $datas['wali_kelas_id'],
			];

			$element = [
				'data' => view('back_content/master_kelas/form_edit', $data)
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
					'rules' => 'required|is_unique[kelas.nama]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_unique' => '{field} tidak boleh sama'
					]
				],
				'lokasi' => [
					'label' => 'Lokasi',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'daya_tampung' => [
					'label' => 'Daya tampung',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'wali_kelas_id' => [
					'label' => 'Wali kelas',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
			]);

			if(!$valid) {
				$pesan = [
					'error' => [
						'nama' => $validasi->getError('nama'),
						'lokasi' => $validasi->getError('lokasi'),
						'daya_tampung' => $validasi->getError('daya_tampung'),
						'wali_kelas_id' => $validasi->getError('wali_kelas_id'),
					]
				];	
			}else {
				$id = $this->request->getVar('id');
				$simpanData =[
					'nama' => $this->request->getVar('nama'),
					'lokasi' => $this->request->getVar('lokasi'),
					'daya_tampung' => $this->request->getVar('daya_tampung'),
					'inventaris' => $this->request->getVar('inventaris'),
					'wali_Kelas_id' => $this->request->getVar('wali_kelas_id'),
				];

				$data = new ModelsKelas();

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
