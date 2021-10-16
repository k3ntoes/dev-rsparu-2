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
$routes->setDefaultController('Main');
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
$routes->get('/', 'Main::index');

// Login Register
$routes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
    // Login/out
    $routes->get('login', 'AuthController::login', ['as' => 'login']);
    $routes->post('login', 'AuthController::attemptLogin');
    $routes->get('logout', 'AuthController::logout');

    // Registration
    $routes->get('register', 'AuthController::register', ['as' => 'register']);
    $routes->post('register', 'AuthController::attemptRegister');

    // Activation
    $routes->get('activate-account', 'AuthController::activateAccount', ['as' => 'activate-account']);
    $routes->get('resend-activate-account', 'AuthController::resendActivateAccount', ['as' => 'resend-activate-account']);

    // Forgot/Resets
    $routes->get('forgot', 'AuthController::forgotPassword', ['as' => 'forgot']);
    $routes->post('forgot', 'AuthController::attemptForgot');
    $routes->get('reset-password', 'AuthController::resetPassword', ['as' => 'reset-password']);
    $routes->post('reset-password', 'AuthController::attemptReset');
});
// End Login Register

// API
$routes->resource('API/Kelompok');
$routes->resource('API/Provinsi');
$routes->resource('API/Kabupaten');
$routes->resource('API/Kecamatan');
$routes->resource('API/Kelurahan');
$routes->resource('API/Agama');
$routes->resource('API/Pendidikan');
$routes->resource('API/Tujuan');
$routes->resource('API/Petugas');
$routes->post('API/Pasien/form/cari', 'API\Pasien::cari');
$routes->resource('API/Pasien');
$routes->post('API/PasienOld/form/cari', 'API\PasienOld::cari');
$routes->resource('API/PasienOld');
$routes->resource('API/Kunjungan');
$routes->resource('API/TransPetugas');
$routes->resource('API/Tensi');
$routes->resource('API/Diagnosa');
$routes->resource('API/RiwayatTensi');
$routes->group('API/Riwayat', function ($routes) {
    $routes->post('/Kunjungan', 'API\Riwayat::kunjungan'); //for loket
    $routes->get('/Pemeriksaan/(:any)', 'API\Riwayat::pemeriksaan/$1'); //riwayat tensi
});
$routes->group('API/DaftarTunggu', function ($routes) {
    $routes->get('/Tensi/(:any)', 'API\DaftarTunggu::tensi/$1');
});
// End API

//Report
$routes->resource('Report/Kunjungan');
//End Report


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
