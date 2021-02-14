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
$routes->get('/', 'Home::index');
$routes->get('/website', 'Website::index');
$routes->get('/website/(:any)', 'Website::index/$1');

$routes->get('/layanan/(:any)', 'Layanan::index/$1');
$routes->get('/survei/(:any)', 'Survei::index/$1');
$routes->get('/pertanyaan/(:any)', 'Pertanyaan::index/$1');

// Website CRUD

// Unit Layanan CRUD
$routes->group('admin', function ($routes) {

	$routes->add('website', 'Admin\Website::index');
	$routes->add('website/create', 'Admin\Website::create');
	$routes->add('website/update/(:num)', 'Admin\Website::update/$1');
	$routes->delete('website/(:num)', 'Admin\Website::delete/$1');

	$routes->get('unitlayanan', 'Admin\Unitlayanan::index');
	$routes->get('unitlayanan/create', 'Admin\Unitlayanan::create');
	$routes->get('unitlayanan/update/(:num)', 'Admin\Unitlayanan::update/$1');
	$routes->delete('unitlayanan/(:num)', 'Admin\Unitlayanan::delete/$1');

	$routes->add('akunopd', 'Admin\Akunopd::index');
	$routes->add('akunopd/create', 'Admin\Akunopd::create');
	$routes->add('akunopd/update/(:num)', 'Admin\Akunopdn::update/$1');
	$routes->delete('akunopd/(:num)', 'Admin\Akunopd::delete/$1');

	$routes->add('layanan', 'Admin\Layanan::index');
	$routes->add('layanan/create', 'Admin\Layanan::create');
	$routes->add('layanan/update/(:num)', 'Admin\Layanan::update/$1');
	$routes->delete('layanan/(:num)', 'Admin\Layanan::delete/$1');

	$routes->add('domainsurvei', 'Admin\Domainsurvei::index');
	$routes->add('domainsurvei/create', 'Admin\Domainsurvei::create');
	$routes->add('domainsurvei/update/(:num)', 'Admin\Domainsurvei::update/$1');
	$routes->delete('domainsurvei/(:num)', 'Admin\Domainsurvei::delete/$1');

	$routes->get('survei', 'Admin\Survei::index');
	$routes->get('survei/create', 'Admin\Survei::create');
	$routes->get('survei/update(:num)', 'Admin\Survei::update/$1');
	$routes->delete('survei/(:num)', 'Admin\Survei::delete/$1');

	$routes->get('referensiunsur', 'Admin\Referensiunsur::index');
	$routes->post('referensiunsur/create', 'Admin\Referensiunsur::create');
	$routes->add('referensiunsur/update/(:num)', 'Admin\Referensiunsur::update/$1');
	$routes->delete('referensiunsur/(:num)', 'Admin\Referensiunsur::delete/$1');

	$routes->get('pertanyaan', 'Admin\Pertanyaan::index');
	$routes->post('pertanyaan/create', 'Admin\Pertanyaan::create');
	$routes->post('pertanyaan/update/(:num)', 'Admin\Pertanyaan::update/$1');
	$routes->delete('pertanyaan/(:num)', 'Admin\Pertanyaan::delete/$1');

	$routes->get('jawaban', 'Admin\Jawaban::index');
	$routes->post('jawaban/create', 'Admin\Jawaban::create');
	$routes->post('jawaban/update/(:num)', 'Admin\Jawaban::update/$1');
	$routes->delete('jawaban/(:num)', 'Admin\Jawaban::delete/$1');

	$routes->get('surveiunsur', 'Admin\Surveiunsur::index');
	$routes->post('surveiunsur/create', 'Admin\Surveiunsur::create');
	$routes->add('surveiunsur/update/(:num)', 'Admin\Surveiunsur::update/$1');
	$routes->delete('surveiunsur/(:num)', 'Admin\Surveiunsur::delete/$1');
});

//$routes->add('opd', 'Opd\Layanan::index');
$routes->group('opd', function ($routes) {

	$routes->add('layanan', 'Opd\Layanan::index');
	$routes->add('layanan/create', 'Opd\Layanan::create');
	$routes->add('layanan/update/(:num)', 'Opd\Layanan::update/$1');
	$routes->delete('layanan/(:num)', 'Opd\Layanan::delete/$1');

	$routes->add('domainsurvei', 'Opd\Domainsurvei::index');
	$routes->add('domainsurvei/create', 'Opd\Domainsurvei::create');
	$routes->add('domainsurvei/update/(:num)', 'Opd\Domainsurvei::update/$1');
	$routes->delete('domainsurvei/(:num)', 'Opd\Domainsurvei::delete/$1');

	$routes->get('survei', 'Opd\Survei::index');
	$routes->get('survei/create', 'Opd\Survei::create');
	$routes->get('survei/update(:num)', 'Opd\Survei::update/$1');
	$routes->delete('survei/(:num)', 'Opd\Survei::delete/$1');

	$routes->get('referensiunsur', 'Opd\Referensiunsur::index');
	$routes->post('referensiunsur/create', 'Opd\Referensiunsur::create');
	$routes->add('referensiunsur/update/(:num)', 'Opd\Referensiunsur::update/$1');
	$routes->delete('referensiunsur/(:num)', 'Opd\Referensiunsur::delete/$1');

	$routes->get('pertanyaan', 'Opd\Pertanyaan::index');
	$routes->post('pertanyaan/create', 'Opd\Pertanyaan::create');
	$routes->post('pertanyaan/update/(:num)', 'Opd\Pertanyaan::update/$1');
	$routes->delete('pertanyaan/(:num)', 'Opd\Pertanyaan::delete/$1');

	$routes->get('jawaban', 'Opd\Jawaban::index');
	$routes->post('jawaban/create', 'Opd\Jawaban::create');
	$routes->post('jawaban/update/(:num)', 'Opd\Jawaban::update/$1');
	$routes->delete('jawaban/(:num)', 'Opd\Jawaban::delete/$1');

	$routes->get('unsursurvei', 'Opd\Surveiunsur::index');
	$routes->post('unsursurvei/create', 'Opd\Surveiunsur::create');
	$routes->add('unsursurvei/update/(:num)', 'Opd\Surveiunsur::update/$1');
	$routes->delete('unsursurvei/(:num)', 'Opd\Surveiunsur::delete/$1');

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
