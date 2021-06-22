<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ApplicationUser;
use App\Models\MasterAgama;
use App\Models\MasterJabatan;
use App\Models\MasterPendidikan;
use App\Models\Role;
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

			$masterRole = new Role;
			$masterAgama = new MasterAgama();
			$masterPendidikan = new MasterPendidikan();
			$masterJabatan = new MasterJabatan();
			$data['role'] = $masterRole->findAll();
			$data['agama'] = $masterAgama->findAll();
			$data['pendidikan'] = $masterPendidikan->findAll();
			$data['jabatan'] = $masterJabatan->findAll();

			$element = [
				'data' => view('back_content/manajemen_staf/form', $data)
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
				'nik' => [
					'label' => 'Nik',
					'rules' => 'required|is_unique[staf.nik]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_unique' => '{field} tidak boleh sama'
					]
				],
				'nama_awal' => [
					'label' => 'Nama awal',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'tanggal_lahir' => [
					'label' => 'Tanggal lahir',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'jenis_kelamin' => [
					'label' => 'Jenis kelamin',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'agama_id' => [
					'label' => 'Agama',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'pendidikan_id' => [
					'label' => 'Pendidikan',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],
				'jabatan_id' => [
					'label' => 'Jabatan',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				],			
			]);

			if(!$valid) {
				$pesan = [
					'error' => [
						'nik' => $validasi->getError('nik'),
						'nama_awal' => $validasi->getError('nama_awal'),
						'tanggal_lahir' => $validasi->getError('tanggal_lahir'),
						'jenis_kelamin' => $validasi->getError('jenis_kelamin'),
						'agama_id' => $validasi->getError('agama_id'),
						'pendidikan_id' => $validasi->getError('pendidikan_id'),
						'jabatan_id' => $validasi->getError('jabatan_id'),
					]
				];	
			}else {
				$simpanData =[
					'nip' => $this->request->getVar('nip'),
					'nik' => $this->request->getVar('nik'),
					'nama_awal' => $this->request->getVar('nama_awal'),
					'nama_akhir' => $this->request->getVar('nama_akhir'),
					'tempat_lahir' => $this->request->getVar('tempat_lahir'),
					'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
					'alamat' => $this->request->getVar('alamat'),
					'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
					'agama_id' => $this->request->getVar('agama_id'),
					'pendidikan_id' => $this->request->getVar('pendidikan_id'),
					'jabatan_id' => $this->request->getVar('jabatan_id'),
					'user_id' => session()->get('user_id_daftar'),
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

	public function daftarLoginStaf()
	{
		if($this->request->isAJAX()) {
			$validasi = Services::validation();

			$valid = $this->validate([
				'username' => [
					'label' => 'Username',
					'rules' => 'required|min_length[3]|max_length[20]|is_unique[application_user.username]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'min_length' => '{field} terlalu pendek',
						'max_length' => '{field} terlalu panjang',
						'is_unique' => '{field} tidak boleh sama'
					]
				],
				'password' => [
					'label' => 'Password',
					'rules' => 'required|min_length[6]|max_length[200]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'min_length' => '{field} terlalu pendek',
						'max_length' => '{field} terlalu panjang',
					]
				],
				'confpassword' => [
					'label' => 'Konfirmasi password',
					'rules' => 'matches[password]',
					'errors' => [
						'matches' => '{field} harus sama dengan pasword',
					]
				],
				'role' => [
					'label' => 'Role',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				]
			]);

			if(!$valid) {
				$pesan = [
					'error' => [
						'username' => $validasi->getError('username'),
						'password' => $validasi->getError('password'),
						'confpassword' => $validasi->getError('confpassword'),
						'role' => $validasi->getError('role'),
					]
				];	
			}else {
				$simpanData =[
					'username' => $this->request->getVar('username'),
					'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
					'role_id' => $this->request->getVar('role'),
					'is_aktif' => TRUE,
					'is_lengkap' => FALSE
				];

				$data = new ApplicationUser();
				$data->insert($simpanData);

				// ambil id user yang barusan di insert
				$ambilData = $data->where('username', $this->request->getVar('username'))->first();

				// Simpan sementara id user ke session untuk digunakan pada saat isi daftar staf
				$ses_data = [
                    'user_id_daftar' => $ambilData['id'],
                ];
                $session = session();
                $session->set($ses_data);

				$pesan = [
					'berhasil' => 'Data berhasil disimpan'
				];
			}

			echo json_encode($pesan);
		} else {

		}
	}
}
