<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ApplicationUser;

class Login extends BaseController
{
	public function index()
	{
		return view('back_content/masuk');
	}

	public function auth()
    {
        $session = session();
        $model = new ApplicationUser();
        
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $model->where('username', $username)->first();

        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'user_id'       => $data['id'],
                    'user_name'     => $data['username'],
                    'logged_in'     => TRUE,
                    'user_role'     => $data['role_id']
                ];
                $session->set($ses_data);

                // Jika siswa telah mengisi semua data maka masuk ke halaman dashboard
                if($data['is_lengkap'] || $data['role_id'] != 3) {
                    return redirect()->to('/rahasia/dashboard');

                // jika belum lengkap masuk ke halaman lengkapi data
                }else {
                    return redirect()->to('/rahasia/lengkapi-pendaftaran');
                }
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/masuk');
            }
        }else{
            $session->setFlashdata('msg', 'User tidak ditemukan');
            return redirect()->to('/masuk');
        }
    }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}