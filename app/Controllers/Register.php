<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MasterJurusan;
use App\Models\ApplicationUser;
use App\Models\MasterAgama;
use App\Models\MasterPekerjaan;
use App\Models\MasterPendidikan;
use App\Models\Role;

class Register extends BaseController
{

	public function index()
	{
		return view('front_content/daftar');
	}

	public function save()
	{
		//include helper form
        helper(['form']);
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
        $dataJurusan = new MasterJurusan();
        $dataAgama = new MasterAgama();
        $dataPekerjaan = new MasterPekerjaan();
        $dataPendidikan = new MasterPendidikan();

        $data['master_jurusan'] = $dataJurusan->findAll();
        $data['master_agama'] = $dataAgama->findAll();    
        $data['master_pekerjaan'] = $dataPekerjaan->findAll();
        $data['master_pendidikan'] = $dataPendidikan->findAll();
		$data['session'] = session();
        return view('back_content/lengkapi_pendaftaran', $data);
    }
}
