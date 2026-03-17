<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

require 'assets/php/config/connection.php';

// Retrieve all data from the transactions table that meet the criteria
$query = "SELECT * FROM copy_traders";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

if ($result === false) {
    die("Error executing query: " . $conn->error);
}

// Fetch all the results into an array
$copy_traders = $result->fetch_all(MYSQLI_ASSOC);

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Copy Traders</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/admin-favicon.png">

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- App CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.css" integrity="sha512-UiKdzM5DL+I+2YFxK+7TDedVyVm7HMp/bN85NeWMJNYortoll+Nd6PU9ZDrZiaOsdarOyk9egQm6LOJZi36L2g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css" />
    <link id="theme-style" rel="stylesheet" href="assets/css/toast-style.css" />
</head>

<body class="app">
    <header class="app-header fixed-top">
        <div class="app-header-inner">
            <div class="container-fluid py-2">
                <div class="app-header-content">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
                                    <title>Menu</title>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                                </svg>
                            </a>
                        </div>
                        <!--//col-->

                        <div class="app-utilities col-auto">
                            <div class="app-utility-item app-notifications-dropdown dropdown">
                                <a href="notifications.php" role="button" aria-expanded="false" title="Notifications">
                                    <i class="fa-solid fa-bell fa-xl"></i>
                                    <?php if ($total_unread > 0) : ?>
                                        <span class="icon-badge"><?php echo $total_unread; ?></span>
                                    <?php endif; ?>
                                </a>
                            </div>
                            <!--//app-utility-item-->

                            <div class="app-utility-item app-user-dropdown dropdown">
                                <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="assets/images/user.png" alt="user profile" /></a>
                                <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                    <li>
                                        <a class="dropdown-item" href="profile.php">Account</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="assets/php/logout.php">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                            <!--//app-user-dropdown-->
                        </div>
                        <!--//app-utilities-->
                    </div>
                    <!--//row-->
                </div>
                <!--//app-header-content-->
            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-header-inner-->
        <div id="app-sidepanel" class="app-sidepanel">
            <div id="sidepanel-drop" class="sidepanel-drop"></div>
            <div class="sidepanel-inner d-flex flex-column">
                <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
                <div class="app-branding">
                    <a class="app-logo" href="#"><img class="logo-icon me-2" src="assets/images/admin-logo.png" alt="logo" /><span class="logo-text">ADMIN</span></a>
                </div>
                <!--//app-branding-->

                <?php include 'assets/php/nav.php'; ?>
                <!--//app-nav-->
                <div class="app-sidepanel-footer">
                    <nav class="app-nav app-nav-footer">
                        <ul class="app-menu footer-menu list-unstyled">

                            <li class="nav-item">

                                <a class="nav-link" href="assets/php/logout.php">
                                    <span class="nav-icon">
                                        <i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>
                                    </span>
                                    <span class="nav-link-text">Logout</span> </a><!--//nav-link-->
                            </li>
                            <!--//nav-item-->
                        </ul>
                        <!--//footer-menu-->
                    </nav>
                </div>
                <!--//app-sidepanel-footer-->
            </div>
            <!--//sidepanel-inner-->
        </div>
        <!--//app-sidepanel-->
    </header>
    <!--//app-header-->

    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Copy Traders</h1>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTraderModal">Add Trader</button>
                    </div>
                </div>

                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-trades" role="tabpanel" aria-labelledby="orders-trades-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">S/N</th>
                                                <th class="cell">Trader Name</th>
                                                <th class="cell">Win Rate (%)</th>
                                                <th class="cell">Profit Percent (%)</th>
                                                <th class="cell">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (count($copy_traders) > 0) : ?>
                                                <?php $i = count($copy_traders); ?>
                                                <?php foreach ($copy_traders as $trader) : ?>
                                                    <tr>
                                                        <td class="cell"><?php echo $i--; ?></td>
                                                        <td class="cell"><?= htmlspecialchars($trader['trader_name']); ?></td>
                                                        <td class="cell"><?= number_format($trader['win_rate'], 2); ?>%</td>
                                                        <td class="cell"><?= number_format($trader['profit_percent'], 2); ?>%</td>
                                                        <td class="cell">
                                                            <form method="POST" action="assets/php/delete_copy_trader.php" class="d-inline">
                                                                <input type="hidden" name="trader_id" value="<?= $trader['id']; ?>">
                                                                <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td class="cell" colspan="5">No traders found.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div><!--//table-responsive-->
                            </div><!--//app-card-body-->
                        </div><!--//app-card-->
                    </div><!--//tab-pane-->
                </div><!--//tab-content-->

                <!-- Add Trader Modal -->
                <div class="modal fade" id="addTraderModal" tabindex="-1" aria-labelledby="addTraderModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addTraderModalLabel">Add Copy Trader</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="assets/php/add_copy_trader.php">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Trader Name</label>
                                        <input type="text" class="form-control" name="trader_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Win Rate (%)</label>
                                        <input type="number" step="0.01" class="form-control" name="win_rate" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Profit Percent (%)</label>
                                        <input type="number" step="0.01" class="form-control" name="profit_percent" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Trader</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div><!--//container-fluid-->
        </div><!--//app-content-->

        <footer class="app-footer">
            <div class="container text-center py-3"></div>
        </footer><!--//app-footer-->

    </div><!--//app-wrapper-->

    <?php include 'assets/php/footer.php'; ?>