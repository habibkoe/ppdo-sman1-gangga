<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MasterJurusan;
use App\Models\ApplicationUser;
use App\Models\BerkasNilai;
use App\Models\BerkasUpload;
use App\Models\MasterAgama;
use App\Models\MasterPekerjaan;
use App\Models\MasterPendidikan;
use App\Models\OrangTua;
use App\Models\Role;
use App\Models\SekolahAsal;
use App\Models\Siswa;
use Config\Services;

class Register extends BaseController
{

	public function index()
	{
		return view('front_content/daftar');
	}

	public function save()
	{
		//set rules validation form
		$rules = [
			'username'          => 'required|min_length[3]|max_length[20]|is_unique[application_user.username]',
			'password'      => 'required|min_length[6]|max_length[200]',
			'confpassword'  => 'matches[password]'
		];

		if ($this->validate($rules)) {
			$model = new ApplicationUser();
			$data = [
				'username' => $this->request->getVar('username'),
				'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
				'role_id' => Role::SISWA,
				'is_aktif' => TRUE,
				'is_lengkap' => FALSE
			];
			$daftar = $model->save($data);

			// Ketika selesai daftar langsung masuk dashboard
			if ($daftar) {
				$ambilData = new ApplicationUser();
				$data = $ambilData->where('username', $this->request->getVar('username'))->first();

				$ses_data = [
					'user_id'       => $data['id'],
					'user_name'     => $data['username'],
					'logged_in'     => TRUE,
					'user_role'     => $data['role_id']
				];
				$session = session();
				$session->set($ses_data);
				return redirect()->to('/rahasia/lengkapi-pendaftaran');
			}
		} else {
			$data['validation'] = $this->validator;
			return view('front_content/daftar', $data);
		}
	}

	public function lengkapiPendaftaran()
	{
		// LOAD DATA MASTER
		$dataJurusan = new MasterJurusan();
		$dataAgama = new MasterAgama();
		$dataPekerjaan = new MasterPekerjaan();
		$dataPendidikan = new MasterPendidikan();

		// Ambil Data application User
		$applicationUser = new ApplicationUser();
		$dataUserSiswa = $applicationUser->find(session()->get('user_id'));

		// PARSING DATA MASTER KE ARRAY
		$data['master_jurusan'] = $dataJurusan->findAll();
		$data['master_agama'] = $dataAgama->findAll();
		$data['master_pekerjaan'] = $dataPekerjaan->findAll();
		$data['master_pendidikan'] = $dataPendidikan->findAll();

		// CEK DATA
		$modelSiswa = new Siswa();
		$modelOrangTua = new OrangTua();
		$modeBerkasNilai = new BerkasNilai();
		$dataSiswa = $modelSiswa->getDataJoin(session()->get('user_id'));


		// DEKLARASI VARIABLE ARRAY UNTUK DATA
		$dataOrangTua = [];
		$dataSekolah = [];
		$dataNilai = [];
		$dataBerkasPendukung = [];

		// CEK APAKAH DATA SISWA SUDAH DIISI, JIKA SUDAH MAKA AMBIL DATA BERIKUT
		if (count($dataSiswa) > 0) {
			$modeSekolahAsal = new SekolahAsal();
			$modeBerkasUpload = new BerkasUpload();

		}

		$data['is_lengkap'] = $dataUserSiswa['is_lengkap'];

		$data['session'] = session();
		return view('back_content/register/lengkapi_pendaftaran', $data);
	}

