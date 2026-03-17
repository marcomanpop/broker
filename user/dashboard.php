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
	
	
	<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '96f8a88b1d864d449f134557e28900c08bf522c3';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
	
	
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

						<a href="https://buybitcoinworldwide.com" data-highlight="url">
							<img src="assets/images/b.svg">
							<div class="title">Buy Crypto
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

			<div class="pb">
				<div class="t1 pad">
					<div>Deposit Balance</div>
					<div id="hidder" class=" rev2"></div>
				</div>
				<div class="amt pad" id="wbal" data-amt="<?= $user["currency"] . ' ' . $user["balance"] ?>"><span id="tobal"></span></div>
				<div class="btns">
					<a href="deposit.php">Deposit</a>
					<a href="withdrawal.php">Withdraw</a>
					<a href="account-upgrade.php">Upgrade</a>
				</div>
			</div>

			<div class="box2">
				<div class="al">
					<div class="a"><span id="earn"><?= $user["currency"] . ' ' . $user["profit_balance"] ?></span></div>
					<div class="l">
						<div><?= strtoupper($user["account_status"])  ?></div>
					</div>
				</div>
				<div class="tee">
					<div class="tee1">Total Earning</div>
					<div class="tee2">-78.61%</div>
					<div class="tee3">+60.75%</div>
				</div>
				<div class="t23">
					<div class="dot other"></div>
					<div>Amount Earned From Active Trades</div>
				</div>
				<div class="progress">
					<div class="track" style="width: <?= $user["trade_progress"] ?>%;"></div>
				</div>
				<div class="tp">Trade Progress <?= $user["trade_progress"] ?>%</div>

				<div class="sssection">
					<div class="ssheader">
						<div class="sslabel">Signal strength</div>
						<div class="ssperc" id="ss1"><?= $user["signal_strength"] ?>%</div>
					</div>
					<div id="percss">
						<?php
						$signalStrength = $user["signal_strength"];
						$bars = 10;  // We have 10 bars

						// Loop through each bar to adjust color based on signal strength
						for ($i = 1; $i <= $bars; $i++) {
							// Determine if the current bar should be more intense (brighter) based on signal strength
							$brightness = $i <= $signalStrength / 10 ? 255 : 100; // The first few bars will be brighter

							// Adjust red and green based on the signal strength
							$red = max(0, 255 - ($signalStrength * 2.55));
							$green = min(255, $signalStrength * 2.55);

							// Create the color for the bar (lighter if closer to the signal strength)
							$bgColor = "rgb($red, $green, 0)";
							// Apply brightness adjustment for the bar
							$bgColor = "rgb(" . ($red * ($brightness / 255)) . ", " . ($green * ($brightness / 255)) . ", 0)";
						?>
							<div class="bar" id="ss<?= $i * 10 ?>" style="background: <?= $bgColor ?>;"></div>
						<?php } ?>
					</div>
				</div>

			</div>

			<!--<div style="background: rgba(19.54, 19.54, 19.54, 0.74); border-radius: 10px;  margin-top: 14px; padding: 28px 14px 14px; margin-bottom: 11px;">-->
			<!--	<div class="ov" id="cryptoBar" style="background: #333;border-radius: 5.121px;min-height:17px;"></div>-->

			<!--	<div class="ovsprd">-->
			<!--		<div class="ovcon">-->
			<!--			<div style="width: 13.34px; height: 13.34px; background: #F7931A; border-radius: 9999px"></div>-->
			<!--			<div>-->
			<!--				<div class="ovtitle">BTC</div>-->
			<!--				<div class="ovperc" id="btcperc">0%</div>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--		<div class="ovcon">-->
			<!--			<div style="width: 13.34px; height: 13.34px; background: #906EE0; border-radius: 9999px"></div>-->
			<!--			<div>-->
			<!--				<div class="ovtitle">ETH</div>-->
			<!--				<div class="ovperc" id="ethperc">0%</div>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--		<div class="ovcon">-->
			<!--			<div style="width: 13.34px; height: 13.34px; background: #50AF95; border-radius: 9999px"></div>-->
			<!--			<div>-->
			<!--				<div class="ovtitle">USDT</div>-->
			<!--				<div class="ovperc" id="usdtperc">0%</div>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--		<div class="ovcon">-->
			<!--			<div style="width: 13.34px; height: 13.34px; background: #F0B90B; border-radius: 9999px"></div>-->
			<!--			<div>-->
			<!--				<div class="ovtitle">BNB</div>-->
			<!--				<div class="ovperc" id="bnbperc">0%</div>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--	</div>-->

			<!--	<div class="ovsprd">-->
			<!--		<div class="ovcon">-->
			<!--			<div style="width: 13.34px; height: 13.34px; background: #345D9D; border-radius: 9999px"></div>-->
			<!--			<div>-->
			<!--				<div class="ovtitle">LTC</div>-->
			<!--				<div class="ovperc" id="ltcperc">0%</div>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--		<div class="ovcon">-->
			<!--			<div style="width: 13.34px; height: 13.34px; background: #C2A633; border-radius: 9999px"></div>-->
			<!--			<div>-->
			<!--				<div class="ovtitle">DOGE</div>-->
			<!--				<div class="ovperc" id="dogeperc">0%</div>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--		<div class="ovcon">-->
			<!--			<div style="width: 13.34px; height: 13.34px; background: #FFFFFF; border-radius: 9999px"></div>-->
			<!--			<div>-->
			<!--				<div class="ovtitle">XRP</div>-->
			<!--				<div class="ovperc" id="xrpperc">0%</div>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--		<div class="ovcon">-->
			<!--			<div style="width: 13.34px; height: 13.34px; background: #FF8300; border-radius: 9999px"></div>-->
			<!--			<div>-->
			<!--				<div class="ovtitle">SHIB</div>-->
			<!--				<div class="ovperc" id="shibaperc">0%</div>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--	</div>-->

			<!--	<div class="ovsprd">-->

			<!--		<div class="ovcon">-->
			<!--			<div style="width: 13.34px; height: 13.34px; background: #DC1FFF; border-radius: 9999px"></div>-->
			<!--			<div>-->
			<!--				<div class="ovtitle">SOL</div>-->
			<!--				<div class="ovperc" id="solperc">0%</div>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--		<div class="ovcon"></div>-->
			<!--		<div class="ovcon"></div>-->
			<!--		<div class="ovcon"></div>-->
			<!--	</div>-->
				
			<!--</div>-->
			
            <div style="background: rgba(19.54, 19.54, 19.54, 0.74); border-radius: 10px; margin-top: 14px; padding: 28px 14px 14px; margin-bottom: 11px;">
                <!-- Bar for visual representation -->
                <div class="ov" id="cryptoBar" style="background: #333; border-radius: 5.121px; min-height: 17px; width: 100%; display: flex;"></div>
            
                <div class="ovsprd">
                    <div class="ovcon">
                        <div style="width: 13.34px; height: 13.34px; background: #F7931A; border-radius: 9999px"></div>
                        <div>
                            <div class="ovtitle">BTC</div>
                            <div class="ovperc" id="btcperc">0%</div>
                        </div>
                    </div>
                    <div class="ovcon">
                        <div style="width: 13.34px; height: 13.34px; background: #906EE0; border-radius: 9999px"></div>
                        <div>
                            <div class="ovtitle">ETH</div>
                            <div class="ovperc" id="ethperc">0%</div>
                        </div>
                    </div>
                    <div class="ovcon">
                        <div style="width: 13.34px; height: 13.34px; background: #50AF95; border-radius: 9999px"></div>
                        <div>
                            <div class="ovtitle">USDT</div>
                            <div class="ovperc" id="usdtperc">0%</div>
                        </div>
                    </div>
                    <div class="ovcon">
                        <div style="width: 13.34px; height: 13.34px; background: #F0B90B; border-radius: 9999px"></div>
                        <div>
                            <div class="ovtitle">BNB</div>
                            <div class="ovperc" id="bnbperc">0%</div>
                        </div>
                    </div>
                </div>
            
                <div class="ovsprd">
                    <div class="ovcon">
                        <div style="width: 13.34px; height: 13.34px; background: #345D9D; border-radius: 9999px"></div>
                        <div>
                            <div class="ovtitle">LTC</div>
                            <div class="ovperc" id="ltcperc">0%</div>
                        </div>
                    </div>
                    <div class="ovcon">
                        <div style="width: 13.34px; height: 13.34px; background: #C2A633; border-radius: 9999px"></div>
                        <div>
                            <div class="ovtitle">DOGE</div>
                            <div class="ovperc" id="dogeperc">0%</div>
                        </div>
                    </div>
                    <div class="ovcon">
                        <div style="width: 13.34px; height: 13.34px; background: #FFFFFF; border-radius: 9999px"></div>
                        <div>
                            <div class="ovtitle">XRP</div>
                            <div class="ovperc" id="xrpperc">0%</div>
                        </div>
                    </div>
                    <div class="ovcon">
                        <div style="width: 13.34px; height: 13.34px; background: #FF8300; border-radius: 9999px"></div>
                        <div>
                            <div class="ovtitle">SHIB</div>
                            <div class="ovperc" id="shibperc">0%</div>
                        </div>
                    </div>
                </div>
                
                <div class="ovsprd">
                    <div class="ovcon">
                        <div style="width: 13.34px; height: 13.34px; background: #DC1FFF; border-radius: 9999px"></div>
                        <div>
                            <div class="ovtitle">SOL</div>
                            <div class="ovperc" id="solperc">0%</div>
                        </div>
                    </div>
                </div>
            </div>

			<div class="balances">
				<div class="bal">
					<div class="bal1">
						<div class="bal1c1">
							<div class="bal1lr1">Investment</div>
							<div class="bal1lr2"><?= $user["currency"] . ' ' . $user["total_investment"] ?></div>
						</div>
						<div class="bal1c2">
							<img src="assets/images/bal.svg">
						</div>
					</div>
					<div class="bal2">
						<div class="dot balance">
						</div>
						<div class="dotcolor balance">Investment Deposit
						</div>
					</div>
				</div>

				<div class="bal">
					<div class="bal1">
						<div class="bal1c1">
							<div class="bal1lr1">BTC</div>
							<div class="bal1lr2"><?= $user["btc"] ?> BTC</div>
						</div>
						<div class="bal1c2">
							<img src="assets/images/btc.svg">
						</div>
					</div>
					<div class="bal2">
						<div class="dot btc">
						</div>
						<div class="dotcolor btc">Bitcoin </div>
					</div>
				</div>

				<div class="bal">
					<div class="bal1">
						<div class="bal1c1">
							<div class="bal1lr1">ETH</div>
							<div class="bal1lr2"><?= $user["eth"] ?> ETH</div>
						</div>
						<div class="bal1c2">
							<img src="assets/images/eth.svg">
						</div>
					</div>
					<div class="bal2">
						<div class="dot eth">
						</div>
						<div class="dotcolor eth">Ethereum </div>
					</div>
				</div>

				<div class="bal">
					<div class="bal1">
						<div class="bal1c1">
							<div class="bal1lr1">USDT</div>
							<div class="bal1lr2"><?= $user["usdt"] ?> USDT</div>
						</div>
						<div class="bal1c2">
							<img src="assets/images/usdt.svg">
						</div>
					</div>
					<div class="bal2">
						<div class="dot usdt">
						</div>
						<div class="dotcolor usdt">USDT </div>
					</div>
				</div>

				<div class="bal">
					<div class="bal1">
						<div class="bal1c1">
							<div class="bal1lr1">BNB</div>
							<div class="bal1lr2"><?= $user["bnb"] ?> BNB</div>
						</div>
						<div class="bal1c2">
							<img src="assets/images/bnb.svg">
						</div>
					</div>
					<div class="bal2">
						<div class="dot bnb">
						</div>
						<div class="dotcolor bnb">Binance </div>
					</div>
				</div>

				<div class="bal">
					<div class="bal1">
						<div class="bal1c1">
							<div class="bal1lr1">LTC</div>
							<div class="bal1lr2"><?= $user["ltc"] ?> LTC</div>
						</div>
						<div class="bal1c2">
							<img src="assets/images/ltc.svg">
						</div>
					</div>
					<div class="bal2">
						<div class="dot ltc">
						</div>
						<div class="dotcolor ltc">Litecoin </div>
					</div>
				</div>

				<div class="bal">
					<div class="bal1">
						<div class="bal1c1">
							<div class="bal1lr1">DOGE</div>
							<div class="bal1lr2"><?= $user["doge"] ?> DOGE</div>
						</div>
						<div class="bal1c2">
							<img src="assets/images/doge.svg">
						</div>
					</div>
					<div class="bal2">
						<div class="dot doge">
						</div>
						<div class="dotcolor doge">Doge </div>
					</div>
				</div>

				<div class="bal">
					<div class="bal1">
						<div class="bal1c1">
							<div class="bal1lr1">XRP</div>
							<div class="bal1lr2"><?= $user["xrp"] ?> XRP</div>
						</div>
						<div class="bal1c2">
							<img src="assets/images/xrp.svg">
						</div>
					</div>
					<div class="bal2">
						<div class="dot xrp">
						</div>
						<div class="dotcolor xrp">Ripple </div>
					</div>
				</div>

				<div class="bal">
					<div class="bal1">
						<div class="bal1c1">
							<div class="bal1lr1">SHIB</div>
							<div class="bal1lr2"><?= $user["shib"] ?> SHIB</div>
						</div>
						<div class="bal1c2">
							<img src="assets/images/shib.svg">
						</div>
					</div>
					<div class="bal2">
						<div class="dot shib">
						</div>
						<div class="dotcolor shib">Shiba Inu </div>
					</div>
				</div>

				<div class="bal">
					<div class="bal1">
						<div class="bal1c1">
							<div class="bal1lr1">SOL</div>
							<div class="bal1lr2"><?= $user["sol"] ?> SOL</div>
						</div>
						<div class="bal1c2">
							<img src="assets/images/sol.svg">
						</div>
					</div>
					<div class="bal2">
						<div class="dot sol">
						</div>
						<div class="dotcolor sol">Solana </div>
					</div>
				</div>
			</div>

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
		
		<script>
		
    // 		fetch('get_crypto_balances.php')
    //             .then(response => response.json())
    //             .then(data => {
    //                 if (data.error) {
    //                     console.error(data.error);
    //                     return;
    //                 }
    //                 updateCryptoData(data);
    //             })
    //             .catch(error => console.error("Fetch error:", error));

    //         function updateCryptoData(balances) {
    //             userDeposits = balances;
    //             updateCryptoBar();
    //         }

        
    //         // Define the colors for each cryptocurrency
    //         const cryptoColors = {
    //             BTC: "#F7931A",
    //             ETH: "#906EE0",
    //             USDT: "#50AF95",
    //             BNB: "#F0B90B",
    //             LTC: "#345D9D",
    //             DOGE: "#C2A633",
    //             XRP: "#FFFFFF",
    //             SHIB: "#FF8300",
    //             SOL: "#DC1FFF"
    //         };
        
    //         function updateCryptoBar() {
    //             const cryptoBar = document.getElementById("cryptoBar");
    //             cryptoBar.innerHTML = ""; // Clear the bar before updating
    //             cryptoBar.style.display = "flex"; // Ensure flex container
    //             cryptoBar.style.overflow = "hidden"; // Prevent overflow issues
            
    //             let totalDeposit = Object.values(userDeposits).reduce((sum, amount) => sum + amount, 0);
    //             if (totalDeposit === 0) return; // No deposits, do nothing
            
    //             // Loop through each crypto deposit
    //             for (const [crypto, amount] of Object.entries(userDeposits)) {
    //                 const percentage = (amount / totalDeposit) * 100;
            
    //                 let barSegment = document.createElement("div");
    //                 barSegment.style.width = percentage + "%";
    //                 barSegment.style.backgroundColor = cryptoColors[crypto];
    //                 barSegment.style.height = "100%";
    //                 barSegment.style.flex = `0 0 ${percentage}%`; // Ensure proper width
    //                 barSegment.style.transition = "width 0.3s ease-in-out"; // Smooth transition
            
    //                 cryptoBar.appendChild(barSegment); // Append segment to bar
            
    //                 // Update the percentage text
    //                 document.getElementById(`${crypto.toLowerCase()}perc`).textContent = percentage.toFixed(1) + "%";
    //             }
    //         }

        
    //         updateCryptoBar(); // Call function on page load
                document.addEventListener("DOMContentLoaded", function () {
                
                    // Define crypto colors
                    const cryptoColors = {
                        btc: "#F7931A",
                        eth: "#906EE0",
                        usdt: "#50AF95",
                        bnb: "#F0B90B",
                        ltc: "#345D9D",
                        doge: "#C2A633",
                        xrp: "#FFFFFF",
                        shib: "#FF8300",
                        sol: "#DC1FFF"
                    };
                
                    // Fetch balances
                    fetch(`get_crypto_balances.php`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                console.error(data.error);
                                return;
                            }
                            updateCryptoBar(data);
                        })
                        .catch(error => console.error("Fetch error:", error));
                
                    function updateCryptoBar(balances) {
                        const totalBalance = Object.values(balances).reduce((sum, value) => sum + parseFloat(value || 0), 0);
                        const barContainer = document.querySelector(".ov");
                        barContainer.innerHTML = ""; // Clear previous content
                
                        if (totalBalance === 0) {
                            barContainer.style.background = "rgba(19, 19, 19, 0.74)"; // Default color
                            return;
                        }
                
                        let barHTML = "";
                        Object.keys(balances).forEach(crypto => {
                            const amount = parseFloat(balances[crypto] || 0);
                            if (amount > 0) {
                                const percentage = ((amount / totalBalance) * 100).toFixed(2);
                                barHTML += `<div style="width: ${percentage}%; background: ${cryptoColors[crypto]}; height: 17px; display: inline-block;"></div>`;
                                document.getElementById(crypto + "perc").innerText = percentage + "%";
                            }
                        });
                
                        barContainer.innerHTML = barHTML;
                    }
                });

        </script>
</body>

</html>