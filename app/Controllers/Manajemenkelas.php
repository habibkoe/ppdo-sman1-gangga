<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kelas;

class Manajemenkelas extends BaseController
{
	private string $nama_halaman = "Manajemen Kelas";

	public function index()
	{
		$session = session();

		$dataMasterKelas = new Kelas();

		$data['session'] = $session;
		$data['nama_halaman'] = $this->nama_halaman;
		$data['master_kelas'] = $dataMasterKelas->findAll();
		
		return view('back_content/manajemen_kelas/index', $data);
	}
}
