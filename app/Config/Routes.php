<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\CategoryController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'DashboardController::index');

$routes->group('categories', function($routes) {
    $routes->get('/', [CategoryController::class, 'index'], ['as' => 'categories']);
    $routes->post('create', [CategoryController::class, 'store'], ['as' => 'categories.store']);
    $routes->post('update/(:segment)', [CategoryController::class, 'update'], ['as' => 'categories.update']);
    $routes->post('delete/(:segment)', [CategoryController::class, 'delete'], ['as' => 'categories.delete']);
});

$routes->group('products', function($routes) {
    $routes->get('/', 'ProductController::index');
    $routes->post('create', 'ProductController::store');
    $routes->post('update/(:segment)', 'ProductController::update/$1');
    $routes->post('delete/(:segment)', 'ProductController::delete/$1');
});

$routes->get('/transactions', 'TransactionController::index');
$routes->get('/chat', 'ChatController::index');
$routes->get('/company-profile', 'CompanyProfileController::index');
$routes->get('/reports', 'ReportController::index');
