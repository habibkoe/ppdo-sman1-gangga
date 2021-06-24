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
		return view('front_content/index', $data);
	}
}
