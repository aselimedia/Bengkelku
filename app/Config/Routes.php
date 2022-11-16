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


// ------------------------------------Users------------------------------------

$routes->get('/', 'Users::index');
$routes->get('/logout', 'Users::logout');
$routes->get('/home/review/(:segment)', 'Users::review/$1');
$routes->get('/home/detail/(:segment)', 'Users::detail/$1');
$routes->get('/selesai/(:segment)', 'Users::selesai/$1');
$routes->get('/canceled/(:segment)', 'Users::canceled/$1');
$routes->get('/home/pemesanan/(:segment)', 'Users::pemesanan/$1');
$routes->match(['get', 'post'], '/profile', 'Users::profile', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/save', 'Users::save');
$routes->match(['get', 'post'], '/pesan', 'Users::pesan');
$routes->match(['get', 'post'], '/update', 'Users::update');
$routes->match(['get', 'post'], '/ulasan', 'Users::ulasan');
$routes->match(['get', 'post'], '/login', 'Users::login');
$routes->match(['get', 'post'], '/register', 'Users::register');
$routes->match(['get', 'post'], '/active', 'Users::active');
$routes->match(['get', 'post'], '/forget/change', 'Users::change');
$routes->match(['get', 'post'], '/login/forget', 'Users::forget');
$routes->match(['get', 'post'], '/login/forget/success', 'Users::sforget');

// ------------------------------------Admin------------------------------------

$routes->get('/admin', 'Admin::index', ['filter' => 'authadmin']);
$routes->get('/admin/logout', 'Admin::adminlogout', ['filter' => 'authadmin']);
$routes->get('/admin/bengkel', 'Admin::bengkel', ['filter' => 'authadmin']);
$routes->get('/admin/bengkel/edit/(:segment)', 'Admin::edit/$1', ['filter' => 'authadmin']);
$routes->delete('/admin/bengkel/delete/(:num)', 'Admin::delete/$1', ['filter' => 'authadmin']);
$routes->get('/admin/bengkel/(:any)', 'Admin::detail/$1', ['filter' => 'authadmin']);
$routes->get('/admin/customer', 'Admin::users', ['filter' => 'authadmin']);
$routes->get('/admin/customer/edit/(:segment)', 'Admin::edituser/$1', ['filter' => 'authadmin']);
$routes->get('/admin/customer/(:any)', 'Admin::customer/$1', ['filter' => 'authadmin']);
$routes->delete('/admin/customer/delete/(:num)', 'Admin::deleteuser/$1', ['filter' => 'authadmin']);
$routes->match(['get', 'post'], '/admin/login', 'Admin::login');
$routes->get('/admin/visitor', 'Admin::visitor', ['filter' => 'authadmin']);

// ------------------------------------Bengkel------------------------------------

$routes->get('/bengkel', 'Pages::profil', ['filter' => 'authbengkel']);
$routes->get('/Pages/(:segment)', 'Pages::detail/$1', ['filter' => 'authbengkel']);
$routes->get('/Pages/detailonline/(:segment)', 'Pages::detailonline/$1', ['filter' => 'authbengkel']);
$routes->get('/bengkel/logout', 'Pages::bengkellogout', ['filter' => 'authbengkel']);
$routes->match(['get', 'post'], '/bengkel/login', 'Pages::login');
$routes->match(['get', 'post'], '/bengkel/register', 'Pages::register');
$routes->match(['get', 'post'], '/bengkel/update', 'Pages::update');
$routes->match(['get', 'post'], '/bengkel/save', 'Pages::save');
$routes->match(['get', 'post'], '/bengkel/active', 'Pages::active');
$routes->match(['get', 'post'], '/bengkel/forget/change', 'Pages::bengkelchange');
$routes->match(['get', 'post'], '/bengkel/login/forget', 'Pages::bengkelforget');
$routes->match(['get', 'post'], '/bengkel/login/forget/success', 'Pages::sforget');

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
