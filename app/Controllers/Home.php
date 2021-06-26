<?php

namespace App\Controllers;

use App\Models\Artikel;

class Home extends BaseController
{
	public function index()
	{
		$data['session'] = session();

		$artikel =  new Artikel();
		$data['panduans'] = $artikel->where('kategori_id', 2)->findAll();
		$data['ekskul'] = $artikel->where('kategori_id', 4)->findAll();
		$data['jurusan'] = $artikel->where('kategori_id', 3)->findAll();
		$data['master_sub'] = [1 => 'Olah Raga', 'Seni dan Musik', 'IT', 'Religi'];
		return view('front_content/index', $data);
	}
}
