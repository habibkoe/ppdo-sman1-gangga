<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/daftar', 'Register::index');
$routes->post('/post-daftar', 'Register::save');

// BACK
$routes->get('/masuk', 'Login::index');
$routes->post('/post-masuk', 'Login::auth');

$routes->get('/keluar', 'Login::logout');

$routes->group('rahasia', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Dashboard::index');
	$routes->get('lengkapi-pendaftaran', 'Register::lengkapiPendaftaran');

	// Route master
	$routes->get('master-pendidikan', 'Masterpendidikan::index');

	// API
	$routes->get('get-data-pendidikan', 'Masterpendidikan::getDataPendidikan');
	$routes->get('get-form-pendidikan', 'Masterpendidikan::getFormPendidikan');
	$routes->post('simpan-data-pendidikan', 'Masterpendidikan::simpanDataPendidikan');

	$routes->get('master-pekerjaan', 'Masterpekerjaan::index');

	// API
	$routes->get('get-data-pekerjaan', 'Masterpekerjaan::getDataPekerjaan');

	$routes->get('master-jurusan', 'Masterjurusan::index');

	// API
	$routes->get('get-data-jurusan', 'Masterjurusan::getDataJurusan');

	$routes->get('master-jabatan', 'Masterjabatan::index');

	// API
	$routes->get('get-data-jabatan', 'Masterjabatan::getDataJabatan');

	$routes->get('master-agama', 'Masteragama::index');

	// API
	$routes->get('get-data-agama', 'Masteragama::getDataAgama');

	// ------------------------------------------
	$routes->get('artikel', 'Artikel::index');
	$routes->get('manajemen-staf', 'Manajemenstaf::index');


});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
