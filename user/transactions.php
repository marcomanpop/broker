<?php
include "config.php";

// Get user ID (assuming you have a logged-in user session)
// session_start();
// $user_id = $user['user_id'] ?? 0;

// Fetch transactions for the logged-in user
$stmt = $conn->prepare("SELECT id, transaction_type, method, amount, status, created_at FROM transactions WHERE user_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Transactions</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link href="assets/css/css2.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/deposit.css">
	<script src="assets/js/promise-polyfill.js"></script>

	<link href="assets/css/css.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
	<script type="text/javascript" src="assets/js/sidebar.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/sidebar.css">
	<style>
		body {
			font-family: 'Roboto' !important;
		}
	</style>
	<style>
		body {
			font-family: 'Roboto' !important;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
		}

		th,
		td {
			padding: 12px 20px;
			text-align: center;
			border: 1px solid #ddd;
		}

		th {
			background-color: #22b21f;
			color: white;
			font-weight: bold;
		}

		tr:nth-child(even) {
			background-color: rgb(64, 62, 62);
		}

		td {
			font-size: 14px;
		}

		.amount-card1 table {
			margin-top: 20px;
			border-radius: 5px;
			overflow: hidden;
		}

		td strong {
			font-weight: normal;
		}

		td[style*="color: green;"] {
			color: green;
		}

		td[style*="color: red;"] {
			color: red;
		}
	</style>

</head>

<body style="background-size:cover;
            background-position:center;
            background:url('assets/images/mask_group.svg');background-color:#000;">

	<section class="">

		<div class=" justify-content-between  " style="margin-top:-35px;">
			<link rel="stylesheet" href="assets/css/notify.css">
			<link rel="stylesheet" href="assets/css/custom.css">

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
						<!--<div class="flag" id="flag1" data-country="Nigeria">-->
						<!--	<img src="assets/images/ng.svg">-->
						<!--</div>-->
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

							<a href="traders.php" data-highlight="url">
								<img src="assets/images/c.svg">
								<div class="title">Copy Experts
								</div>
							</a>

							<a href="transactions.php" data-highlight="url">
								<img src="assets/images/assets.svg">
								<div class="title">Transactions
								</div>
							</a>
							<!-- <a href="kyc-verification.php" data-highlight="url">
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

				<div style="margin-top:12px;">
					<p align="center"><strong>TRANSACTIONS</strong></p>
				</div>

				<div class="amount-card1" style="margin-top: 5%;">
					<table border="1" width="100%" cellpadding="10" cellspacing="0" style="border-collapse: collapse; text-align: center;">
						<thead>
							<tr style="background-color: #22b21f; color: white;">
								<th>#</th>
								<th>Method</th>
								<th>Type</th>
								<th>Amount</th>
								<th>Status</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($result->num_rows > 0): ?>
								<?php while ($row = $result->fetch_assoc()): ?>
									<tr>
										<td><?= htmlspecialchars($row['id']) ?></td>
										<td><?= htmlspecialchars($row['method']) ?></td>
										<td><?= htmlspecialchars($row['transaction_type']) ?></td>
										<td>$<?= number_format($row['amount'], 2) ?></td>
										<td style="color: <?= $row['status'] == 'approved' ? 'green' : 'red' ?>;">
											<strong><?= htmlspecialchars($row['status']) ?></strong>
										</td>
										<td><?= htmlspecialchars(date("Y-m-d", strtotime($row['created_at']))) ?></td>
									</tr>
								<?php endwhile; ?>
							<?php else: ?>
								<tr>
									<td colspan="6">No transactions found</td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</section>
	</div>

	<div style="display: none;" id="currency_z">₦</div>
	<div style="display: none;" id="fees_z">0</div>

	<script src="assets/js/jquery.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="assets/js/withdrawal.js"></script>
	<script type="text/javascript" src="assets/js/dashboard.js"></script>

</body>

</html>