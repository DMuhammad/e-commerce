<?php

use App\Controllers\AuthController;
use App\Controllers\ProductController;
use App\Controllers\CategoryController;
use App\Controllers\ChatController;
use App\Controllers\CompanyImageController;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\DashboardController;
use App\Controllers\Home;
use App\Controllers\WebSocketController;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->setAutoRoute(true);
$routes->get('/login', [AuthController::class, 'index'], ['filter' => 'islogin']);
$routes->post('/login', [AuthController::class, 'authenticate']);
$routes->get('/register', [AuthController::class, 'register']);
$routes->post('/register', [AuthController::class, 'store']);
$routes->get('/logout', [AuthController::class, 'logout']);

$routes->get('/dashboard', [DashboardController::class, 'index'], ['filter' => 'auth']);

$routes->group('dashboard/categories', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', [CategoryController::class, 'index']);
    $routes->post('create', [CategoryController::class, 'store']);
    $routes->post('update/(:segment)', [CategoryController::class, 'update']);
    $routes->post('delete/(:segment)', [CategoryController::class, 'delete']);
});

$routes->group('dashboard/products', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', [ProductController::class, 'index']);
    $routes->post('create', [ProductController::class, 'store']);
    $routes->post('update/(:segment)', [ProductController::class, 'update']);
    $routes->post('delete/(:segment)', [ProductController::class, 'delete']);
});

$routes->group('dashboard/company-images', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', [CompanyImageController::class, 'index']);
    $routes->post('create', [CompanyImageController::class, 'store']);
    $routes->post('update/(:segment)', [CompanyImageController::class, 'update']);
    $routes->post('delete/(:segment)', [CompanyImageController::class, 'delete']);
});

$routes->get('/dashboard/transactions', 'TransactionController::index');
$routes->get('/dashboard/chats', 'ChatController::index');
$routes->get('/dashboard/company-profile', 'CompanyProfileController::index');
$routes->get('/dashboard/reports', 'ReportController::index');

$routes->get('/', [Home::class, 'index'], ['filter' => 'auth']);
$routes->get('/products', [Home::class, 'products'], ['filter' => 'auth']);
$routes->get('/about-us', [Home::class, 'aboutUs'], ['filter' => 'auth']);
$routes->get('/detail-product', [Home::class, 'detailProduct'], ['filter' => 'auth']);
$routes->get('/cart', [Home::class, 'cart'], ['filter' => 'auth']);
$routes->get('/checkout', [Home::class, 'checkout'], ['filter' => 'auth']);
$routes->get('/payment', [Home::class, 'payment'], ['filter' => 'auth']);
$routes->get('/account', [Home::class, 'account'], ['filter' => 'auth']);
$routes->post('/account/update', [Home::class, 'updateAccount'], ['filter' => 'auth']);
$routes->post('/account/update-password', [Home::class, 'updatePassword'], ['filter' => 'auth']);
$routes->post('/account/update-address', [Home::class, 'updateAddress'], ['filter' => 'auth']);
$routes->get('/detail-transactions', [Home::class, 'detailTransactions'], ['filter' => 'auth']);

$routes->get('chats', [ChatController::class, 'chats'], ['filter' => 'auth']);
$routes->get('chats/(:segment)', [ChatController::class, 'chatsByUser'], ['filter' => 'auth']);
$routes->post('chat/send', [ChatController::class, 'store'], ['filter' => 'auth']);
// $routes->get('/');
