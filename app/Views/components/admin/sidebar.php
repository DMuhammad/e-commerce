<?php
$currentUrl = $_SERVER['REQUEST_URI'];
$auth = $role;
?>

<div id="sidebar">
    <div class="sidebar-wrapper active shadow-sm">
        <div class="sidebar-header position-relative">
            <div class="container-fluid">
                <a href="/dashboard">
                    <img class="w-100 h-100" src="<?= base_url('assets/static/images/logo/company-logo.png') ?>" alt="Logo" />
                </a>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item <?= ($currentUrl == '/dashboard') ? 'active' : '' ?>">
                    <a href="/dashboard" class="sidebar-link fw-medium text-dark">
                        <i class="fa-solid fa-house"></i> <span>Dashboard</span>
                    </a>
                </li>
                <?php if ($auth == 'Admin') : ?>
                    <li class="sidebar-item has-sub">
                        <a href="#" class="sidebar-link fw-medium text-dark">
                            <i class="fa-solid fa-layer-group"></i> <span>Master Data</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item <?= ($currentUrl == '/dashboard/company-profile') ? 'active' : '' ?>">
                                <a href="/dashboard/company-profile" class="submenu-link fw-medium <?= ($currentUrl == '/dashboard/company-profile') ? '' : 'text-muted' ?>">Company Profile</a>
                            </li>
                            <li class="submenu-item <?= ($currentUrl == '/dashboard/company-images') ? 'active' : '' ?>">
                                <a href="/dashboard/company-images" class="submenu-link fw-medium <?= ($currentUrl == '/dashboard/company-images') ? '' : 'text-muted' ?>">Company Images</a>
                            </li>
                            <li class="submenu-item <?= ($currentUrl == '/dashboard/categories') ? 'active' : '' ?>">
                                <a href="/dashboard/categories" class="submenu-link fw-medium <?= ($currentUrl == '/dashboard/categories') ? '' : 'text-muted' ?>">Categories</a>
                            </li>
                            <li class="submenu-item <?= ($currentUrl == '/dashboard/products') ? 'active' : '' ?>">
                                <a href="/dashboard/products" class="submenu-link fw-medium <?= ($currentUrl == '/dashboard/products') ? '' : 'text-muted' ?>">Products</a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($auth == 'Owner') : ?>
                    <li class="sidebar-item <?= ($currentUrl == '/dashboard/products') ? 'active' : '' ?>">
                        <a href="/dashboard/products" class="sidebar-link fw-medium text-dark">
                            <i class="fa-solid fa-box mx-1"></i><span>Products</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($auth == 'Admin') : ?>
                    <li class="sidebar-item <?= ($currentUrl == '/dashboard/chats') ? 'active' : '' ?>">
                        <a href="/dashboard/chats" class="sidebar-link fw-medium text-dark">
                            <i class="fa-solid fa-comment-dots"></i><span>Chat</span>
                        </a>
                    </li>
                    <li class="sidebar-item <?= ($currentUrl == '/dashboard/transactions') ? 'active' : '' ?>">
                        <a href="/dashboard/transactions" class="sidebar-link fw-medium text-dark">
                            <i class="fa-solid fa-credit-card"></i> <span>Transactions</span>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="sidebar-item <?= ($currentUrl == '/dashboard/reports') ? 'active' : '' ?>">
                    <a href="/dashboard/reports" class="sidebar-link fw-medium text-dark">
                        <i class="fa-solid fa-file-lines mx-1"></i> <span>Reports</span>
                    </a>
                </li>
                <hr>
                <li class="sidebar-item">
                    <a href="/logout" class="sidebar-link fw-medium text-dark">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>