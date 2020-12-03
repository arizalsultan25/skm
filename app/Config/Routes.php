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

	$routes->get('unitlayanan', 'Admin\UnitLayanan::index');
	$routes->get('unitlayanan/create', 'Admin\UnitLayanan::create');
	$routes->get('unitlayanan/update/(:num)', 'Admin\UnitLayanan::update/$1');
	$routes->delete('unitlayanan/(:num)', 'Admin\UnitLayanan::delete/$1');

	$routes->add('layanan', 'Admin\Layanan::index');
	$routes->add('layanan/create', 'Admin\Layanan::create');
	$routes->add('layanan/update/(:num)', 'Admin\Layanan::update/$1');
	$routes->delete('layanan/(:num)', 'Admin\Layanan::delete/$1');

	$routes->add('domainsurvei', 'Admin\DomainSurvei::index');
	$routes->add('domainsurvei/create', 'Admin\DomainSurvei::create');
	$routes->add('domainsurvei/update/(:num)', 'Admin\DomainSurvei::update/$1');
	$routes->delete('domainsurvei/(:num)', 'Admin\DomainSurvei::delete/$1');

	$routes->get('survei', 'Admin\Survei::index');
	$routes->get('survei/create', 'Admin\Survei::create');
	$routes->get('survei/update(:num)', 'Admin\Survei::update/$1');
	$routes->delete('survei/(:num)', 'Admin\Survei::delete/$1');

	$routes->get('referensiunsur', 'Admin\ReferensiUnsur::index');
	$routes->post('referensiunsur/create', 'Admin\ReferensiUnsur::create');
	$routes->add('referensiunsur/update/(:num)', 'Admin\ReferensiUnsur::update/$1');
	$routes->delete('referensiunsur/(:num)', 'Admin\ReferensiUnsur::delete/$1');

	$routes->get('pertanyaan', 'Admin\Pertanyaan::index');
	$routes->post('pertanyaan/create', 'Admin\Pertanyaan::create');
	$routes->post('pertanyaan/update/(:num)', 'Admin\Pertanyaan::update/$1');
	$routes->delete('pertanyaan/(:num)', 'Admin\Pertanyaan::delete/$1');

	$routes->get('jawaban', 'Admin\Jawaban::index');
	$routes->post('jawaban/create', 'Admin\Jawaban::create');
	$routes->post('jawaban/update/(:num)', 'Admin\Jawaban::update/$1');
	$routes->delete('jawaban/(:num)', 'Admin\Jawaban::delete/$1');

	$routes->get('unsur-survei', 'Admin\SurveiUnsur::index');
	$routes->post('unsur-survei/create', 'Admin\SurveiUnsur::create');
	$routes->add('unsur-survei/update/(:num)', 'Admin\SurveiUnsur::update/$1');
	$routes->delete('unsur-survei/(:num)', 'Admin\SurveiUnsur::delete/$1');
});


$routes->group('opd', function ($routes) {

	$routes->add('layanan', 'opd\Layanan::index');
	$routes->add('layanan/create', 'opd\Layanan::create');
	$routes->add('layanan/update/(:num)', 'opd\Layanan::update/$1');
	$routes->delete('layanan/(:num)', 'opd\Layanan::delete/$1');

	$routes->add('domainsurvei', 'opd\DomainSurvei::index');
	$routes->add('domainsurvei/create', 'opd\DomainSurvei::create');
	$routes->add('domainsurvei/update/(:num)', 'opd\DomainSurvei::update/$1');
	$routes->delete('domainsurvei/(:num)', 'opd\DomainSurvei::delete/$1');

	$routes->get('survei', 'opd\Survei::index');
	$routes->get('survei/create', 'opd\Survei::create');
	$routes->get('survei/update(:num)', 'opd\Survei::update/$1');
	$routes->delete('survei/(:num)', 'opd\Survei::delete/$1');

	$routes->get('referensiunsur', 'opd\ReferensiUnsur::index');
	$routes->post('referensiunsur/create', 'opd\ReferensiUnsur::create');
	$routes->add('referensiunsur/update/(:num)', 'opd\ReferensiUnsur::update/$1');
	$routes->delete('referensiunsur/(:num)', 'opd\ReferensiUnsur::delete/$1');

	$routes->get('pertanyaan', 'opd\Pertanyaan::index');
	$routes->post('pertanyaan/create', 'opd\Pertanyaan::create');
	$routes->post('pertanyaan/update/(:num)', 'opd\Pertanyaan::update/$1');
	$routes->delete('pertanyaan/(:num)', 'opd\Pertanyaan::delete/$1');

	$routes->get('jawaban', 'opd\Jawaban::index');
	$routes->post('jawaban/create', 'opd\Jawaban::create');
	$routes->post('jawaban/update/(:num)', 'opd\Jawaban::update/$1');
	$routes->delete('jawaban/(:num)', 'opd\Jawaban::delete/$1');

	$routes->get('unsur-survei', 'opd\SurveiUnsur::index');
	$routes->post('unsur-survei/create', 'opd\SurveiUnsur::create');
	$routes->add('unsur-survei/update/(:num)', 'opd\SurveiUnsur::update/$1');
	$routes->delete('unsur-survei/(:num)', 'Opd\SurveiUnsur::delete/$1');

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
