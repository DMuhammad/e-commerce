<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'DashboardController::index');

$routes->get('/dashboard/categories', 'CategoryController::index');

$routes->get('/dashboard/products', 'ProductController::index');

$routes->get('/dashboard/transactions', 'TransactionController::index');

$routes->get('/dashboard/chat', 'ChatController::index');
