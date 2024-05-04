<?php
$currentUrl = $_SERVER['REQUEST_URI'];
?>
<nav class="navbar navbar-expand-lg navbar-light <?= ($currentUrl == '/') ? 'fixed-top' : '' ?>">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex justify-content-lg-between" id="navbarNav">
            <a class="d-lg-block" href="/">
                <img src="<?= base_url($currentUrl == '/' ? 'assets/static/images/logo/company-logo-1.png' : 'assets/static/images/logo/company-logo-2.png') ?>" alt="Company Logo">
            </a>
            <div>
                <ul class="nav nav-underline">
                    <li class="nav-item">
                        <a class="nav-link  <?= ($currentUrl == '/') ? 'active text-white' : 'text-black' ?>" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentUrl == '/products') ? 'active' : '' ?> <?= ($currentUrl != '/') ? 'text-black' : 'text-white' ?>" href="/products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentUrl == '/about-us') ? 'active' : '' ?> <?= ($currentUrl != '/') ? 'text-black' : 'text-white' ?>" href="/about-us">About Us</a>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="navbar-nav d-flex justify-content-between">
                    <li class="nav-item">
                        <a href="#" class="nav-link <?= ($currentUrl != '/') ? 'text-black' : 'text-white' ?>"><i class="fa-regular fa-user"></i> Hello, <?= $user ?> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentUrl != '/') ? 'text-black' : 'text-white' ?>" href="/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>