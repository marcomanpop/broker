<?php

include "config.php";

?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="assets/css/sidebar.css">

	<link href="assets/css/css2.css" rel="stylesheet">
	<link href="assets/css/css2(1).css" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" integrity="sha512-rt/SrQ4UNIaGfDyEXZtNcyWvQeOq0QLygHluFQcSjaGB04IxWhal71tKuzP6K8eYXYB6vJV4pHkXcmFGGQ1/0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" href="assets/css/notify.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<style>
		.shib {
			color: #ff8300;
		}

		.dot.shib {
			background: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='6' height='6' fill='none'%3E%3Ccircle cx='3' cy='3' r='3' fill='%23ff8300'/%3E%3C/svg%3E")
		}

		.dot.shib {
			width: 6px;
			height: 6px;
			flex-shrink: 0;
		}

		.sol {
			color: #fff;
		}

		.dot.sol {
			background: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='6' height='6' fill='none'%3E%3Ccircle cx='3' cy='3' r='3' fill='%23ffffff'/%3E%3C/svg%3E")
		}

		.dot.sol {
			width: 6px;
			height: 6px;
			flex-shrink: 0;
		}

		.content {
			max-width: 98% !important;
		}
	</style>

	<link rel="stylesheet" type="text/css" href="assets/css/ss.css">
	<link rel="stylesheet" type="text/css" href="assets/css/o.css">
</head>

<body style="background-size:cover;
            background-position:center;
            background:url('assets/images/mask_group.svg');background-color:#000;">
	<div class=" justify-content-between  " style="margin-top:-25px;">

		<div class="content  ">

			<div class="ddown">
				<div class="linklist">
					<a href="dashboard.php">Profile</a>
				</div>
				<a href="logout.php">
					<div class="logout">logout </div>
				</a>
			</div>

			<div class="top">
				<div class="menu2" id="menu">
				</div>

				<div class="top-m">
					<div><?= $user["username"] ?></div>
					<div class="verified"></div>
				</div>

				<div class="right">
					<div class="flag" id="flag1" data-country="Nigeria">
						<img src="assets/images/ng.svg">
					</div>
					<div class="nameicon" id="nameicon" data-name="Trojan">
						<div id="name">
							<span><?= strtoupper(substr($user["username"], 0, 1)) ?></span>
						</div>
					</div>
				</div>
			</div>

			<div class="sidebar" id="sidebar" style="background-color:#141414;">
				<div class="logo">
					<img src="assets/images/logo.svg" width="150px">
				</div>

				<div class="chil">
					<div class="linklist">

						<a href="dashboard.php" data-highlight="url">
							<img src="assets/images/p.svg">
							<div class="title">Portfolio
							</div>
						</a>

						<a href="deposit.php" data-highlight="url">
							<img src="assets/images/d.svg">
							<div class="title">Deposit
							</div>
						</a>

						<a href="withdrawal.php" data-highlight="url">
							<img src="assets/images/w.svg">
							<div class="title">Withdraw
							</div>
						</a>

						<a href="live-trading.php" data-highlight="url">
							<img src="assets/images/t.svg">
							<div class="title">Trades
							</div>
						</a>

						<a href="account-upgrade.php" data-highlight="url">
							<img src="assets/images/s.svg">
							<div class="title">Subscription
							</div>
						</a>

						<a href="trading-stock.php" data-highlight="url">
							<img src="assets/images/sk.svg">
							<div class="title">Stocks
							</div>
						</a>

						<a href="signal-package.php" data-highlight="url">
							<img src="assets/images/sg.svg">
							<div class="title">Signal
							</div>
						</a>

						<a href="buy-crypto.php" data-highlight="url">
							<img src="assets/images/b.svg">
							<div class="title">Buy Crypto
							</div>
						</a>

						<a href="trader.php" data-highlight="url">
							<img src="assets/images/c.svg">
							<div class="title">Copy Experts
							</div>
						</a>

						<a href="transactions.php" data-highlight="url">
							<img src="assets/images/assets.svg">
							<div class="title">Transactions
							</div>
						</a>

						<!-- <a href="verify.php" data-highlight="url">
							<img src="assets/images/verify.svg">
							<div class="title">Verify Account
							</div>
						</a> -->

						<a href="logout.php" data-highlight="url">
							<img src="assets/images/logout.svg">
							<div class="title">Logout
							</div>
						</a>

					</div>
				</div>

				<div class="tail" style="margin-top:-75px;">
					<div class="drip">
						<div class="img">
							<img src="assets/images/pers.svg">
						</div>
						<div class="tailr">
							<div class="tailr1"><?= $user["username"] ?></div>
							<div class="tailr1"><?= $user["account_type"] ?></div>
						</div>
					</div>
				</div>

			</div>

            <!-- Enter Content Here-->

		</div>

		<script type="text/javascript" src="assets/js/sidebar.js"></script>
		<script type="text/javascript" src="assets/js/dashboard.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha512-TPh2Oxlg1zp+kz3nFA0C5vVC6leG/6mm1z9+mA81MI5eaUVqasPLO8Cuk4gMF4gUfP5etR73rgU/8PNMsSesoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.min.js" integrity="sha512-7rusk8kGPFynZWu26OKbTeI+QPoYchtxsmPeBqkHIEXJxeun4yJ4ISYe7C6sz9wdxeE1Gk3VxsIWgCZTc+vX3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		<!-- JavaScript -->
		<script>
			document.addEventListener("DOMContentLoaded", handleURLMessage);

			// Handle message from URL and display it using SweetAlert
			function handleURLMessage() {
				const urlParams = new URLSearchParams(window.location.search);
				const message = urlParams.get('message');
				const messageType = urlParams.get('message_type');

				if (message) {
					const iconType = messageType === "success" ? "success" : "error"; // Define icon based on type

					swal.fire({
						title: iconType === "success" ? "Success!" : "Error!",
						text: decodeURIComponent(message),
						icon: iconType,
						confirmButtonText: "OK"
					});

					// Remove message from URL after displaying
					history.replaceState(null, '', window.location.pathname);
				}
			}
		</script>
</body>

</html>