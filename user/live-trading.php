<?php

include "config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Live Trading</title>
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

        .trade-form {
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

<body style="background-size:cover;
            background-position:center;
            background:url('assets/images/mask_group.svg');background-color:#000;">

    <section class="">
        <div class="justify-content-between" style="margin-top:-35px;">
            <link rel="stylesheet" href="assets/css/notify.css">
            <link rel="stylesheet" href="assets/css/custom.css">

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
                    <p align="center"><strong>PLACE A TRADE</strong></p>
                </div>

                <div class="amount-card">
                    <form id="trade-form" class="trade-form">
                        <label>Select Stock:</label>
                        <select class="form-control" id="stock" required>
                            <option value="AAPL" style="color: #000;">Apple (AAPL)</option>
                            <option value="GOOGL" style="color: #000;">Google (GOOGL)</option>
                            <option value="TSLA" style="color: #000;">Tesla (TSLA)</option>
                            <option value="AMZN" style="color: #000;">Amazon (AMZN)</option>
                        </select>

                        <label>Trade Type:</label>
                        <select class="form-control" id="trade-type" required>
                            <option value="BUY" style="color: #000;">Buy</option>
                            <option value="SELL" style="color: #000;">Sell</option>
                        </select>

                        <label>Trade Amount ($):</label>
                        <input type="number" id="amount" class="form-control" placeholder="Enter amount" required>

                        <label>Duration:</label>
                        <select class="form-control" id="duration" required>
                            <option value="30" style="color: #000;">30 Seconds</option>
                            <option value="60" style="color: #000;">1 Minute</option>
                            <option value="300" style="color: #000;">5 Minutes</option>
                        </select>

                        <button type="submit" class="submit-btn" style="margin-top: 10px;">Start Trade</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="tradeModal" tabindex="-1" role="dialog" aria-labelledby="tradeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Trade in Progress</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <p><strong>Stock:</strong> <span id="modal-stock"></span></p>
                    <p><strong>Trade Type:</strong> <span id="modal-trade-type"></span></p>
                    <p><strong>Amount:</strong> $<span id="modal-amount"></span></p>
                    <p><strong>Duration:</strong> <span id="modal-duration"></span> Seconds</p>
                    <p>Trade will complete in:</p>
                    <h3 id="countdown">...</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="assets/js/jquery.slim.min.js"></script> -->
    <script src="assets/js/sidebar.js"></script>
    <script src="assets/js/dashboard.js"></script>
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


        // $(document).ready(function() {
        //     $("#trade-form").submit(function(event) {
        //         event.preventDefault();

        //         let stock = $("#stock").val();
        //         let tradeType = $("#trade-type").val();
        //         let amount = $("#amount").val();
        //         let duration = $("#duration").val();
        //         let countdownTime = parseInt(duration);
        //         let balance = <?= $user['balance'] ?>

        //         if (!amount || amount <= 0) {
        //             alert("Please enter a valid amount.");
        //             return;
        //         }

        //         // Update modal with user input
        //         $("#modal-stock").text(stock);
        //         $("#modal-trade-type").text(tradeType);
        //         $("#modal-amount").text(amount);
        //         $("#modal-duration").text(duration);

        //         // Show modal
        //         $("#tradeModal").modal("show");

        //         // Start countdown
        //         let countdown = setInterval(function() {
        //             if (countdownTime <= 0) {
        //                 clearInterval(countdown);
        //                 $("#countdown").text("Trade Completed!");

        //                 // Simulate trade result
        //                 setTimeout(function() {
        //                     let result = Math.random() > 0.5 ? "Profit" : "Loss";
        //                     alert("Trade Result: " + result);
        //                     $("#tradeModal").modal("hide");
        //                 }, 1000);
        //             } else {
        //                 $("#countdown").text(countdownTime + "s");
        //             }
        //             countdownTime--;
        //         }, 1000);
        //     });
        // });

        $(document).ready(function() {
            $("#trade-form").submit(function(event) {
                event.preventDefault();

                let stock = $("#stock").val();
                let tradeType = $("#trade-type").val();
                let amount = parseFloat($("#amount").val());
                let duration = parseInt($("#duration").val());
                let balance = <?= $user['balance'] ?>;
                let trade_progress = <?= $user['trade_progress'] ?>;
                let user_id = <?= $user['id'] ?>

                // Validate amount
                if (!amount || amount <= 0) {
                    Swal.fire("Error", "Please enter a valid amount.", "error");
                    return;
                }

                // Check if user has enough balance
                if (amount > balance) {
                    Swal.fire("Error", "Insufficient balance!", "error");
                    return;
                }

                // Calculate trade result (Higher `trade_progress` means higher chance of winning)
                let winChance = Math.min(trade_progress / 100, 0.9); // Convert to percentage, max 90%
                let result = Math.random() < winChance ? "Profit" : "Loss";
                let profit = result === "Profit" ? amount * 1.2 : -amount; // Example profit/loss calculation

                // Send trade data to PHP backend (store result before timer starts)
                $.ajax({
                    url: "assets/php/process_trade.php",
                    type: "POST",
                    data: {
                        stock: stock,
                        tradeType: tradeType,
                        amount: amount,
                        duration: duration,
                        result: result,
                        profit: profit,
                        user_id: user_id
                    },
                    success: function(response) {
                        console.log(response);
                        let res = JSON.parse(response);
                        if (res.status === "success") {
                            // Update modal with user input
                            $("#modal-stock").text(stock);
                            $("#modal-trade-type").text(tradeType);
                            $("#modal-amount").text(amount);
                            $("#modal-duration").text(duration);

                            // Show trade modal
                            $("#tradeModal").modal("show");

                            // Start countdown before revealing the result
                            let countdownTime = duration;
                            let countdown = setInterval(function() {
                                if (countdownTime <= 0) {
                                    clearInterval(countdown);
                                    $("#countdown").text("Trade Completed!");

                                    // Reveal stored trade result
                                    setTimeout(function() {
                                        Swal.fire("Trade Result", "You got a " + result + "!", result === "Profit" ? "success" : "error");
                                        $("#tradeModal").modal("hide");
                                    }, 1000);
                                } else {
                                    $("#countdown").text(countdownTime + "s");
                                }
                                countdownTime--;
                            }, 1000);
                        } else {
                            Swal.fire("Error", res.message, "error");
                        }
                    },
                    error: function() {
                        Swal.fire("Error", "Something went wrong!", "error");
                    }
                });
            });
        });
    </script>

</body>

</html>