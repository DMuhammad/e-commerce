<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex justify-content-lg-between" id="navbarNav">
            <a class="d-lg-block" href="/">
                <img src="<?= base_url('assets/static/images/logo/company-logo-1.png') ?>" alt="Company Logo">
            </a>
            <div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">About Us</a>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="navbar-nav d-flex justify-content-between">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white"><i class="fa-regular fa-user"></i> Hello, <?= $user ?> </a>
                        <!-- <i class="bi bi-person-fill"></i>
                        <span class="nav-link">Hello, <?= $user ?>! -->
                        <!-- <a class="nav-link" href="/login">Login</a> -->
                    </li>
                    <li class="nav-item">
                        <!-- <form id="logout-form" action="/logout" method="post" style="display: none;">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        </form>
                        <button type="submit" form="logout-form" class="nav-link">
                            <i class="bi bi-box-arrow-in-left"></i>
                            <span>Logout</span>
                        </button> -->
                        <a class="nav-link text-white" href="/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>