<?php

include "config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Investing Packages</title>
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
                    <p align="center"><strong>INVEST IN A PACKAGE</strong></p>
                </div>

                <div class="amount-card">
                    <form id="investment-form" class="investment-form">
                        <label>Select Investment Package:</label>
                        <select class="form-control" id="package" required>
                            <option value="" disabled selected style="color: #000;">Select a Package</option>
                            <option value="basic" data-min="50" data-max="500" data-interest="5" data-duration="30" style="color: #000;">Basic Plan (5% Daily, 30 Days)</option>
                            <option value="standard" data-min="500" data-max="5000" data-interest="7" data-duration="60" style="color: #000;">Standard Plan (7% Daily, 60 Days)</option>
                            <option value="premium" data-min="5000" data-max="50000" data-interest="10" data-duration="90" style="color: #000;">Premium Plan (10% Daily, 90 Days)</option>
                        </select>

                        <label>Investment Amount ($):</label>
                        <input type="number" id="amount" class="form-control" placeholder="Enter amount" required>

                        <p id="package-details" style="display: none;">
                            <strong>Min:</strong> $<span id="min-amount"></span> |
                            <strong>Max:</strong> $<span id="max-amount"></span> |
                            <strong>Interest:</strong> <span id="interest-rate"></span>% |
                            <strong>Duration:</strong> <span id="duration"></span> Days
                        </p>

                        <p><strong>Daily Profit:</strong> $<span id="daily-profit">0</span></p>
                        <p><strong>Total Profit:</strong> $<span id="total-profit">0</span></p>

                        <button type="submit" class="submit-btn" style="margin-top: 10px;">Start Investment</button>
                    </form>
                </div>
            </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="investmentModal" tabindex="-1" role="dialog" aria-labelledby="investmentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Investment Started</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <p><strong>Package:</strong> <span id="modal-package"></span></p>
                    <p><strong>Amount:</strong> $<span id="modal-amount"></span></p>
                    <p><strong>Daily Profit:</strong> $<span id="modal-daily-profit"></span></p>
                    <p><strong>Duration:</strong> <span id="modal-duration"></span> Days</p>
                    <p><strong>Total Profit:</strong> $<span id="modal-total-profit"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/sidebar.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha512-TPh2Oxlg1zp+kz3nFA0C5vVC6leG/6mm1z9+mA81MI5eaUVqasPLO8Cuk4gMF4gUfP5etR73rgU/8PNMsSesoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.min.js" integrity="sha512-7rusk8kGPFynZWu26OKbTeI+QPoYchtxsmPeBqkHIEXJxeun4yJ4ISYe7C6sz9wdxeE1Gk3VxsIWgCZTc+vX3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $("#investment-form").submit(function(event) {
                event.preventDefault();

                let selectedPackage = $("#package option:selected");
                let packageName = selectedPackage.val();
                let minAmount = parseFloat(selectedPackage.data("min"));
                let maxAmount = parseFloat(selectedPackage.data("max"));
                let interestRate = parseFloat(selectedPackage.data("interest"));
                let duration = parseInt(selectedPackage.data("duration"));
                let amount = parseFloat($("#amount").val());
                let user_id = <?= $user['id'] ?>;
                let user_balance = <?= $user['balance'] ?>;

                if (amount > user_balance) {
                    Swal.fire("Insufficient Balance!", `You do not have enough balance. Your balance is $${user_balance}.`, "warning");
                    return;
                }

                if (!packageName) {
                    Swal.fire("Error!", "Please select an investment package.", "error");
                    return;
                }

                if (!amount || amount < minAmount || amount > maxAmount) {
                    Swal.fire("Invalid Amount!", `Amount should be between $${minAmount} and $${maxAmount}.`, "warning");
                    return;
                }

                let dailyProfit = (amount * interestRate) / 100;
                let totalProfit = dailyProfit * duration;

                // Show Confirmation Modal
                Swal.fire({
                    title: "Confirm Investment",
                    html: `
                <p><strong>Package:</strong> ${selectedPackage.text()}</p>
                <p><strong>Amount:</strong> $${amount}</p>
                <p><strong>Daily Profit:</strong> $${dailyProfit.toFixed(2)}</p>
                <p><strong>Duration:</strong> ${duration} Days</p>
                <p><strong>Total Profit:</strong> $${totalProfit.toFixed(2)}</p>
            `,
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonText: "Start Investment",
                    cancelButtonText: "Cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send data to PHP Backend
                        $.ajax({
                            type: "POST",
                            url: "assets/php/process_investment.php",
                            data: {
                                package: packageName,
                                amount: amount,
                                daily_profit: dailyProfit,
                                total_profit: totalProfit,
                                duration: duration,
                                user_id: user_id
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.status === "success") {
                                    // Update modal
                                    $("#modal-package").text(selectedPackage.text());
                                    $("#modal-amount").text(amount);
                                    $("#modal-daily-profit").text(dailyProfit.toFixed(2));
                                    $("#modal-duration").text(duration);
                                    $("#modal-total-profit").text(totalProfit.toFixed(2));

                                    // Show investment modal
                                    $("#investmentModal").modal("show");

                                    // Start Countdown
                                    // let countdownTime = duration * 24 * 60 * 60; // Convert days to seconds
                                    // let countdownInterval = setInterval(function() {
                                    //     if (countdownTime <= 0) {
                                    //         clearInterval(countdownInterval);
                                    //         $("#countdown").text("Investment Completed!");
                                    //     } else {
                                    //         let days = Math.floor(countdownTime / (24 * 60 * 60));
                                    //         $("#countdown").text(`${days} Days Remaining`);
                                    //     }
                                    //     countdownTime -= 24 * 60 * 60;
                                    // }, 1000);

                                    Swal.fire("Success!", "Your investment has started!", "success");
                                } else {
                                    Swal.fire("Error!", response.message, "error");
                                }
                            },
                            error: function(response) {
                                Swal.fire("Error!", "Something went wrong. Please try again.", "error");
                                console.log(response);
                            }
                        });
                    }
                });
            });
        });
    </script>


</body>

</html>