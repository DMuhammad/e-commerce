<?php

use App\Controllers\Home;
use App\Controllers\AuthController;
use App\Controllers\ChatController;
use App\Controllers\ProductController;
use App\Controllers\CategoryController;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\DashboardController;
use App\Controllers\TransactionController;
use App\Controllers\CompanyImageController;
use App\Controllers\CompanyProfileController;
use App\Controllers\ReportController;

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

$routes->get('/dashboard', [DashboardController::class, 'index'], ['filter' => 'oa']);

$routes->group('dashboard/categories', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', [CategoryController::class, 'index']);
    $routes->post('create', [CategoryController::class, 'store']);
    $routes->post('update/(:segment)', [CategoryController::class, 'update']);
    $routes->post('delete/(:segment)', [CategoryController::class, 'delete']);
});

$routes->group('dashboard/products', ['filter' => 'oa'], function ($routes) {
    $routes->get('/', [ProductController::class, 'index']);
    $routes->post('create', [ProductController::class, 'store']);
    $routes->post('update/(:segment)', [ProductController::class, 'update']);
    $routes->post('delete/(:segment)', [ProductController::class, 'delete']);
});

$routes->group('dashboard/company-profile', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', [CompanyProfileController::class, 'index']);
    $routes->post('update/(:segment)', [CompanyProfileController::class, 'update']);
});

$routes->group('dashboard/company-images', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', [CompanyImageController::class, 'index']);
    $routes->post('create', [CompanyImageController::class, 'store']);
    $routes->post('update/(:segment)', [CompanyImageController::class, 'update']);
    $routes->post('delete/(:segment)', [CompanyImageController::class, 'delete']);
});

$routes->group('dashboard/transactions', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', [TransactionController::class, 'index']);
    $routes->post('update/(:segment)', [TransactionController::class, 'update']);
    $routes->post('delete/(:segment)', [TransactionController::class, 'delete']);
});

$routes->get('/dashboard/transactions', 'TransactionController::index');
$routes->get('/dashboard/chats', 'ChatController::index');
$routes->get('/dashboard/reports', [ReportController::class, 'index'], ['filter' => 'oa']);

$routes->group('/', ['filter' => 'customer'], function ($routes) {
    $routes->get('/', [Home::class, 'index']);
    $routes->get('products', [Home::class, 'products']);
    $routes->get('about-us', [Home::class, 'aboutUs']);
    $routes->get('detail-product/(:segment)', [Home::class, 'detailProduct']);
    $routes->post('add-to-cart', [Home::class, 'addToCart']);
    $routes->get('cart', [Home::class, 'cart']);
    $routes->post('cart/update/(:segment)', [Home::class, 'updateCart']);
    $routes->post('cart/delete/(:segment)', [Home::class, 'deleteCart']);
    $routes->get('check-cart', [Home::class, 'checkCart']);
    $routes->get('checkout', [Home::class, 'checkout']);
    $routes->post('checkout', [Home::class, 'storeTransaction']);
    $routes->get('payment', [Home::class, 'payment']);
    $routes->get('verify-payment', [Home::class, 'verifyWhatsapp']);
    $routes->post('cancel-payment/(:segment)', [Home::class, 'cancelPayment']);
    $routes->get('account', [Home::class, 'account']);
    $routes->post('account/update', [Home::class, 'updateAccount']);
    $routes->post('account/update-password', [Home::class, 'updatePassword']);
    $routes->post('account/update-address', [Home::class, 'updateAddress']);
    $routes->get('detail-transaction/(:segment)', [Home::class, 'detailTransactions']);
});


$routes->get('chats', [ChatController::class, 'chats'], ['filter' => 'auth']);
$routes->get('chats/(:segment)', [ChatController::class, 'chatsByUser'], ['filter' => 'auth']);
$routes->post('chat/send', [ChatController::class, 'store'], ['filter' => 'auth']);
// $routes->get('/');