	// API
	public function simpanDataDiri()
	{
		if ($this->request->isAJAX()) {
			$validasi = Services::validation();
			$valid = $this->validate([
				'nik' => [
					'label' => 'Nik',
					'rules' => 'required|is_unique[siswa.nik]|min_length[16]|max_length[16]|numeric',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_unique' => '{field} tidak boleh sama',
						'min_length' => '{field} masih kurang, harus 16 karakter',
						'max_length' => '{field} terlalu banyak, harus 16 karakter',
						'numeric' => '{field} harus angka',
					]
				],
				'nama_awal' => [
					'label' => 'Nama awal',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'tanggal_lahir' => [
					'label' => 'Tanggal lahir',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				"pas_poto" => [
					"rules" => "uploaded[pas_poto]|max_size[pas_poto,1024]|is_image[pas_poto]|mime_in[pas_poto,image/jpg,image/jpeg,image/gif,image/png]",
					"label" => "Pas poto",
				],
				"agama" => [
					'label' => 'Agama',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				"jenis_kelamin" => [
					'label' => 'Jenis kelamin',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				"alamat" => [
					'label' => 'Alamat',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				"jurusan" => [
					'label' => 'Jurusan',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				"tempat_lahir" => [
					'label' => 'Tempat lahir',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				]
			]);

			if (!$valid) {
				$pesan = [
					'error' => [
						'nik' => $validasi->getError('nik'),
						'nama_awal' => $validasi->getError('nama_awal'),
						'tanggal_lahir' => $validasi->getError('tanggal_lahir'),
						'pas_poto' => $validasi->getError('pas_poto'),
						'jenis_kelamin' => $validasi->getError('jenis_kelamin'),
						'alamat' => $validasi->getError('alamat'),
						'tempat_lahir' => $validasi->getError('tempat_lahir'),
						'jurusan' => $validasi->getError('jurusan'),
						'agama' => $validasi->getError('agama'),
					]
				];
			} else {
				$generateNis = strtotime(date('Y/m/d H:i:s'));

				$file = $this->request->getFile('pas_poto');

				$profile_image = $file->getName();
				$nama_siswa = strtolower(str_replace(" ", "-", $this->request->getVar('nama_awal')));

				if ($profile_image != "") {
					// Renaming file before upload
					$temp = explode(".", $profile_image);
					$newfilename = $nama_siswa . round(microtime(true)) . '.' . end($temp);

					$file->move("uploads/siswa/", $newfilename);

					$imageWithDir = "uploads/siswa/" . $newfilename;
				} else {
					$imageWithDir = null;
				}

				$simpanData = [
					'nik' => $this->request->getVar('nik'),
					'nis' => $generateNis,
					'nama_awal' => $this->request->getVar('nama_awal'),
					'nama_akhir' => $this->request->getVar('nama_akhir'),
					'tempat_lahir' => $this->request->getVar('tempat_lahir'),
					'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
					'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
					'user_id' => session()->get('user_id'),
					'agama_id' => $this->request->getVar('agama'),
					'alamat' => $this->request->getVar('alamat'),
					'jurusan_id' => $this->request->getVar('jurusan'),
					'pas_poto' => $imageWithDir,
				];

				$data = new Siswa();

				$data->insert($simpanData);

				$pesan = [
					'berhasil' => 'Data berhasil disimpan',
					'user_id' => session()->get('user_id')
				];
			}

			echo json_encode($pesan);
		} else {
		}
	}

	public function getDataDiri($userId = null)
	{
		if ($userId == 0) {
			$dataJurusan = new MasterJurusan();
			$dataAgama = new MasterAgama();

			$data['data_siswa'] = [];
			$data['master_jurusan'] = $dataJurusan->findAll();
			$data['master_agama'] = $dataAgama->findAll();
		} else {
			$modelSiswa = new Siswa();
			$data['data_siswa'] = $modelSiswa->getDataJoin($userId);
		}

		return view('back_content/register/identitas_utama', $data);
	}


	// --------------------------------------------

	public function simpanOrangTuaWali()
	{
		if ($this->request->isAJAX()) {
			$validasi = Services::validation();

			$valid = $this->validate([
				'nik_ortu' => [
					'label' => 'Nik orang tua',
					'rules' => 'required|is_unique[orang_tua.nik]|min_length[16]|max_length[16]|numeric',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'min_length' => '{field} masih kurang, harus 16 karakter',
						'max_length' => '{field} terlalu banyak, harus 16 karakter',
						'is_unique' => '{field} tidak boleh sama'
					]
				],
				'nama_awal_ortu' => [
					'label' => 'Nama awal orang tua',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'status_ortu' => [
					'label' => 'Status orang tua',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'pekerjaan_ortu' => [
					'label' => 'Pekerjaan orang tua',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'pendidikan_ortu' => [
					'label' => 'Pendidikan orang tua',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'alamat_ortu' => [
					'label' => 'Alamat orang tua',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'agama_ortu' => [
					'label' => 'Agama orang tua',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'jenis_kelamin_ortu' => [
					'label' => 'Jenis kelamin orang tua',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				]
			]);

			if (!$valid) {
				$pesan = [
					'error' => [
						'nik_ortu' => $validasi->getError('nik_ortu'),
						'nama_awal_ortu' => $validasi->getError('nama_awal_ortu'),
						'status_ortu' => $validasi->getError('status_ortu'),
						'pekerjaan_ortu' => $validasi->getError('pekerjaan_ortu'),
						'pendidikan_ortu' => $validasi->getError('pendidikan_ortu'),
						'alamat_ortu' => $validasi->getError('alamat_ortu'),
						'agama_ortu' => $validasi->getError('agama_ortu'),
						'jenis_kelamin_ortu' => $validasi->getError('jenis_kelamin_ortu')
					]
				];
			} else {

				$modelSiswa = new Siswa();

				$getDataSiswa = $modelSiswa->where('user_id', session()->get('user_id'))->first();

				if (isset($getDataSiswa['id'])) {
					$simpanData = [
						'nik' => $this->request->getVar('nik_ortu'),
						'nama_awal' => $this->request->getVar('nama_awal_ortu'),
						'nama_akhir' => $this->request->getVar('nama_akhir_ortu'),
						'alamat' => $this->request->getVar('alamat_ortu'),
						'jenis_kelamin' => $this->request->getVar('jenis_kelamin_ortu'),
						'siswa_id' => $getDataSiswa['id'],
						'agama_id' => $this->request->getVar('agama_ortu'),
						'pendidikan_id' => $this->request->getVar('pendidikan_ortu'),
						'pekerjaan_id' => $this->request->getVar('pekerjaan_ortu'),
						'status' => $this->request->getVar('status_ortu')
					];

					$data = new OrangTua();

					$data->insert($simpanData);

					$pesan = [
						'berhasil' => 'Data berhasil disimpan',
						'siswa_id' => $getDataSiswa['id']
					];
				} else {
					$pesan = [
						'error' => [
							'data_siswa' => 'Mohon isi terlebih dahulu point pertama'
						]
					];
				}
			}

			echo json_encode($pesan);
		} else {
		}
	}

	public function getDataOrtu($siswaId, $addData = null)
	{

		if ($siswaId == 0) {
			$dataAgama = new MasterAgama();
			$dataPekerjaan = new MasterPekerjaan();
			$dataPendidikan = new MasterPendidikan();
			$modelOrangTua = new OrangTua();

			// PARSING DATA MASTER KE ARRAY
			$data['master_agama'] = $dataAgama->findAll();
			$data['master_pekerjaan'] = $dataPekerjaan->findAll();
			$data['master_pendidikan'] = $dataPendidikan->findAll();
			$data['data_orang_tua'] = [];
			$data['status'] = $modelOrangTua->status;
		} else {
			$modelOrangTua = new OrangTua();
			$dataOrangTua = $modelOrangTua->where('siswa_id', $siswaId)->findAll();

			// Ambil Data application User
			$applicationUser = new ApplicationUser();
			$dataUserSiswa = $applicationUser->find(session()->get('user_id'));

			$data['data_orang_tua'] = $dataOrangTua;
			$data['siswaId'] = $siswaId;
			$data['addData'] = $addData;
			$data['status'] = $modelOrangTua->status;
			$data['is_lengkap'] = $dataUserSiswa['is_lengkap'];

			if ($addData == 2) {
				// LOAD DATA MASTER
				$dataAgama = new MasterAgama();
				$dataPekerjaan = new MasterPekerjaan();
				$dataPendidikan = new MasterPendidikan();

				// PARSING DATA MASTER KE ARRAY
				$data['master_agama'] = $dataAgama->findAll();
				$data['master_pekerjaan'] = $dataPekerjaan->findAll();
				$data['master_pendidikan'] = $dataPendidikan->findAll();

				// Foreach data disini
				$arrOrtu = [];
				foreach ($dataOrangTua as $ortuTerpilih) {
					$arrOrtu[] = $ortuTerpilih['status'];
				}

				$data['ortu_terpilih'] = $arrOrtu;
			}
		}

		return view('back_content/register/identitas_orang_tua', $data);
	}

	// ---------------------------------

	public function simpanDataSekolah()
	{
		if ($this->request->isAJAX()) {
			$validasi = Services::validation();

			$valid = $this->validate([
				'no_ijazah_asal' => [
					'label' => 'Nomor ijazah',
					'rules' => 'required|is_unique[sekolah_asal.no_ijazah]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_unique' => '{field} tidak boleh sama'
					]
				],
				'nama_sekolah_asal' => [
					'label' => 'Nama sekolah',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				]

			]);

			if (!$valid) {
				$pesan = [
					'error' => [
						'no_ijazah' => $validasi->getError('no_ijazah_asal'),
						'nama_sekolah' => $validasi->getError('nama_sekolah_asal')
					]
				];
			} else {

				$modelSiswa = new Siswa();

				$getDataSiswa = $modelSiswa->where('user_id', session()->get('user_id'))->first();

				if (isset($getDataSiswa)) {
					$simpanData = [
						'no_ijazah' => $this->request->getVar('no_ijazah_asal'),
						'nama_sekolah' => $this->request->getVar('nama_sekolah_asal'),
						'alamat_sekolah' => $this->request->getVar('alamat_sekolah_asal'),
						'siswa_id' => $getDataSiswa['id']
					];

					$data = new SekolahAsal();

					$data->insert($simpanData);

					$pesan = [
						'berhasil' => 'Data berhasil disimpan',
						'siswa_id' => $getDataSiswa['id']
					];
				} else {
					$pesan = [
						'error' => [
							'data_siswa' => 'Mohon isi terlebih dahulu point pertama'
						]
					];
				}
			}

			echo json_encode($pesan);
		} else {
		}
	}

	public function getDataSekolahAsal($siswaId)
	{
		if($siswaId > 0) {
			$modeSekolahAsal = new SekolahAsal();
			$data['sekolah_asal'] = $modeSekolahAsal->where('siswa_id', $siswaId)->findAll();
		}else {
			$data['sekolah_asal'] = [];
		}
		

		return view('back_content/register/data_sekolah_asal', $data);
	}

	// ----------------------------------------

	public function simpanBerkasNilai()
	{
		if ($this->request->isAJAX()) {
			$validasi = Services::validation();

			$valid = $this->validate([
				'nama_mata_pelajaran' => [
					'label' => 'Mata pelajaran',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'nilai_mapel' => [
					'label' => 'Nilai UN',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				]

			]);

			if (!$valid) {
				$pesan = [
					'error' => [
						'mata_pelajaran' => $validasi->getError('nama_mata_pelajaran'),
						'nilai' => $validasi->getError('nilai_mapel')
					]
				];
			} else {

				$modelSiswa = new Siswa();

				$getDataSiswa = $modelSiswa->where('user_id', session()->get('user_id'))->first();

				if (isset($getDataSiswa)) {
					$simpanData = [
						'mata_pelajaran' => $this->request->getVar('nama_mata_pelajaran'),
						'nilai' => $this->request->getVar('nilai_mapel'),
						'siswa_id' => $getDataSiswa['id']
					];

					$data = new BerkasNilai();

					$data->insert($simpanData);

					$pesan = [
						'berhasil' => 'Data berhasil disimpan',
						'siswa_id' => $getDataSiswa['id']
					];
				} else {
					$pesan = [
						'error' => [
							'data_siswa' => 'Mohon isi terlebih dahulu point pertama'
						]
					];
				}
			}

			echo json_encode($pesan);
		} else {
		}
	}

	public function getDataNilai($siswaId, $addData = null)
	{

		if($siswaId > 0) {
			$modelBerkasNilai = new BerkasNilai();
			$data['mapel'] = $modelBerkasNilai->mapel;
			$data['berkas_nilai'] = [];
		}else {
			$modelBerkasNilai = new BerkasNilai();
			$berkasMapel = $modelBerkasNilai->where('siswa_id', $siswaId)->findAll();
	
			// Ambil Data application User
			$applicationUser = new ApplicationUser();
			$dataUserSiswa = $applicationUser->find(session()->get('user_id'));
	
			$data['berkas_nilai'] = $berkasMapel;
			$data['addData'] = $addData;
			$data['siswaId'] = $siswaId;
			$data['mapel'] = $modelBerkasNilai->mapel;
			$data['is_lengkap'] = $dataUserSiswa['is_lengkap'];
	
			// Foreach data disini
			$arrMapel = [];
			foreach ($berkasMapel as $mapel_terpilih) {
				$arrMapel[] = $mapel_terpilih['mata_pelajaran'];
			}
	
			$data['mapel_terpilih'] = $arrMapel;
		}
		

		return view('back_content/register/data_nilai', $data);
	}
	// ----------------------------------

	public function simpanDataPendukung()
	{
		if ($this->request->isAJAX()) {
			$validasi = Services::validation();
			$valid = $this->validate([
				'nama_berkas' => [
					'label' => 'Nama berkas',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				"upload_berkas" => [
					"rules" => "uploaded[upload_berkas]|max_size[upload_berkas,5024]|mime_in[upload_berkas,application/pdf]",
					"label" => "Dokumen upload",
				]
			]);

			if (!$valid) {
				$pesan = [
					'error' => [
						'nama_berkas' => $validasi->getError('nama_berkas'),
						'upload_berkas' => $validasi->getError('upload_berkas'),
					]
				];
			} else {

				$modelSiswa = new Siswa();

				$getDataSiswa = $modelSiswa->where('user_id', session()->get('user_id'))->first();

				if (isset($getDataSiswa)) {
					$file = $this->request->getFile('upload_berkas');

					$profile_image = $file->getName();

					if ($profile_image != "") {
						// Renaming file before upload
						$temp = explode(".", $profile_image);
						$newfilename = round(microtime(true)) . '.' . end($temp);

						$file->move("uploads/file/", $newfilename);

						$imageWithDir = "uploads/file/" . $newfilename;
					} else {
						$imageWithDir = null;
					}

					$simpanData = [
						'nama' => $this->request->getVar('nama_berkas'),
						'path' => $imageWithDir,
						'siswa_id' => $getDataSiswa['id']
					];

					$data = new BerkasUpload();

					$data->insert($simpanData);

					$pesan = [
						'berhasil' => 'Data berhasil disimpan',
						'siswa_id' => $getDataSiswa['id']
					];
				} else {
					$pesan = [
						'error' => [
							'data_siswa' => 'Mohon isi terlebih dahulu point pertama'
						]
					];
				}
			}

			echo json_encode($pesan);
		} else {
		}
	}

	public function getDataPendukung($siswaId, $addData = null)
	{

		if($siswaId > 0) {
			$data['berkas_pendukung'] = [];
		}else {
			$modeBerkasPendukung = new BerkasUpload();

			// Ambil Data application User
			$applicationUser = new ApplicationUser();
			$dataUserSiswa = $applicationUser->find(session()->get('user_id'));
	
			$data['siswaId'] = $siswaId;
			$data['addData'] = $addData;
			$data['is_lengkap'] = $dataUserSiswa['is_lengkap'];
			$data['berkas_pendukung'] = $modeBerkasPendukung->where('siswa_id', $siswaId)->findAll();
		}
		

		return view('back_content/register/data_pendukung', $data);
	}

	public function konfirmasiPendaftaran()
	{
		if ($this->request->isAJAX()) {
			$userId = $this->request->getVar('user_id');

			$applicationUser = new ApplicationUser();

			$update = [
				'is_lengkap' => true
			];

			$applicationUser->update($userId, $update);

			$pesan = [
				'berhasil' => 'Terimakasih telah mengirimkan formulir dan berkas pendaftaran anda, semoga beruntung'
			];

			echo json_encode($pesan);
		}
	}
}
