<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex justify-content-lg-between align-items-center" id="navbarNav">
            <a class="d-lg-block" href="/">
                <img src="<?= base_url('assets/static/images/logo/company-logo-2.png') ?>" alt="Company Logo" id="logo" width="100">
            </a>
            <div>
                <ul class="nav nav-underline">
                    <li class="nav-item">
                        <a class="nav-link fw-medium active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium d-md-none d-block" href="/cart">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium d-md-none d-block" href="/account">Account</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link fw-medium d-md-none d-block" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
            <div>
                <form class="d-flex" role="search" action="">
                    <div class="form-group has-search d-none mb-0">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
            </div>
            <div>
                <ul class="navbar-nav d-md-flex justify-content-between d-none">
                    <li class="nav-item me-2">
                        <a class="nav-link" href="<?= base_url('/cart') ?>"><i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <!-- <a href="#" class="nav-link"><i class="fa-solid fa-user"></i></a> -->
                        <!-- <i class="bi bi-person-fill"></i>
                        <span class="nav-link">Hello, <?= $user ?>! -->
                        <!-- <a class="nav-link" href="/login">Login</a> -->
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/account">Account</a></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link fw-medium" href="/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
</nav>