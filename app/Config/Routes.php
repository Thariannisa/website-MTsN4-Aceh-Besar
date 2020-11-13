<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Beranda::index');
$routes->get('/visimisi', 'Beranda::visiMisi');
$routes->get('/struktursekolah', 'Beranda::strukturSekolah');
$routes->get('/tatatertib', 'Beranda::tataTertib');
$routes->get('/fasilitas', 'Fasilitas::user');
$routes->get('/karyawan', 'Karyawan::user');
$routes->get('/pengajar', 'Pengajar::user');
$routes->get('/organisasi', 'Organisasi::user');
$routes->get('/organisasi/detail/(:segment)', 'Organisasi::organisasiDetail/$1');
$routes->get('/prestasi', 'Prestasi::user');
$routes->get('/prestasi/detail/(:segment)', 'Prestasi::prestasiDetail/$1');
$routes->get('/berita', 'Beranda::berita');
$routes->get('/berita/detail/(:segment)', 'Beranda::beritaDetail/$1');
$routes->get('/pengumuman', 'Beranda::pengumuman');
$routes->get('/pengumuman/detail/(:segment)', 'Beranda::pengumumanDetail/$1');
$routes->post('/search', 'Beranda::search');
$routes->get('/galeri', 'Beranda::galeri');

$routes->group('admin', ['filter' => 'admin'],  function ($routes) {
	$routes->get('/', 'Admin::index');
	$routes->get('logout', 'Auth::logout');

	$routes->get('berita', 'Berita::index');
	$routes->get('berita/tambah', 'Berita::create');
	$routes->post('berita/tambah', 'Berita::store');
	$routes->get('berita/edit/(:segment)', 'Berita::edit/$1');
	$routes->post('berita/edit/(:segment)', 'Berita::update/$1');
	$routes->post('berita/hapus', 'Berita::delete');
	$routes->get('berita/detail/(:segment)', 'Berita::detail/$1');

	$routes->get('pengumuman', 'Pengumuman::index');
	$routes->get('pengumuman/tambah', 'Pengumuman::create');
	$routes->post('pengumuman/tambah', 'Pengumuman::store');
	$routes->get('pengumuman/edit/(:segment)', 'Pengumuman::edit/$1');
	$routes->post('pengumuman/edit/(:segment)', 'Pengumuman::update/$1');
	$routes->post('pengumuman/hapus', 'Pengumuman::delete');
	$routes->get('pengumuman/detail/(:segment)', 'Pengumuman::detail/$1');

	$routes->get('galeri', 'Galeri::index');
	$routes->get('galeri/tambah', 'Galeri::create');
	$routes->post('galeri/tambah', 'Galeri::store');
	$routes->get('galeri/edit/(:segment)', 'Galeri::edit/$1');
	$routes->post('galeri/edit/(:segment)', 'Galeri::update/$1');
	$routes->post('galeri/hapus', 'Galeri::delete');
	$routes->get('galeri/detail/(:segment)', 'Galeri::detail/$1');

	$routes->get('akademik/prestasi', 'Prestasi::index');
	$routes->get('akademik/prestasi/create', 'Prestasi::create');
	$routes->post('akademik/prestasi/create', 'Prestasi::store');
	$routes->get('akademik/prestasi/edit/(:segment)', 'Prestasi::edit/$1');
	$routes->post('akademik/prestasi/edit/(:segment)', 'Prestasi::update/$1');
	$routes->post('akademik/prestasi/delete', 'Prestasi::delete');
	$routes->get('akademik/prestasi/detail/(:segment)', 'Prestasi::detail/$1');

	$routes->get('akademik/organisasi', 'Organisasi::index');
	$routes->get('akademik/organisasi/create', 'Organisasi::create');
	$routes->post('akademik/organisasi/create', 'Organisasi::store');
	$routes->get('akademik/organisasi/edit/(:segment)', 'Organisasi::edit/$1');
	$routes->post('akademik/organisasi/edit/(:segment)', 'Organisasi::update/$1');
	$routes->post('akademik/organisasi/delete', 'Organisasi::delete');
	$routes->get('akademik/organisasi/detail/(:segment)', 'Organisasi::detail/$1');

	$routes->get('fasilitas', 'Fasilitas::index');
	$routes->get('fasilitas/create', 'Fasilitas::create');
	$routes->post('fasilitas/create', 'Fasilitas::store');
	$routes->get('fasilitas/edit/(:segment)', 'Fasilitas::edit/$1');
	$routes->post('fasilitas/edit/(:segment)', 'Fasilitas::update/$1');
	$routes->post('fasilitas/delete', 'Fasilitas::delete');
	$routes->get('fasilitas/detail/(:segment)', 'Fasilitas::detail/$1');

	$routes->get('staff/pengajar', 'Pengajar::index');
	$routes->post('staff/pengajar', 'Pengajar::store');
	$routes->get('staff/pengajar/create', 'Pengajar::create');
	$routes->get('staff/pengajar/edit/(:segment)', 'Pengajar::edit/$1');
	$routes->post('staff/pengajar/edit/(:segment)', 'Pengajar::update/$1');
	$routes->post('staff/pengajar/delete', 'Pengajar::delete');


	$routes->get('staff/karyawan', 'Karyawan::index');
	$routes->post('staff/karyawan', 'Karyawan::store');
	$routes->get('staff/karyawan/create', 'Karyawan::create');
	$routes->get('staff/karyawan/edit/(:segment)', 'Karyawan::edit/$1');
	$routes->post('staff/karyawan/edit/(:segment)', 'Karyawan::update/$1');
	$routes->post('staff/karyawan/delete', 'Karyawan::delete');

	$routes->get('profil', 'Admin::profilSekolah');
	$routes->get('profil/visimisi/(:segment)', 'Admin::visiMisiEdit/$1');
	$routes->post('profil/visimisi/(:segment)', 'Admin::visiMisiUpdate/$1');
	$routes->get('profil/struktur/(:segment)', 'Admin::strukturEdit/$1');
	$routes->post('profil/struktur/(:segment)', 'Admin::strukturUpdate/$1');
	$routes->get('profil/tatatertib/(:segment)', 'Admin::tataTertibEdit/$1');
	$routes->post('profil/tatatertib/(:segment)', 'Admin::tataTertibUpdate/$1');

	$routes->get('kontak', 'Admin::kontak');
});

$routes->group('auth', ['filter' => 'login'], function ($routes) {
	$routes->get('/', 'Auth::login');
	$routes->post('/', 'Auth::auth');
	// $routes->get('register', 'Auth::register');
	// $routes->post('register', 'Auth::addUser');
});

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
