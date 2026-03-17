<?php

include "config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Copy Traders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" integrity="sha512-rt/SrQ4UNIaGfDyEXZtNcyWvQeOq0QLygHluFQcSjaGB04IxWhal71tKuzP6K8eYXYB6vJV4pHkXcmFGGQ1/0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="assets/css/css2.css">
    <link rel="stylesheet" type="text/css" href="assets/css/deposit.css">
    <link rel="stylesheet" type="text/css" href="assets/css/css.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="assets/css/sidebar.css">
    <style>
        body {
            font-family: 'Roboto' !important;
        }

        .investment-form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background: #1e1e1e;
            color: #fff;
            border-radius: 8px;
        }

        .submit-btn {
            background-color: #22b21f;
            border: none;
            padding: 10px;
            color: white;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #1a9518;
        }

        .modal-content {
            background-color: #1e1e1e;
            color: #fff;
        }

        #countdown {
            font-size: 24px;
            font-weight: bold;
            color: #ffcc00;
        }
    </style>
</head>

<body style="background:url('assets/images/mask_group.svg');background-color:#000;">

    <section class="">
        <div class="justify-content-between" style="margin-top:-35px;">
            <!-- <link rel="stylesheet" href="assets/css/notify.css">
            <link rel="stylesheet" href="assets/css/custom.css"> -->

            <div class="content">

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
                    <p align="center"><strong>COPY TRADERS</strong></p>
                </div>

                <div class="myTable2" style="margin-top:1rem;" id="tradersContainer">
                    <!-- Traders will be injected here dynamically -->
                </div>
            </div>
    </section>


    <script src="assets/js/sidebar.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha512-TPh2Oxlg1zp+kz3nFA0C5vVC6leG/6mm1z9+mA81MI5eaUVqasPLO8Cuk4gMF4gUfP5etR73rgU/8PNMsSesoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.min.js" integrity="sha512-7rusk8kGPFynZWu26OKbTeI+QPoYchtxsmPeBqkHIEXJxeun4yJ4ISYe7C6sz9wdxeE1Gk3VxsIWgCZTc+vX3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!--<script src="assets/js/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>-->
	<!--<script src="assets/js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>-->
	<!--<script src="assets/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>-->
	

    <script>
        
        
        document.addEventListener("DOMContentLoaded", function () {
            fetchTraders();
        });
        
        const user_id = <?= $user_id; ?>;
        
        function fetchTraders() {
                fetch("assets/php/fetch_traders.php", {
                    method: "POST",
                    body: new URLSearchParams({
                        user_id: user_id 
                    }),
                    headers: { "Content-Type": "application/x-www-form-urlencoded" }
                })
                .then(response => response.json())
                .then(data => {
                    const traders = data.traders;
                    const copiedTraderId = data.copied_trader_id;
                    const container = document.getElementById("tradersContainer");
                    container.innerHTML = ""; // Clear existing traders
        
                    const images = [
                        "assets/images/t_ed479d0cc3e16cd6c2696768466edfde.jpeg",
                        "assets/images/t_f514852446bff2ff3f03161d08dd6499.jpeg",
                        "assets/images/t_56892c7254fa4d977e39ffc77d25f869.jpeg",
                        "assets/images/t_2d1ea2ee6ec50b5b5f43777055a3fb02.jpeg",
                        "assets/images/t_c3bc39e205bcc5e2c1e8e08068f66aa1.jpeg"
                    ];
        
                    traders.forEach((trader, index) => {
                        const imgSrc = images[index % images.length];
                        const isCopied = trader.id == copiedTraderId;
        
                        container.innerHTML += `
                            <div class="trade-con" data-i="${trader.id}">
                                <div class="d-flex">
                                    <div class="tradp">
                                        <img src="${imgSrc}" alt="prof">
                                    </div>
                                    <div class="d-flex justify-content-between rst" style="height: 97px;">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <span class="t-name">${trader.trader_name}</span>
                                                <div style="margin-top: .5rem;">
                                                    <div class="t-wr">${trader.win_rate}% Win Rate</div>
                                                    <div class="t-ps">${trader.profit_percent}% Profit Share</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            ${isCopied ? `
                                                <div class="btn-red" onclick="uncopyTrader()">Uncopy</div>
                                            ` : `
                                                <div class="btn-green" onclick="copyTrader(${trader.id})">Copy</div>
                                            `}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                });
        }
        
        function copyTrader(traderId) {
            console.log("Copying Trader ID:", traderId);
            console.log("User ID:", user_id);
            fetch("assets/php/copy_trader.php", {
                method: "POST",
                body: new URLSearchParams({ 
                    trader_id: traderId, 
                    user_id: user_id 
                }),
                headers: { "Content-Type": "application/x-www-form-urlencoded" }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    fetchTraders(); // Refresh traders list
                } else {
                    alert(data.message);
                }
            });
        }
        
        function uncopyTrader() {
            fetch("assets/php/uncopy_trader.php", {
                method: "POST",
                body: new URLSearchParams({ 
                    user_id: user_id 
                }),
                headers: { "Content-Type": "application/x-www-form-urlencoded" }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    fetchTraders(); // Refresh traders list
                } else {
                    alert(data.message);
                }
            });
        }
    </script>



</body>

</html>