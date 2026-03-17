<?php

include "config.php";

?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Withdrawal</title>

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
					<p align="center">WITHDRAW FUNDS</p>
				</div>
				<div class="amount-card" style="margin-top: 5%;">

					<div style="margin-top: 5%;">
						<label class="a2">Choose Your Payment Method From The List Below</label>
						<input class="form-control  b" placeholder="Search Method" id="myInput">
					</div>

					<!-- Payment Method Selection -->
					<!--<div class="myTable">-->
					<!--	<div class="dtype" data-method="Bank-Transfer">-->
					<!--		<span class="txt">Bank Transfer</span>-->
					<!--	</div>-->
					<!--	<div class="dtype" data-method="BITCOIN">-->
					<!--		<span class="txt">BITCOIN</span>-->
					<!--	</div>-->
					<!--	<div class="dtype" data-method="ETHEREUM">-->
					<!--		<span class="txt">ETHEREUM</span>-->
					<!--	</div>-->
					<!--	<div class="dtype" data-method="LITECOIN">-->
					<!--		<span class="txt">LITECOIN</span>-->
					<!--	</div>-->
					<!--	<div class="dtype" data-method="USDT">-->
					<!--		<span class="txt">USDT</span>-->
					<!--	</div>-->
					<!--	<div class="dtype" data-method="XRP_Ripple">-->
					<!--		<span class="txt">XRP_Ripple</span>-->
					<!--	</div>-->
					<!--	<div class="dtype" data-method="SOL_Solana">-->
					<!--		<span class="txt">SOL_Solana</span>-->
					<!--	</div>-->
					<!--	<div class="dtype" data-method="USDT_Tether">-->
					<!--		<span class="txt">USDT_Tether</span>-->
					<!--	</div>-->
					<!--	<div class="dtype" data-method="Dogecoin">-->
					<!--		<span class="txt">Dogecoin</span>-->
					<!--	</div>-->
					<!--	<div class="dtype" data-method="Shiba">-->
					<!--		<span class="txt">Shiba</span>-->
					<!--	</div>-->
					<!--</div>-->
                        <div class="myTable">
                            <div class="dtype" data-method="Bank-Transfer">
                                <span class="txt">Bank Transfer</span>
                            </div>
                            <div class="dtype" data-method="BITCOIN">
                                <span class="txt">BITCOIN</span>
                            </div>
                            <div class="dtype" data-method="ETHEREUM">
                                <span class="txt">ETHEREUM</span>
                            </div>
                            <div class="dtype" data-method="LITECOIN">
                                <span class="txt">LITECOIN</span>
                            </div>
                            <div class="dtype" data-method="USDT">
                                <span class="txt">USDT</span>
                            </div>
                            <div class="dtype" data-method="XRP_Ripple">
                                <span class="txt">XRP_Ripple</span>
                            </div>
                            <div class="dtype" data-method="SOL_Solana">
                                <span class="txt">SOL_Solana</span>
                            </div>
                            <div class="dtype" data-method="USDT_Tether">
                                <span class="txt">USDT_Tether</span>
                            </div>
                            <div class="dtype" data-method="Dogecoin">
                                <span class="txt">Dogecoin</span>
                            </div>
                            <div class="dtype" data-method="Shiba">
                                <span class="txt">Shiba</span>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</section>

	<!-- Modal -->
	<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<h5 id="method-name">Payment Method</h5>

					<!--<form action="assets/php/submit_request.php" method="post" id="withdrawal-form">-->
					<!--	<input type="hidden" name="paymentmethod" id="payment-method-input">-->

					<!--	<label for="withdraw-amount">Enter Amount:</label>-->
					<!--	<input type="number" name="amount" id="withdraw-amount" class="form-control" placeholder="Enter amount" required>-->

					<!--	<br>-->
					<!--	<br>-->

					<!--	<label for="withdraw-amount">Enter Wallet Address:</label>-->
					<!--	<input type="text" name="wallet-address" id="wallet-address" class="form-control" placeholder="Wallet Address" required>-->

					<!--	<input type="hidden" name="user_id" id="user_id" value="<?= $user['id'] ?>">-->
					<!--	<input type="hidden" name="username" id="username" value="<?= $user['username'] ?>">-->
					<!--	<input type="hidden" name="transaction_type" id="transaction_type" value="withdrawal">-->

					<!--	<br>-->
					<!--	<div class="d-flex">-->
					<!--		<button class="submit btn btn-primary w-100" type="submit">Submit Withdrawal</button>-->
					<!--	</div>-->
					<!--</form>-->
                    <form action="assets/php/submit_request.php" method="post" id="withdrawal-form">
                        <!-- Hidden input to store selected method -->
                        <input type="hidden" name="paymentmethod" id="payment-method-input">
    
                        <!-- Withdrawal Amount Input -->
                        <label for="withdraw-amount">Enter Amount:</label>
                        <input type="number" name="amount" id="withdraw-amount" class="form-control" placeholder="Enter amount" required>
    
                        <!-- Wallet Address (hidden for Bank Transfer) -->
                        <div id="wallet-field">
                            <br>
                            <label for="wallet-address">Enter Wallet Address:</label>
                            <input type="text" name="wallet-address" id="wallet-address" class="form-control" placeholder="Wallet Address">
                        </div>
    
                        <!-- Bank Fields (hidden by default) -->
                        <div id="bank-fields" style="display: none;">
                            <br>
                            <label for="bank-name">Bank Name:</label>
                            <input type="text" name="bank-name" id="bank-name" class="form-control" placeholder="Bank Name">
                            
                            <br>
                            <label for="account-name">Account Name:</label>
                            <input type="text" name="account-name" id="account-name" class="form-control" placeholder="Account Name">
                            
                            <br>
                            <label for="account-number">Account Number:</label>
                            <input type="text" name="account-number" id="account-number" class="form-control" placeholder="Account Number">
                        </div>
    
                        <!-- OTP Field (Always Visible) -->
                        <br>
                        <label for="otp">Enter OTP:</label>
                        <input type="text" name="otp" id="otp" class="form-control" placeholder="Enter OTP" required>
    
                        <input type="hidden" name="user_id" id="user_id" value="<?= $user['id'] ?>">
                        <input type="hidden" name="username" id="username" value="<?= $user['username'] ?>">
                        <input type="hidden" name="transaction_type" id="transaction_type" value="withdrawal">
    
                        <br>
                        <div class="d-flex">
                            <button class="submit btn btn-primary w-100" type="submit">Submit Withdrawal</button>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>

	<div style="display: none;" id="currency_z">₦</div>
	<div style="display: none;" id="fees_z">0</div>

	<script src="assets/js/jquery.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>


	<script type="text/javascript" src="assets/js/withdrawal.js"></script>
	<script type="text/javascript" src="assets/js/dashboard.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- JavaScript -->
	<script>
		document.addEventListener("DOMContentLoaded", handleURLMessage);
		
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

				history.replaceState(null, '', window.location.pathname);
			}
		}

