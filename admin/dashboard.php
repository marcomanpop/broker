<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
	header("Location: login.php");
	exit();
}

require 'assets/php/config/connection.php';

$admin = $_SESSION['admin_id'];

$sql = "SELECT COUNT(*) AS total_users FROM users";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_users = $row['total_users'];

$sql = "SELECT SUM(amount) AS total_deposits FROM transactions WHERE transaction_type = 'deposit'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_deposits = $row['total_deposits'] ?? 0; // Default to 0 if null

$sql = "SELECT COUNT(*) AS total_trades FROM live_trading";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_trades = $row['total_trades'];

$sql = "SELECT COUNT(*) AS total_miners FROM miners";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_miners = $row['total_miners'];

$stmt = $conn->prepare("SELECT * FROM admin WHERE id = 1");
$stmt->execute();
$admin_user = $stmt->get_result()->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin Dashboard</title>
	<link rel="icon" type="image/png" sizes="32x32" href="assets/images/admin-favicon.png">

	<!-- Meta -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- FontAwesome JS-->
	<script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

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
										<a class="dropdown-item" href="dashboard.php">Account</a>
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
				<h1 class="app-page-title">
					Welcome, Admin
				</h1>

				<div class="row g-4 mb-4">
					<div class="col-6 col-lg-3">
						<div class="app-card app-card-stat shadow-sm h-100">
							<div class="app-card-body p-3 p-lg-4">
								<h4 class="stats-type mb-1">Total Users</h4>
								<div class="stats-figure"><?= $total_users ?></div>
								<div class="stats-meta">View All</div>
							</div>
							<a class="app-card-link-mask" href="users.php"></a>
						</div>
						<!--//app-card-->
					</div>
					<!--//col-->

					<div class="col-6 col-lg-3">
						<div class="app-card app-card-stat shadow-sm h-100">
							<div class="app-card-body p-3 p-lg-4">
								<h4 class="stats-type mb-1">Deposited Funds</h4>
								<div class="stats-figure">$<?= number_format($total_deposits, 2); ?></div>
							</div>
						</div>
						<!--//app-card-->
					</div>
					<!--//col-->
					<div class="col-6 col-lg-3">
						<div class="app-card app-card-stat shadow-sm h-100">
							<div class="app-card-body p-3 p-lg-4">
								<h4 class="stats-type mb-1">Total Miners</h4>
								<div class="stats-figure"><?= $total_miners ?></div>
								<div class="stats-meta">View All</div>
							</div>
							<a class="app-card-link-mask" href="miners.php"></a>
						</div>
						<!--//app-card-->
					</div>
					<!--//col-->
					<div class="col-6 col-lg-3">
						<div class="app-card app-card-stat shadow-sm h-100">
							<div class="app-card-body p-3 p-lg-4">
								<h4 class="stats-type mb-1">Trades</h4>
								<div class="stats-figure"><?= $total_trades ?></div>
								<div class="stats-meta">View All</div>
							</div>
							<!--//app-card-body-->
							<a class="app-card-link-mask" href="trades.php"></a>
						</div>
						<!--//app-card-->
					</div>
					<!--//col-->
				</div>
				<!--//row-->

				<div class="row g-4 mb-4">
					<div class="col-12">
						<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
							<div class="app-card-header p-3 border-bottom-0">
								<div class="row align-items-center gx-3">
									<div class="col-auto">
										<div class="app-icon-holder">
											<i class="fa-solid fa-shield fa-xl"></i>
										</div>
									</div>
									<div class="col-auto">
										<h4 class="app-card-title">Security</h4>
									</div>
								</div>
							</div>
							<div class="app-card-body px-4 w-100">

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Password</strong></div>
											<div class="item-data"><?= $admin_user['password']; ?></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#changePassword">Update</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>BTC Wallet</strong></div>
											<div class="item-data"><?= htmlspecialchars($admin_user['btc']); ?></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#updateWalletModal">Update</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>ETH Wallet</strong></div>
											<div class="item-data"><?= htmlspecialchars($admin_user['eth']); ?></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#updateWalletModal">Update</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>USDT Wallet</strong></div>
											<div class="item-data"><?= htmlspecialchars($admin_user['usdt']); ?></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#updateWalletModal">Update</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>LTC Wallet</strong></div>
											<div class="item-data"><?= htmlspecialchars($admin_user['ltc']); ?></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#updateWalletModal">Update</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>BCH Wallet</strong></div>
											<div class="item-data"><?= htmlspecialchars($admin_user['bch']); ?></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#updateWalletModal">Update</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>XRP Wallet</strong></div>
											<div class="item-data"><?= htmlspecialchars($admin_user['xrp']); ?></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#updateWalletModal">Update</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>DOGE Wallet</strong></div>
											<div class="item-data"><?= htmlspecialchars($admin_user['doge']); ?></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#updateWalletModal">Update</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>SOL Wallet</strong></div>
											<div class="item-data"><?= htmlspecialchars($admin_user['sol']); ?></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#updateWalletModal">Update</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>SHIBA Wallet</strong></div>
											<div class="item-data"><?= htmlspecialchars($admin_user['shib']); ?></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#updateWalletModal">Update</button>
										</div>
									</div>
								</div>


							</div>
						</div>
					</div>
					<!--//col-->
				</div>
				<!--//row-->
				<!--//tab-content-->
			</div>
			<!--//container-fluid-->
		</div>
		<!--//app-content-->
	</div>
	<!--//app-wrapper-->

	<div class="modal fade" id="updateWalletModal" tabindex="-1" aria-labelledby="updateWalletLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="updateWalletLabel">Update Wallet Addresses</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="POST" action="assets/php/update_wallet_addresses.php">
						<input type="hidden" name="user_id" value="<?= $admin_user['id']; ?>">

						<!-- BTC Wallet -->
						<div class="mb-3">
							<label for="btc_wallet" class="form-label">BTC Wallet Address</label>
							<input type="text" class="form-control" name="btc_wallet" id="btc_wallet" value="<?= htmlspecialchars($admin_user['btc']); ?>" required>
						</div>

						<!-- ETH Wallet -->
						<div class="mb-3">
							<label for="eth_wallet" class="form-label">ETH Wallet Address</label>
							<input type="text" class="form-control" name="eth_wallet" id="eth_wallet" value="<?= htmlspecialchars($admin_user['eth']); ?>" required>
						</div>

						<!-- USDT Wallet -->
						<div class="mb-3">
							<label for="usdt_wallet" class="form-label">USDT Wallet Address</label>
							<input type="text" class="form-control" name="usdt_wallet" id="usdt_wallet" value="<?= htmlspecialchars($admin_user['usdt']); ?>" required>
						</div>

						<!-- BNB Wallet -->
						<div class="mb-3">
							<label for="bnb_wallet" class="form-label">BCH Wallet Address</label>
							<input type="text" class="form-control" name="bnb_wallet" id="bnb_wallet" value="<?= htmlspecialchars($admin_user['bch']); ?>" required>
						</div>

						<!-- LTC Wallet -->
						<div class="mb-3">
							<label for="ltc_wallet" class="form-label">LTC Wallet Address</label>
							<input type="text" class="form-control" name="ltc_wallet" id="ltc_wallet" value="<?= htmlspecialchars($admin_user['ltc']); ?>" required>
						</div>

						<!-- DOGE Wallet -->
						<div class="mb-3">
							<label for="doge_wallet" class="form-label">DOGE Wallet Address</label>
							<input type="text" class="form-control" name="doge_wallet" id="doge_wallet" value="<?= htmlspecialchars($admin_user['doge']); ?>" required>
						</div>

						<!-- XRP Wallet -->
						<div class="mb-3">
							<label for="xrp_wallet" class="form-label">XRP Wallet Address</label>
							<input type="text" class="form-control" name="xrp_wallet" id="xrp_wallet" value="<?= htmlspecialchars($admin_user['xrp']); ?>" required>
						</div>

						<!-- SHIB Wallet -->
						<div class="mb-3">
							<label for="shib_wallet" class="form-label">SHIBA Wallet Address</label>
							<input type="text" class="form-control" name="shib_wallet" id="shib_wallet" value="<?= htmlspecialchars($admin_user['shib']); ?>" required>
						</div>

						<!-- SOL Wallet -->
						<div class="mb-3">
							<label for="sol_wallet" class="form-label">SOL Wallet Address</label>
							<input type="text" class="form-control" name="sol_wallet" id="sol_wallet" value="<?= htmlspecialchars($admin_user['sol']); ?>" required>
						</div>

						<button type="submit" class="btn btn-primary">Update Wallet Addresses</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Change Password Modal -->
	<div class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="changePasswordModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="changePasswordModal">Change Password</h5>
					<button type="button" class="btn-close" id="close_password_modal" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="POST" action="assets/php/update_admin_password.php">
						<input type="hidden" name="user_id" value="<?= $admin_user['id']; ?>">

						<div class="mb-3">
							<label for="oldPassword" class="form-label">Current Password</label>
							<input type="text" class="form-control" id="oldPassword" value="<?= $admin_user['password']; ?>" disabled>
						</div>

						<div class="mb-3">
							<label for="newPassword" class="form-label">New Password</label>
							<input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="********" required>
						</div>

						<button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>


	<?php include 'assets/php/footer.php'; ?>