<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
	header("Location: login.php");
	exit();
}

require 'assets/php/config/connection.php';

if (isset($_GET['user_id']) && ctype_digit($_GET['user_id'])) {
	$user_id = intval($_GET['user_id']);

	$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
	$stmt->bind_param("i", $user_id);
	$stmt->execute();
	$user = $stmt->get_result()->fetch_assoc();

	if (!$user) {
		$message = "User ID($user_id) not found!";
		$type = "error";
		header("Location: users.php?message=" . urlencode($message) . "&type=" . urlencode($type));
		exit();
	}
} else {
	$message = "Invalid User ID($user_id)!";
	$type = "error";
	header("Location: users.php?message=" . urlencode($message) . "&type=" . urlencode($type));
	exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Edit <?= $user['username'] ?></title>

	<!-- Meta -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="icon" type="image/png" sizes="32x32" href="assets/images/admin-favicon.png">

	<!-- FontAwesome JS-->
	<script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bcryptjs/2.4.3/bcrypt.min.js"></script>

	<!-- App CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.css" integrity="sha512-UiKdzM5DL+I+2YFxK+7TDedVyVm7HMp/bN85NeWMJNYortoll+Nd6PU9ZDrZiaOsdarOyk9egQm6LOJZi36L2g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link id="theme-style" rel="stylesheet" href="assets/css/toast-style.css" />

	<style>
		.error_alert {
			text-align: center;
			color: red;
			display: none;
		}
	</style>

	<!-- App CSS -->
	<link id="theme-style" rel="stylesheet" href="assets/css/portal.css" />
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
				<h1 class="app-page-title">Edit <?= $user['username'] ?></h1>
				<div class="row gy-4">

					<div class="col-12 col-lg-6">
						<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
							<div class="app-card-header p-3 border-bottom-0">
								<div class="row align-items-center gx-3">
									<div class="col-auto">
										<div class="app-icon-holder">
											<i class="fa-solid fa-money-bill fa-xl"></i>
										</div>
									</div>
									<div class="col-auto">
										<h4 class="app-card-title">Balances</h4>
									</div>
								</div>
							</div>
							<div class="app-card-body px-4 w-100">

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Main Balance</strong></div>
											<div class="item-data"><?= $user['currency'] . number_format($user['balance'], 2); ?></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#updateProfitBalanceModal">Update</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Profit Balance</strong></div>
											<div class="item-data"><?= $user['currency'] . number_format($user['profit_balance'], 2); ?></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#updateProfitBalanceModal">Update</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Investment Balance</strong></div>
											<div class="item-data"><?= $user['currency'] . number_format($user['total_investment'], 2); ?></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#updateProfitBalanceModal">Update</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Other Balance</strong></div>
											<div class="item-data">Cryptocurriences</div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#updateBalanceModal">Update</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Reset all Balance</strong></div>
											<!-- <div class="item-data">Cryptocurriences</div> -->
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#resetBalancesModal">Reset</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Add Profit</strong></div>
											<div class="item-data">Add profit to user profit balance</div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#addProfitModal">Add</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Add Loss</strong></div>
											<div class="item-data">Add loss to user profit balance</div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#addLossModal">Add</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Generate Deposit History</strong></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#generateDepositsModal">Generate</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Generate Withdraw History</strong></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#generateWithdrawalsModal">Generate</button>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="col-12 col-lg-6">
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
											<div class="item-data"><?= $user['password']; ?></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#changePassword">Update</button>
										</div>
									</div>
								</div>
								
								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>OTP</strong></div>
											<div class="item-data"><?= $user['otp']; ?></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#changeOTP">Update</button>
										</div>
									</div>
								</div>

								<!-- <div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Authentication PIN</strong></div>
											<?php
											// if ($authenticatedPIN != NULL) {
											// 	echo "<div class='item-data'>••••</div>";
											// } else {
											// 	echo "You haven't set up PIN.";
											// }
											?>
										</div>
										<div class="col text-end">
											<?php
											// if ($authenticatedPIN != NULL) {
											// 	echo "<button class='btn-sm app-btn-secondary' data-bs-toggle='modal' data-bs-target='#authPIN'>Update</button>";
											// } else {
											// 	echo "<button class='btn-sm app-btn-secondary' data-bs-toggle='modal' data-bs-target='#authPIN'>Set up</button>";
											// }
											?>
										</div>
									</div>
								</div> -->

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Account Type</strong></div>
											<div class="item-data"><?= $user['account_type']; ?></div>
										</div>
										<div class="col text-end">
											<button class='btn-sm app-btn-secondary' data-bs-toggle='modal' data-bs-target='#updateAccount'>Update</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Trade Progress</strong></div>
											<div class="item-data"><?= $user['trade_progress']; ?></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#updateTradeProgress">Update</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Signal Strength</strong></div>
											<div class="item-data"><?= $user['signal_strength']; ?></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#updateSignalStrength">Update</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Account Verification</strong></div>
											<?php
											if ($user['verified'] == 1) {
												echo "<div class='item-data text-success'>Verified</div>";
											} else {
												echo "<div class='item-data text-danger'>Not Verified</div>";
											}
											?>
										</div>
										<div class="col text-end">
											<form action="assets/php/update_verification.php" method="POST"> <!-- Correct file -->
												<input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
												<input type="hidden" name="new_status" value="<?php echo ($user['verified'] == 1) ? '0' : '1'; ?>"> <!-- Correct logic -->
												<button type="submit" class="btn-sm app-btn-secondary">
													<?php echo ($user['verified'] == 1) ? "Unverify" : "Verify"; ?>
												</button>
											</form>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Account Status</strong></div>
											<?php
											if ($user['blocked'] == 1) {
												echo "<div class='item-data text-danger'>Blocked</div>";
											} else {
												echo "<div class='item-data text-success'>Active</div>";
											}
											?>
										</div>
										<div class="col text-end">
											<form action="assets/php/update_user_status.php" method="POST">
												<input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
												<input type="hidden" name="new_status" value="<?php echo ($user['blocked'] == 1) ? '0' : '1'; ?>">
												<button type="submit" class="btn-sm app-btn-secondary">
													<?php echo ($user['blocked'] == 1) ? "Unblock" : "Block"; ?>
												</button>
											</form>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Copy Trading Status</strong></div>
											<?php
											if ($user['lock_copy_traders'] == 1) {
												echo "<div class='item-data text-danger'>Locked</div>";
											} else {
												echo "<div class='item-data text-success'>Active</div>";
											}
											?>
										</div>
										<div class="col text-end">
											<form action="assets/php/update_lock_copy_traders.php" method="POST">
												<input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
												<input type="hidden" name="new_status" value="<?php echo ($user['lock_copy_traders'] == 1) ? '0' : '1'; ?>">
												<button type="submit" class="btn-sm app-btn-secondary">
													<?php echo ($user['lock_copy_traders'] == 1) ? "Unlock" : "Lock"; ?>
												</button>
											</form>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Trading Status</strong></div>
											<?php
											if ($user['lock_trading'] == 1) {
												echo "<div class='item-data text-danger'>Locked</div>";
											} else {
												echo "<div class='item-data text-success'>Active</div>";
											}
											?>
										</div>
										<div class="col text-end">
											<form action="assets/php/update_lock_trading.php" method="POST">
												<input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
												<input type="hidden" name="new_status" value="<?php echo ($user['lock_trading'] == 1) ? '0' : '1'; ?>">
												<button type="submit" class="btn-sm app-btn-secondary">
													<?php echo ($user['lock_trading'] == 1) ? "Unlock" : "Lock"; ?>
												</button>
											</form>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="col-12 col-lg-6">
						<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
							<div class="app-card-header p-3 border-bottom-0">
								<div class="row align-items-center gx-3">
									<div class="col-auto">
										<div class="app-icon-holder">
											<i class="fa-solid fa-user fa-xl"></i>
										</div>
										<!--//icon-holder-->
									</div>
									<!--//col-->
									<div class="col-auto">
										<h4 class="app-card-title">Profile</h4>
									</div>
									<!--//col-->
								</div>
								<!--//row-->
							</div>
							<!--//app-card-header-->
							<div class="app-card-body px-4 w-100">

								<!--//item-->
								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Name</strong></div>
											<div class="item-data"><?= $user['fullname'] ?></div>
										</div>
									</div>
								</div>
								<!--//item-->
								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Email</strong></div>
											<div class="item-data"><?= $user['email'] ?></div>
										</div>
									</div>
								</div>
								<!--//item-->
								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Country</strong></div>
											<div class="item-data"><?= $user['country'] ?></div>
										</div>
									</div>
								</div>
								<!--//item-->
								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Mobile</strong></div>
											<div class="item-data"><?= $user['phone'] ?></div>
										</div>
									</div>
								</div>
								<!--//item-->
								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Address</strong></div>
											<div class="item-data"><?= $user['home_address'] ?></div>
										</div>
									</div>
								</div>
								<!--//item-->
								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>City</strong></div>
											<div class="item-data"><?= $user['city'] ?></div>
										</div>
									</div>
								</div>
								<!--//item-->
								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Postal Code</strong></div>
											<div class="item-data"><?= $user['postal_code'] ?></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-lg-6">
						<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
							<div class="app-card-header p-3 border-bottom-0">
								<div class="row align-items-center gx-3">
									<div class="col-auto">
										<div class="app-icon-holder">
											<i class="fa-solid fa-shield fa-xl"></i>
										</div>
									</div>
									<div class="col-auto">
										<h4 class="app-card-title">Notifications</h4>
									</div>
								</div>
							</div>
							<div class="app-card-body px-4 w-100">

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Send Popup</strong></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#sendPopupMessageModal">Send</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Send Notification</strong></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#sendNotificationModal">Send</button>
										</div>
									</div>
								</div>

								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Send Email</strong></div>
										</div>
										<div class="col text-end">
											<button class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#sendEmailModal">Send</button>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!--//app-wrapper-->

	<?php include 'assets/php/modals.php'; ?>

	<!-- <script>
		document.addEventListener("DOMContentLoaded", function() {
			document.getElementById("passwordForm").addEventListener("submit", function(event) {
				event.preventDefault(); // Prevent default form submission

				var oldPassword = document.getElementById("oldPassword").value.trim();
				var newPassword = document.getElementById("newPassword").value.trim();
				var confirmPassword = document.getElementById("confirmPassword").value.trim();

				if (newPassword.length < 8) {
					showToast("Password must be at least 8 characters", "error");
					return;
				}

				if (newPassword !== confirmPassword) {
					showToast("Passwords do not match", "error");
					return;
				}

				// Submit form after validation
				this.submit();
			});
		});

		// Function to show Toastify notifications
		function showToast(message, type) {
			var toastClass = (type === "success") ? "toast-success" : "toast-error";
			Toastify({
				text: message,
				duration: 3000,
				close: true,
				gravity: "top",
				position: "center",
				stopOnFocus: true,
				className: toastClass,
			}).showToast();
		}
	</script> -->


	<!-- Javascript -->
	<script src="assets/plugins/popper.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- <script src="../vendor/jquery/jquery.js"></script> -->

	<!-- Page Specific JS -->
	<script src="assets/js/app.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.js" integrity="sha512-79j1YQOJuI8mLseq9icSQKT6bLlLtWknKwj1OpJZMdPt2pFBry3vQTt+NZuJw7NSd1pHhZlu0s12Ngqfa371EA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Get URL parameters
			var urlParams = new URLSearchParams(window.location.search);
			var message = urlParams.get("message");
			var type = urlParams.get("type"); // Type: success, error, warning, info
			var userId = urlParams.get("user_id"); // Preserve user_id

			if (message) {
				// Define class based on type
				var toastClass = "";
				switch (type) {
					case "success":
						toastClass = "toast-success";
						break;
					case "error":
						toastClass = "toast-error";
						break;
					case "warning":
						toastClass = "toast-warning";
						break;
					case "info":
					default:
						toastClass = "toast-info";
						break;
				}

				// Show Toastify message
				Toastify({
					text: decodeURIComponent(message),
					duration: 3000,
					close: true,
					gravity: "top",
					position: "center",
					stopOnFocus: true,
					className: toastClass,
				}).showToast();

				// Remove message & type from URL while keeping user_id
				urlParams.delete("message");
				urlParams.delete("type");

				var newUrl = window.location.pathname + (urlParams.toString() ? "?" + urlParams.toString() : "");
				window.history.replaceState({}, document.title, newUrl);
			}
		});
	</script>

</body>

</html>