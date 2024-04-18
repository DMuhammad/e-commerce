<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'DashboardController::index');

$routes->get('/categories', 'CategoryController::index');
$routes->post('/category/create', 'CategoryController::store');
$routes->post('/category/update/(:segment)', 'CategoryController::update/$1');
$routes->post('/category/delete/(:segment)', 'CategoryController::delete/$1');

$routes->get('/products', 'ProductController::index');
$routes->post('/product/create', 'ProductController::store');
$routes->post('/product/update/(:segment)', 'ProductController::update/$1');
$routes->post('/product/delete/(:segment)', 'ProductController::delete/$1');

$routes->get('/transactions', 'TransactionController::index');

$routes->get('/chat', 'ChatController::index');

$routes->get('/company-profile', 'CompanyProfileController::index');

$routes->get('/reports', 'ReportController::index');
