<?php

use App\Controllers\AuthController;
use App\Controllers\ProductController;
use App\Controllers\CategoryController;
use App\Controllers\ChatController;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\DashboardController;
use App\Controllers\Home;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/login', [AuthController::class, 'index'], ['filter' => 'islogin']);
$routes->post('/login', [AuthController::class, 'authenticate']);
$routes->get('/register', [AuthController::class, 'register']);
$routes->get('/logout', [AuthController::class, 'logout']);

// Apply the 'auth' filter to the '/dashboard' route.
$routes->get('/dashboard', [DashboardController::class, 'index'], ['filter' => 'auth']);

// Apply the 'auth' filter to all routes within the 'categories' group.
$routes->group('dashboard/categories', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', [CategoryController::class, 'index']);
    $routes->post('create', [CategoryController::class, 'store']);
    $routes->post('update/(:segment)', [CategoryController::class, 'update']);
    $routes->post('delete/(:segment)', [CategoryController::class, 'delete']);
});

// Apply the 'auth' filter to all routes within the 'products' group.
$routes->group('dashboard/products', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', [ProductController::class, 'index']);
    $routes->post('create', [ProductController::class, 'store']);
    $routes->post('update/(:segment)', [ProductController::class, 'update']);
    $routes->post('delete/(:segment)', [ProductController::class, 'delete']);
});

$routes->get('/dashboard/transactions', 'TransactionController::index');
$routes->get('/dashboard/chats', 'ChatController::index');
$routes->get('/dashboard/company-profile', 'CompanyProfileController::index');
$routes->get('/dashboard/reports', 'ReportController::index');

$routes->get('/', [Home::class, 'index'], ['filter' => 'auth']);
$routes->get('/products', [Home::class, 'products'], ['filter' => 'auth']);
$routes->get('/about-us', [Home::class, 'aboutUs'], ['filter' => 'auth']);

$routes->get('chats', [ChatController::class, 'chats'], ['filter' => 'auth']);
$routes->post('chat/send', [ChatController::class, 'store'], ['filter' => 'auth']);
// $routes->get('/');
