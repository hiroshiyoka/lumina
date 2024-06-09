<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Etalase::index');

$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/register', 'Auth::register');
$routes->get('/auth/logout', 'Auth::logout');

$routes->get('/barang/create', 'Barang::create');
$routes->post('/barang/create', 'Barang::create');
$routes->get('/barang/index', 'Barang::index');
$routes->get('/barang/view/(:num)', 'Barang::view/$1');
$routes->get('/barang/update/(:num)', 'Barang::update/$1');
$routes->post('/barang/update/(:num)', 'Barang::update/$1');
$routes->get('/barang/delete/(:num)', 'Barang::delete/$1');

$routes->get('/etalase/index', 'Etalase::index');
$routes->get('/etalase/beli/(:num)', 'Etalase::beli/$1');
$routes->get('/etalase/getcity', 'Etalase::getCity');
$routes->get('/etalase/getcost', 'Etalase::getCost');
$routes->post('/etalase/beli', 'Etalase::beli');

$routes->get('/transaksi/view/(:num)', 'Transaksi::view/$1');
$routes->get('/transaksi/index', 'Transaksi::index');
$routes->get('/transaksi/invoice/(:num)', 'Transaksi::invoice/$1');

$routes->get('/user/index', 'User::index');