<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MasterJurusan;
use App\Models\ApplicationUser;
use App\Models\BerkasNilai;
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
         
        if($this->validate($rules)){
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
            if($daftar) {
                $ambilData = new ApplicationUser();
                $data = $ambilData->where('username',$this->request->getVar('username'))->first();

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
        }else{
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

		// PARSING DATA MASTER KE ARRAY
		$data['master_jurusan'] = $dataJurusan->findAll();
        $data['master_agama'] = $dataAgama->findAll();    
        $data['master_pekerjaan'] = $dataPekerjaan->findAll();
        $data['master_pendidikan'] = $dataPendidikan->findAll();

		// CEK DATA
		$modelSiswa = new Siswa();
		$dataSiswa = $modelSiswa->getDataJoin(session()->get('user_id'));
		

		// DEKLARASI VARIABLE ARRAY UNTUK DATA
		$dataOrangTua = [];
		$dataSekolah = [];
		$dataNilai = [];

		// CEK APAKAH DATA SISWA SUDAH DIISI, JIKA SUDAH MAKA AMBIL DATA BERIKUT
		if(count($dataSiswa) > 0) {
			$modeOrangTua = new OrangTua();
			$modeSekolahAsal = new SekolahAsal();
			$modeBerkasNilai = new BerkasNilai();

			$dataOrangTua = $modeOrangTua->where('siswa_id', $dataSiswa['id'])->findAll();
			$dataSekolah = $modeSekolahAsal->where('siswa_id', $dataSiswa['id'])->findAll();
			$dataNilai = $modeBerkasNilai->where('siswa_id', $dataSiswa['id'])->findAll();
		}

		$data['data_siswa'] = $dataSiswa;
		$data['data_orang_tua'] = $dataOrangTua;
		$data['sekolah_asal'] = $dataSekolah;
		$data['berkas_nilai'] = $dataNilai;

		$data['session'] = session();
        return view('back_content/register/lengkapi_pendaftaran', $data);
    }

    // API
    public function simpanDataDiri() 
    {
        if($this->request->isAJAX()) {
            $validasi = Services::validation();

			$valid = $this->validate([
				'nik' => [
					'label' => 'Nik',
					'rules' => 'required|is_unique[siswa.nik]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_unique' => '{field} tidak boleh sama'
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
                
			]);

			if(!$valid) {
				$pesan = [
					'error' => [
						'nik' => $validasi->getError('nik'),
						'nama_awal' => $validasi->getError('nama_awal'),
						'tanggal_lahir' => $validasi->getError('tanggal_lahir'),
					]
				];	
			}else {
                $generateNis = strtotime(date('Y/m/d H:i:s'));


				$simpanData =[
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
					'jurusan_id' => $this->request->getVar('jurusan')
				];

				$data = new Siswa();

				$data->insert($simpanData);

				$pesan = [
					'berhasil' => 'Data berhasil disimpan',
					'user_id' => session()->get('user_id')
				];
			}

			echo json_encode($pesan);
        }else {

        }
    }

	public function getDataDiri($userId) 
    {
		// CEK DATA
		$modelSiswa = new Siswa();
		$data['data_siswa'] = $modelSiswa->getDataJoin($userId);
        return view('back_content/register/identitas_utama', $data);
    }


	// --------------------------------------------

    public function simpanOrangTuaWali() 
    {
        if($this->request->isAJAX()) {
            $validasi = Services::validation();

			$valid = $this->validate([
				'nik_ortu' => [
					'label' => 'Nik orang tua',
					'rules' => 'required|is_unique[orang_tua.nik]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_unique' => '{field} tidak boleh sama'
					]
                ],
                'nama_awal_ortu' => [
					'label' => 'Nama awal orang tua',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
                ]
                
			]);

			if(!$valid) {
				$pesan = [
					'error' => [
						'nik_ortu' => $validasi->getError('nik_ortu'),
						'nama_awal_ortu' => $validasi->getError('nama_awal_ortu')
					]
				];	
			}else {

                $modelSiswa = new Siswa();

                $getDataSiswa = $modelSiswa->where('user_id', session()->get('user_id'))->first();

				$simpanData =[
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
			}

			echo json_encode($pesan);
        }else {
            
        }
    }

	public function getDataOrtu($siswaId) 
    {
		$modeOrangTua = new OrangTua();
		$data['data_orang_tua'] = $modeOrangTua->where('siswa_id', $siswaId)->findAll();

        return view('back_content/register/identitas_orang_tua', $data);
    }

	// ---------------------------------

    public function simpanDataSekolah()
    {
        if($this->request->isAJAX()) {
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

			if(!$valid) {
				$pesan = [
					'error' => [
						'no_ijazah' => $validasi->getError('no_ijazah_asal'),
						'nama_sekolah' => $validasi->getError('nama_sekolah_asal')
					]
				];	
			}else {

                $modelSiswa = new Siswa();

                $getDataSiswa = $modelSiswa->where('user_id', session()->get('user_id'))->first();

				$simpanData =[
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
			}

			echo json_encode($pesan);
        }else {
            
        }
    }

	public function getDataSekolahAsal($siswaId) 
    {
		$modeSekolahAsal = new SekolahAsal();
		$data['sekolah_asal'] = $modeSekolahAsal->where('siswa_id', $siswaId)->findAll();

        return view('back_content/register/data_sekolah_asal', $data);
    }

	// ----------------------------------------

    public function simpanBerkasNilai()
    {
        if($this->request->isAJAX()) {
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

			if(!$valid) {
				$pesan = [
					'error' => [
						'mata_pelajaran' => $validasi->getError('nama_mata_pelajaran'),
						'nilai' => $validasi->getError('nilai_mapel')
					]
				];	
			}else {

                $modelSiswa = new Siswa();

                $getDataSiswa = $modelSiswa->where('user_id', session()->get('user_id'))->first();

				$simpanData =[
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
			}

			echo json_encode($pesan);
        }else {
            
        }
    }

	public function getDataNilai($siswaId) 
    {
		$modeBerkasNilai = new BerkasNilai();
		$data['berkas_nilai'] = $modeBerkasNilai->where('siswa_id', $siswaId)->findAll();

        return view('back_content/register/data_nilai', $data);
    }
	// ----------------------------------

    public function simpanDataPendukung()
    {
        if($this->request->isAJAX()) {

        }else {
            
        }
    }
}