// 		document.addEventListener("DOMContentLoaded", function() {
// 			const modal = new bootstrap.Modal(document.getElementById("paymentModal"));
// 			const methodName = document.getElementById("method-name");
// 			const methodInput = document.getElementById("payment-method-input");

// 			document.querySelectorAll(".dtype").forEach(button => {
// 				button.addEventListener("click", function() {
// 					const method = this.getAttribute("data-method");

// 					methodName.textContent = method;
// 					methodInput.value = method;

// 					modal.show();
// 				});
// 			});
// 		});

        document.addEventListener("DOMContentLoaded", function() {
            const modal = new bootstrap.Modal(document.getElementById("paymentModal"));
            const methodName = document.getElementById("method-name");
            const methodInput = document.getElementById("payment-method-input");
            const walletField = document.getElementById("wallet-field");
            const bankFields = document.getElementById("bank-fields");
    
            document.querySelectorAll(".dtype").forEach(button => {
                button.addEventListener("click", function() {
                    const method = this.getAttribute("data-method");
    
                    methodName.textContent = method;
                    methodInput.value = method;
    
                    // Show or hide fields based on the selected payment method
                    if (method === "Bank-Transfer") {
                        bankFields.style.display = "block";
                        walletField.style.display = "none"; // Hide wallet address for bank transfer
                    } else {
                        bankFields.style.display = "none";
                        walletField.style.display = "block"; // Show wallet address for other methods
                    }
    
                    modal.show();
                });
            });
        });
	</script>

</body>

</html>