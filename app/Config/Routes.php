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

	// lengkapi pendaftaran
	$routes->get('lengkapi-pendaftaran', 'Register::lengkapiPendaftaran');

	// API
	$routes->post('simpan-data-diri', 'Register::simpanDataDiri');
	$routes->post('simpan-orang-tua-wali', 'Register::simpanOrangTuaWali');
	$routes->post('simpan-data-sekolah', 'Register::simpanDataSekolah');
	$routes->post('simpan-berkas-nilai', 'Register::simpanBerkasNilai');
	$routes->post('simpan-data-pendukung', 'Register::simpanDataPendukung');

	// API Load Element
	$routes->get('get-element-data-diri', 'Register::getDataDiri');
	$routes->get('get-element-data-ortu/(:any)', 'Register::getDataOrtu/$1');
	$routes->get('get-element-data-sekolah-asal/(:any)', 'Register::getDataSekolahAsal/$1');
	$routes->get('get-element-data-nilai/(:any)', 'Register::getDataNilai/$1');
	$routes->get('get-element-data-pendukung/(:any)', 'Register::getDataPendukung/$1');

	$routes->post('konfirmasi-pendaftaran', 'Register::konfirmasiPendaftaran');

	// --------------------------------------------------------------

	// Route master
	$routes->get('master-pendidikan', 'Masterpendidikan::index');

	// API
	$routes->get('get-data-pendidikan', 'Masterpendidikan::getData');
	$routes->get('get-form-pendidikan', 'Masterpendidikan::getForm');
	$routes->post('simpan-data-pendidikan', 'Masterpendidikan::simpanData');
	$routes->get('get-form-edit-pendidikan/(:num)', 'Masterpendidikan::getFormEdit/$1');
	$routes->post('update-data-pendidikan', 'Masterpendidikan::updateData');

	// -------------------------------------------------------

	$routes->get('master-pekerjaan', 'Masterpekerjaan::index');

	// API
	$routes->get('get-data-pekerjaan', 'Masterpekerjaan::getData');
	$routes->get('get-form-pekerjaan', 'Masterpekerjaan::getForm');
	$routes->post('simpan-data-pekerjaan', 'Masterpekerjaan::simpanData');
	$routes->get('get-form-edit-pekerjaan/(:num)', 'Masterpekerjaan::getFormEdit/$1');
	$routes->post('update-data-pekerjaan', 'Masterpekerjaan::updateData');
	
	// -------------------------------------------------------------
	$routes->get('master-jurusan', 'Masterjurusan::index');

	// API
	$routes->get('get-data-jurusan', 'Masterjurusan::getData');
	$routes->get('get-form-jurusan', 'Masterjurusan::getForm');
	$routes->post('simpan-data-jurusan', 'Masterjurusan::simpanData');
	$routes->get('get-form-edit-jurusan/(:num)', 'Masterjurusan::getFormEdit/$1');
	$routes->post('update-data-jurusan', 'Masterjurusan::updateData');

	// ----------------------------------------------------
	$routes->get('master-jabatan', 'Masterjabatan::index');

	// API
	$routes->get('get-data-jabatan', 'Masterjabatan::getData');
	$routes->get('get-form-jabatan', 'Masterjabatan::getForm');
	$routes->post('simpan-data-jabatan', 'Masterjabatan::simpanData');
	$routes->get('get-form-edit-jabatan/(:num)', 'Masterjabatan::getFormEdit/$1');
	$routes->post('update-data-jabatan', 'Masterjabatan::updateData');
	$routes->delete('hapus-jabatan', 'Masterjabatan::hapusData');

	// ---------------------------------------------------
	$routes->get('master-agama', 'Masteragama::index');

	// API
	$routes->get('get-data-agama', 'Masteragama::getData');
	$routes->get('get-form-agama', 'Masteragama::getForm');
	$routes->post('simpan-data-agama', 'Masteragama::simpanData');
	$routes->get('get-form-edit-agama/(:num)', 'Masteragama::getFormEdit/$1');
	$routes->post('update-data-agama', 'Masteragama::updateData');

	// ---------------------------------------------------
	$routes->get('master-kelas', 'Masterkelas::index');

	// API
	$routes->get('get-data-kelas', 'Masterkelas::getData');
	$routes->get('get-form-kelas', 'Masterkelas::getForm');
	$routes->post('simpan-data-kelas', 'Masterkelas::simpanData');
	$routes->get('get-form-edit-kelas/(:num)', 'Masterkelas::getFormEdit/$1');
	$routes->post('update-data-kelas', 'Masterkelas::updateData');

	// ------------------------------------------
	$routes->get('artikel', 'Artikel::index');

	// API
	$routes->get('get-data-artikel', 'Artikel::getData');
	$routes->get('get-form-artikel', 'Artikel::getForm');
	$routes->post('simpan-data-artikel', 'Artikel::simpanData');
	$routes->get('get-form-edit-artikel/(:num)', 'Artikel::getFormEdit/$1');
	$routes->post('update-data-artikel', 'Artikel::updateData');

	// --------------------------------------------
	$routes->get('manajemen-staf', 'Manajemenstaf::index');

	// API
	$routes->get('get-data-staf', 'Manajemenstaf::getData');
	$routes->get('get-form-staf', 'Manajemenstaf::getForm');
	$routes->post('simpan-data-staf', 'Manajemenstaf::simpanData');
	$routes->get('get-form-edit-staf/(:num)', 'Manajemenstaf::getFormEdit/$1');
	$routes->post('update-data-staf', 'Manajemenstaf::updateData');

	$routes->post('daftar-login-staf', 'Manajemenstaf::daftarLoginStaf');

	// -------------------------------------------
	$routes->get('manajemen-siswa', 'Manajemensiswa::index');

	// API
	$routes->get('get-data-siswa', 'Manajemensiswa::getData');
	$routes->get('get-data-siswa-ditolak', 'Manajemensiswa::getDataDitolak');
	$routes->post('tolak-or-terima-siswa', 'Manajemensiswa::tolakOrTerimaSiswa');

	// -------------------------------------------
	$routes->get('manajemen-kelas', 'Manajemenkelas::index');
	$routes->get('get-form-tambah-siswa/(:num)', 'Manajemenkelas::getForm/$1');
	$routes->get('get-show-siswa/(:num)', 'Manajemenkelas::getShowSiswa/$1');
	$routes->post('simpan-data-siswa-kelas', 'Manajemenkelas::simpanData');

	// API
	$routes->get('get-data-kelas', 'Manajemenkelas::getData');
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
