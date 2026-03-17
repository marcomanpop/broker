<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
        <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>" href="dashboard.php">
                <span class="nav-icon"><i class="fa-solid fa-house fa-lg"></i></span>
                <span class="nav-link-text">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'users.php' ? 'active' : '' ?>" href="users.php">
                <span class="nav-icon"><i class="fa-solid fa-users fa-lg"></i></span>
                <span class="nav-link-text">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'miners.php' ? 'active' : '' ?>" href="miners.php">
                <span class="nav-icon"><i class="fa-solid fa-cloud fa-lg"></i></span>
                <span class="nav-link-text">Miners</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'copy_traders.php' ? 'active' : '' ?>" href="copy_traders.php">
                <span class="nav-icon"><i class="fa-solid fa-copy fa-lg"></i></span>
                <span class="nav-link-text">Copy Traders</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'signal_packages.php' ? 'active' : '' ?>" href="signal_packages.php">
                <span class="nav-icon"><i class="fa-solid fa-signal fa-lg"></i></span>
                <span class="nav-link-text">Signal Packages</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'unverified_users.php' ? 'active' : '' ?>" href="unverified_users.php">
                <span class="nav-icon"><i class="fa-solid fa-users fa-lg"></i></span>
                <span class="nav-link-text">Unverified Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'minings.php' ? 'active' : '' ?>" href="minings.php">
                <span class="nav-icon"><i class="fa-solid fa-hand-holding-droplet fa-lg"></i></span>
                <span class="nav-link-text">Mining History</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'transactions.php' ? 'active' : '' ?>" href="transactions.php">
                <span class="nav-icon"><i class="fa-solid fa-list fa-lg"></i></span>
                <span class="nav-link-text">Transactions History</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'deposits.php' ? 'active' : '' ?>" href="deposits.php">
                <span class="nav-icon"><i class="fa-solid fa-money-check-dollar fa-lg"></i></span>
                <span class="nav-link-text">Deposits History</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'withdraw.php' ? 'active' : '' ?>" href="withdraw.php">
                <span class="nav-icon"><i class="fa-solid fa-money-bill-transfer fa-lg"></i></span>
                <span class="nav-link-text">Withdrawal History</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'trades.php' ? 'active' : '' ?>" href="trades.php">
                <span class="nav-icon"><i class="fa-solid fa-list fa-lg"></i></span>
                <span class="nav-link-text">Trades History</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'signals.php' ? 'active' : '' ?>" href="signals.php">
                <span class="nav-icon"><i class="fa-solid fa-scroll fa-lg"></i></span>
                <span class="nav-link-text">Signals History</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'notifications.php' ? 'active' : '' ?>" href="notifications.php">
                <span class="nav-icon"><i class="fa-solid fa-circle-exclamation fa-lg"></i></span>
                <span class="nav-link-text">Notifications</span>
            </a>
        </li>
    </ul>
</nav>