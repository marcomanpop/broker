<?php

include "config.php";

?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Deposit</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" integrity="sha512-rt/SrQ4UNIaGfDyEXZtNcyWvQeOq0QLygHluFQcSjaGB04IxWhal71tKuzP6K8eYXYB6vJV4pHkXcmFGGQ1/0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="assets/css/deposit.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="assets/css/sidebar.css">
	<link href="assets/css/css2.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/notify.css">
	<link rel="stylesheet" href="assets/css/custom.css">

</head>

<body style="background-size:cover;
            background-position:center;
            background:url('assets/images/mask_group.svg');background-color:#000;" class="">

	<section class="">

		<div class=" justify-content-between  " style="margin-top:-35px;">

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

				<div class="sidebar" id="sidebar" style="background-color: rgb(20, 20, 20); width: 0px;">
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
				<div style="margin-top:12px;">

					<p align="center" class="text-uppercase">Deposit</p>
				</div>
				<div class="amount-card" style="margin-top: 5%;">

					<div style="margin-top: 5%;">
						<label class="a2">Choose Your Payment Method From The List Below</label>
						<input class="form-control  b" placeholder="Search Method" id="myInput">
					</div>

					<div class="myTable">
						<div class="dtype" type="button" data-toggle="modal" data-target="#exampleModal" data-method="BITCOIN">
							<span class="txt">BITCOIN</span>
						</div>
						<div class="dtype" type="button" data-toggle="modal" data-target="#exampleModal" data-method="ETHEREUM">
							<span class="txt">ETHEREUM</span>
						</div>
						<div class="dtype" type="button" data-toggle="modal" data-target="#exampleModal" data-method="LITECOIN">
							<span class="txt">LITECOIN</span>
						</div>
						<div class="dtype" type="button" data-toggle="modal" data-target="#exampleModal" data-method="BITCOINCASH">
							<span class="txt">BITCOINCASH</span>
						</div>
						<div class="dtype" type="button" data-toggle="modal" data-target="#exampleModal" data-method="XRP_Ripple">
							<span class="txt">XRP_Ripple</span>
						</div>
						<div class="dtype" type="button" data-toggle="modal" data-target="#exampleModal" data-method="SOL_Solana">
							<span class="txt">SOL_Solana</span>
						</div>
						<div class="dtype" type="button" data-toggle="modal" data-target="#exampleModal" data-method="USDT_Tether">
							<span class="txt">USDT_Tether</span>
						</div>
						<div class="dtype" type="button" data-toggle="modal" data-target="#exampleModal" data-method="Dogecoin">
							<span class="txt">Dogecoin</span>
						</div>
						<div class="dtype" type="button" data-toggle="modal" data-target="#exampleModal" data-method="Shiba">
							<span class="txt">Shiba</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="d-flex justify-content-between">
						<p class="mb-txt">You are to make payment using the selected method <br><br> Screenshot and upload proof of payment</p>
						<img src="assets/images/c(1).svg" id="close-btn">
					</div>

					<form action="assets/php/submit_request.php" method="post" enctype="multipart/form-data">

						<div id="method-name"></div>

						<div id="method-address">Address:</div>
						<div id="method-address-value">
							<div class="d-flex justify-content-center instr" id="wallet-address"></div>
						</div>

						<div class="copy">
							<div class="d-flex justify-content-center instr" id="copy-address"><span>Tap to copy address</span></div>
						</div>

						<div class="d-flex justify-content-center">
							<div class="method-img">
								<div id="qrcode"></div>
							</div>
						</div>

						<div class="mb-3">
							<label for="amount">Amount Paid</label>
							<input class="form-control" name="amount" type="number" id="amount" placeholder="Amount" required>
						</div>

						<input type="hidden" name="paymentmethod" id="paymentmethod" value="">
						<input type="hidden" name="user_id" id="user_id" value="<?= $user['id'] ?>">
						<input type="hidden" name="username" id="username" value="<?= $user['username'] ?>">
						<input type="hidden" name="transaction_type" id="transaction_type" value="deposit">

						<div class="upload-label">
							Upload Payment Proof After Payment:
						</div>

						<div class="fil">
							<div class="d-flex">
								<label for="ChooseFile" id="cfile"> &nbsp;&nbsp;Choose File&nbsp;&nbsp; </label>
								<input type="file" id="ChooseFile" name="requestProof" accept="image/*" class="custom-file-input" required>
								<div class="d-flex align-items-center chum">no file selected</div>
							</div>
						</div>

						<br>
						<div class="d-flex">
							<button class="submit" name="uprequest" type="submit">Submit</button>
						</div>
					</form>
					<p>&nbsp;</p>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/js/sidebar.js"></script>
	<script type="text/javascript" src="assets/js/dashboard.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js" integrity="sha512-/DXTXr6nQodMUiq+IUJYCt2PPOUjrHJ9wFrqpJ3XkgPNOZVfMok7cRw6CSxyCQxXn6ozlESsSh1/sMCTF1rL/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha512-TPh2Oxlg1zp+kz3nFA0C5vVC6leG/6mm1z9+mA81MI5eaUVqasPLO8Cuk4gMF4gUfP5etR73rgU/8PNMsSesoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.min.js" integrity="sha512-7rusk8kGPFynZWu26OKbTeI+QPoYchtxsmPeBqkHIEXJxeun4yJ4ISYe7C6sz9wdxeE1Gk3VxsIWgCZTc+vX3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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


		document.addEventListener("DOMContentLoaded", function() {
			const cryptoButtons = document.querySelectorAll(".dtype");

			cryptoButtons.forEach(button => {
				button.addEventListener("click", function() {
					let method = this.getAttribute("data-method");

					// Update modal fields
					document.getElementById("method-name").textContent = method;
					document.getElementById("paymentmethod").value = method;

					// Fetch wallet address and QR Code from PHP
					fetch(`assets/php/fetch_wallet.php?method=${method}`)
						.then(response => response.json())
						.then(data => {
							document.getElementById("wallet-address").textContent = data.wallet;
							document.getElementById("copy-address").setAttribute("data-clipboard-text", data.wallet);
							var qrcode = new QRCode("qrcode", data.wallet);
							qrcode.clear();
						})
						.catch(error => console.error("Error fetching wallet:", error));
				});
			});

			// Copy wallet address on click
			document.getElementById("copy-address").addEventListener("click", function() {
				navigator.clipboard.writeText(this.getAttribute("data-clipboard-text")).then(() => {
					alert("Wallet address copied!");
				});
			});
		});
	</script>
	
    <script>
        $(document).ready(function () {
            $("#close-btn").click(function () {
                $("#exampleModal").modal("hide");
            });
        });
    </script>

</body>

</html>