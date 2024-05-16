<?php
$currentUrl = $_SERVER['REQUEST_URI'];
?>

<nav class="navbar navbar-expand-lg navbar-light navbar-custom z-1 <?= $currentUrl != '/' ? 'bg-white shadow-sm' : 'fixed-top' ?>">
    <div class="container">
        <button class="navbar-toggler <?= $currentUrl == '/' ? 'navbar-custom-toggle' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex justify-content-lg-between align-items-center" id="navbarNav">
            <a class="d-lg-block" href="/">
                <img src="<?= base_url('assets/static/images/logo/company-logo-2.png') ?>" alt="Company Logo" id="logo" width="100">
            </a>
            <div>
                <ul class="navbar-nav nav-underline">
                    <li class="nav-item">
                        <a class="nav-link fw-medium <?= $currentUrl == '/' ? 'active' : '' ?>" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium <?= $currentUrl == '/products' ? 'active' : '' ?>" href="/products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium <?= $currentUrl == '/about-us' ? 'active' : '' ?>" href="/about-us">About Us</a>
                    </li>
                    <li class="nav-item d-md-none d-block">
                        <a class="nav-link fw-medium <?= $currentUrl == '/cart' ? 'active' : '' ?>" href="/cart">Cart</a>
                    </li>
                    <li class="nav-item d-md-none d-block">
                        <a class="nav-link fw-medium <?= $currentUrl == '/account' ? 'active' : '' ?>" href="/account">Account</a>
                    </li>
                    <li class="nav-item d-md-none d-block mb-3">
                        <a class="nav-link fw-medium" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex">
                <?php if ($title == 'Products') : ?>
                    <form class="d-md-flex d-block me-2" role="search" action="">
                        <div class="form-group has-search mb-0">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control bg-transparent" placeholder="Search" id="input-search">
                        </div>
                    </form>
                <?php endif; ?>
                <ul class="navbar-nav d-md-flex justify-content-between d-none">
                    <li class="nav-item me-2">
                        <a class="nav-link" href="<?= base_url('/cart') ?>"><i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/account">Account</a></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>