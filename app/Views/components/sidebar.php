<?php $currentUrl = $_SERVER['REQUEST_URI']; ?>
<?= $auth = $role ?>
<div id="sidebar">
    <div class="sidebar-wrapper active">
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
                    <a href="/dashboard" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php if ($auth == 'Admin'): ?>
                    <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-stack"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item <?= ($currentUrl == '/dashboard/company-profile') ? 'active' : '' ?>">
                            <a href="/dashboard/company-profile" class="submenu-link">Company Profile</a>
                        </li>
                        <li class="submenu-item <?= ($currentUrl == '/dashboard/categories') ? 'active' : '' ?>">
                            <a href="/dashboard/categories" class="submenu-link">Categories</a>
                        </li>
                        <li class="submenu-item <?= ($currentUrl == '/dashboard/products') ? 'active' : '' ?>">
                            <a href="/dashboard/products" class="submenu-link">Products</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <li class="sidebar-item <?= ($currentUrl == '/dashboard/chats') ? 'active' : '' ?>">
                    <a href="/dashboard/chats" class="sidebar-link">
                        <i class="bi bi-chat-dots"></i>
                        <span>Chat</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($currentUrl == '/dashboard/transactions') ? 'active' : '' ?>">
                    <a href="/dashboard/transactions" class="sidebar-link">
                        <i class="bi bi-credit-card"></i>
                        <span>Transactions</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($currentUrl == '/dashboard/reports') ? 'active' : '' ?>">
                    <a href="/dashboard/reports" class="sidebar-link">
                        <i class="bi bi-clipboard2-data-fill"></i>
                        <span>Reports</span>
                    </a>
                </li>
                <li class="sidebar-title">User</li>
                <li class="sidebar-item">
                    <li href="#" class="sidebar-link">
                        <i class="bi bi-person-fill"></i>
                        <span>Hello, <?= $user ?>!</span>
                    </li>
                </li>
                <hr>
                <li class="sidebar-item">
                    <form id="logout-form" action="/logout" method="post" style="display: none;">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    </form>
                    <button type="submit" form="logout-form" class="sidebar-link">
                        <i class="bi bi-box-arrow-in-left"></i>
                        <span>Logout</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</div>