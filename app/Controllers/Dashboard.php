<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index()
	{

		$session = session();

		$data['session'] = $session;
		return view('back_content/index', $data);
	}
}
