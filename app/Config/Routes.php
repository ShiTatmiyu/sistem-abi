<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
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

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'LandingController::index');
$routes->get('/login', 'Auth::index');
$routes->get('/logout', 'Auth::logout');
$routes->post('/auth/valid_login', 'Auth::valid_login');

// User Dashboard Route
$routes->get('/admin/dashboard', 'Admin::index', ['filter' => 'AdminFilter']);
$routes->get('/guru/dashboard', 'Guru::index', ['filter' => 'GuruFilter']);
$routes->get('/murid/dashboard', 'Murid::index', ['filter' => 'MuridFilter']);
$routes->get('/walimurid/dashboard', 'Walimurid::index', ['filter' => 'WalimuridFilter']);

// Admin User Create Route
$routes->get('/admin/create', 'Admin::create_admin', ['filter' => 'AdminFilter']);
$routes->get('/create-guru', 'Admin::create_guru', ['filter' => 'AdminFilter']);
$routes->get('/create-murid', 'Admin::create_murid', ['filter' => 'AdminFilter']);
$routes->get('/create-walimurid', 'Admin::create_walimurid', ['filter' => 'AdminFilter']);
$routes->get('/create-ibadah', 'Admin::create_ibadah', ['filter' => 'AdminFilter']);

// Admin User Index Route
$routes->get('/admin2', 'Admin::index_admin', ['filter' => 'AdminFilter']);
$routes->get('/guru2', 'Admin::index_guru', ['filter' => 'AdminFilter']);
$routes->get('/murid2', 'Admin::index_murid', ['filter' => 'AdminFilter']);
$routes->get('/walimurid2', 'Admin::index_walimurid', ['filter' => 'AdminFilter']);
$routes->get('/ibadahad2', 'Admin::index_ibadah', ['filter' => 'AdminFilter']);

// Admin User Detail
$routes->get('admin/detail/(:any)', 'admin::detail_admin/$1', ['filter' => 'AdminFilter']);
$routes->get('guru/detail/(:any)', 'admin::detail_guru/$1', ['filter' => 'AdminFilter']);
$routes->get('murid/detail/(:any)', 'admin::detail_murid/$1', ['filter' => 'AdminFilter']);
$routes->get('walimurid/detail/(:any)', 'admin::detail_walimurid/$1', ['filter' => 'AdminFilter']);

// Admin User Store
$routes->post('admin/store', 'admin::save_admin', ['filter' => 'AdminFilter']);
$routes->post('ibadah/store', 'admin::save_ibadah', ['filter' => 'AdminFilter']);
$routes->post('guru/store', 'admin::save_guru', ['filter' => 'AdminFilter']);
$routes->post('murid/store', 'admin::save_murid', ['filter' => 'AdminFilter']);
$routes->post('walimurid/store', 'admin::save_walimurid', ['filter' => 'AdminFilter']);

// Admin User Edit
$routes->get('/editadm/(:segment)', 'admin::edit_adm/$1', ['filter' => 'AdminFilter']);
$routes->get('/editib/(:segment)', 'admin::edit_ibadah/$1', ['filter' => 'AdminFilter']);
$routes->get('/editgr/(:segment)', 'admin::edit_gr/$1', ['filter' => 'AdminFilter']);
$routes->get('/editmr/(:segment)', 'admin::edit_mr/$1', ['filter' => 'AdminFilter']);

// Admin User Update
$routes->post('/updateadm/(:segment)', 'admin::update_adm/$1', ['filter' => 'AdminFilter']);
$routes->post('/updateib/(:segment)', 'admin::update_ibadah/$1', ['filter' => 'AdminFilter']);
$routes->post('/updategr/(:segment)', 'admin::update_gr/$1', ['filter' => 'AdminFilter']);
$routes->post('/updatemr/(:segment)', 'admin::update_mr/$1', ['filter' => 'AdminFilter']);

// Admin User Delete
$routes->delete('/deleteadm/(:segment)', 'admin::delete_adm/$1', ['filter' => 'AdminFilter']);
$routes->delete('/deletegr/(:segment)', 'admin::delete_gr/$1', ['filter' => 'AdminFilter']);
$routes->delete('/deletemr/(:segment)', 'admin::delete_mr/$1', ['filter' => 'AdminFilter']);
$routes->delete('/deletewm/(:segment)', 'admin::delete_wm/$1', ['filter' => 'AdminFilter']);
$routes->delete('/deleteib/(:segment)', 'admin::delete_ibadah/$1', ['filter' => 'AdminFilter']);

// Murid Route 
$routes->get('/ibadah2', 'Murid::index_ibadah', ['filter' => 'MuridFilter']);
$routes->get('/absen2', 'Murid::index_absen', ['filter' => 'MuridFilter']);
$routes->get('/absen/fill', 'Murid::create_absen', ['filter' => 'MuridFilter']);
$routes->post('/absen/store', 'Murid::store_absen', ['filter' => 'MuridFilter']);

// Walimurid Route
$routes->get('/ibadahwm2', 'Walimurid::index_ibadah', ['filter' => 'WalimuridFilter']);
$routes->get('/laporan2', 'Walimurid::index_laporan', ['filter' => 'WalimuridFilter']);
$routes->post('/confirmed', 'Walimurid::confirm', ['filter' => 'WalimuridFilter']);

// Guru Route
$routes->get('/ibadahgr2', 'Guru::index_ibadah', ['filter' => 'GuruFilter']);
$routes->get('/laporangr2', 'Guru::laporan_murid', ['filter' => 'GuruFilter']);
$routes->get('/show/(:any)', 'Guru::show_murid/$1', ['filter' => 'GuruFilter']);

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
