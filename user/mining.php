<?php

include "config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mining</title>
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
                        <div>Trojan</div>
                        <div class="verified"></div>
                    </div>
                    <div class="right">
                        <div class="flag" id="flag1" data-country="Nigeria">
                            <img src="assets/images/ng.svg">
                        </div>
                        <div class="nameicon" id="nameicon" data-name="Trojan">
                            <div id="name">
                                <span>T</span>
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

                            <a href="mining.php" data-highlight="url">
                                <img src="assets/images/sk.svg">
                                <div class="title">Mining
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

                            <a href="kyc-verification.php" data-highlight="url">
                                <img src="assets/images/verify.svg">
                                <div class="title">Verify Account
                                </div>
                            </a>

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
                    <p align="center"><strong>Mining</strong></p>
                </div>

                <div class="amount-card mb-3">
                    <form id="miner-form" class="investment-form">
                        <label>Select Mining Package:</label>
                        <select class="form-control" id="miner" required>
                            <option value="" disabled selected style="color: #000;">Loading miners...</option>
                        </select>

                        <br>

                        <label>Amount (<span id="crypto2"></span>)</label>
                        <input type="number" id="amount" class="form-control mb-2" placeholder="Enter amount" step="0.01" required>

                        <p id="miner-details" style="display: none;">
                            <strong>Min Amount:</strong> <span id="min-amount"></span> <span id="crypto3"></span> <br> <br>
                            <strong>Max Amount:</strong> <span id="max-amount"></span> <span id="crypto4"></span> <br> <br>
                            <strong>ROI:</strong> <span id="roi-rate"></span>% <br> <br>
                            <strong>Cycle (Duration):</strong> <span id="cycle"></span> Days <br> <br>
                            <!-- <strong>Cryptocurrency:</strong> <span id="crypto"></span> <br> <br> -->
                            <strong>Daily Profit:</strong> <span id="daily-profit">0</span> <br> <br>
                            <strong>Total Profit:</strong> <span id="total-profit">0</span> <span id="crypto"></span>
                        </p>

                        <button type="submit" class="submit-btn" style="margin-top: 10px;">Start Mining</button>
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


    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const minerSelect = document.getElementById("miner");
            const amountInput = document.getElementById("amount");
            const minAmountEl = document.getElementById("min-amount");
            const maxAmountEl = document.getElementById("max-amount");
            const roiRateEl = document.getElementById("roi-rate");
            const cycleEl = document.getElementById("cycle");
            const cryptoEl = document.getElementById("crypto");
            const cryptoEl2 = document.getElementById("crypto2");
            const cryptoEl3 = document.getElementById("crypto3");
            const cryptoEl4 = document.getElementById("crypto4");
            const minerDetails = document.getElementById("miner-details");
            const dailyProfitEl = document.getElementById("daily-profit");
            const totalProfitEl = document.getElementById("total-profit");

            // Fetch miners from the backend
            fetch("assets/php/get_miners.php")
                .then(response => response.json())
                .then(miners => {
                    minerSelect.innerHTML = '<option value="" disabled selected style="color: #000;">Select a Miner</option>';
                    miners.forEach(miner => {
                        const option = document.createElement("option");
                        option.value = miner.id;
                        option.dataset.min = miner.min_amount;
                        option.dataset.max = miner.max_amount;
                        option.dataset.roi = miner.roi;
                        option.dataset.cycle = miner.cycle;
                        option.dataset.crypto = miner.cryptocurrency;
                        option.textContent = `${miner.name} (${miner.roi}% ROI, ${miner.cycle} Days)`;
                        option.style = "color: #000";
                        minerSelect.appendChild(option);
                    });
                });

            // Update UI when a miner is selected
            minerSelect.addEventListener("change", function() {
                const selectedMiner = this.options[this.selectedIndex];
                const minAmount = parseFloat(selectedMiner.dataset.min);
                const maxAmount = parseFloat(selectedMiner.dataset.max);
                const roi = parseFloat(selectedMiner.dataset.roi);
                const cycle = parseInt(selectedMiner.dataset.cycle);
                const crypto = selectedMiner.dataset.crypto;

                minAmountEl.textContent = minAmount.toFixed(2);
                maxAmountEl.textContent = maxAmount.toFixed(2);
                roiRateEl.textContent = roi.toFixed(2);
                cycleEl.textContent = cycle;
                cryptoEl.textContent = crypto;
                cryptoEl2.textContent = crypto;
                cryptoEl3.textContent = crypto;
                cryptoEl4.textContent = crypto;
                minerDetails.style.display = "block";

                // Reset profit calculations
                amountInput.value = "";
                dailyProfitEl.textContent = "0";
                totalProfitEl.textContent = "0";
            });

            // Calculate profits based on user input
            amountInput.addEventListener("input", function() {
                const selectedMiner = minerSelect.options[minerSelect.selectedIndex];
                if (!selectedMiner.value) return;

                const minAmount = parseFloat(selectedMiner.dataset.min);
                const maxAmount = parseFloat(selectedMiner.dataset.max);
                const roi = parseFloat(selectedMiner.dataset.roi);
                const cycle = parseInt(selectedMiner.dataset.cycle);
                const amount = parseFloat(this.value);

                const dailyProfit = (amount * roi) / 100;
                const totalProfit = dailyProfit * cycle;

                if (!isNaN(amount) && amount < minAmount || amount > maxAmount) {
                    this.style.borderColor = "red";
                } else {
                    this.style.borderColor = "green";
                }

                dailyProfitEl.textContent = dailyProfit.toFixed(2);
                totalProfitEl.textContent = totalProfit.toFixed(2);
            });

            // Handle form submission
            document.getElementById("miner-form").addEventListener("submit", function(event) {
                event.preventDefault();
                if (!selectedMiner) {
                    alert("Please select a miner first.");
                    return;
                }
                const minerId = minerSelect.value;
                const amount = amountInput.value;

                const minAmount = parseFloat(selectedMiner.dataset.min);
                const maxAmount = parseFloat(selectedMiner.dataset.max);

                if (!minerId || !amount) {
                    alert("Please select a miner and enter an investment amount.");
                    return;
                }

                if (amount < minAmount || amount > maxAmount) {
                    alert(`Investment amount must be between $${minAmount} and $${maxAmount}.`);
                    this.value = "";
                    return;
                }

                fetch("purchase_miner.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            miner_id: minerId,
                            amount: amount
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert("Mining started successfully!");
                            location.reload();
                        } else {
                            alert("Error: " + data.message);
                        }
                    });
            });
        });
    </script> -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const minerSelect = document.getElementById("miner");
            const amountInput = document.getElementById("amount");
            const minAmountEl = document.getElementById("min-amount");
            const maxAmountEl = document.getElementById("max-amount");
            const roiRateEl = document.getElementById("roi-rate");
            const cycleEl = document.getElementById("cycle");
            const cryptoEl = document.getElementById("crypto");
            const minerDetails = document.getElementById("miner-details");
            const dailyProfitEl = document.getElementById("daily-profit");
            const totalProfitEl = document.getElementById("total-profit");
            const form = document.getElementById("miner-form");

            // Fetch miners from backend
            fetch("assets/php/get_miners.php")
                .then(response => response.json())
                .then(miners => {
                    minerSelect.innerHTML = '<option value="" disabled selected style="color: #000;">Select a Miner</option>';
                    miners.forEach(miner => {
                        const option = document.createElement("option");
                        option.value = miner.id;
                        option.dataset.min = miner.min_amount;
                        option.dataset.max = miner.max_amount;
                        option.dataset.roi = miner.roi;
                        option.dataset.cycle = miner.cycle;
                        option.dataset.crypto = miner.cryptocurrency;
                        option.textContent = `${miner.name} (${miner.roi}% ROI, ${miner.cycle} Days)`;
                        option.style = "color: #000";
                        minerSelect.appendChild(option);
                    });
                });

            // Update UI when a miner is selected
            minerSelect.addEventListener("change", function() {
                const selectedOption = this.options[this.selectedIndex];
                if (!selectedOption.value) return;

                const minAmount = parseFloat(selectedOption.dataset.min);
                const maxAmount = parseFloat(selectedOption.dataset.max);
                const roi = parseFloat(selectedOption.dataset.roi);
                const cycle = parseInt(selectedOption.dataset.cycle);
                const crypto = selectedOption.dataset.crypto;

                minAmountEl.textContent = minAmount.toFixed(2);
                maxAmountEl.textContent = maxAmount.toFixed(2);
                roiRateEl.textContent = roi.toFixed(2);
                cycleEl.textContent = cycle;
                cryptoEl.textContent = crypto;
                minerDetails.style.display = "block";

                // Reset input and profit display
                amountInput.value = "";
                amountInput.style.borderColor = "";
                dailyProfitEl.textContent = "0";
                totalProfitEl.textContent = "0";
            });

            // Allow typing but highlight input in red if it's below min
            amountInput.addEventListener("input", function() {
                const selectedOption = minerSelect.options[minerSelect.selectedIndex];
                if (!selectedOption.value) return;

                const minAmount = parseFloat(selectedOption.dataset.min);
                const maxAmount = parseFloat(selectedOption.dataset.max);
                const roi = parseFloat(selectedOption.dataset.roi);
                const cycle = parseInt(selectedOption.dataset.cycle);
                const amount = parseFloat(this.value);

                if (!isNaN(amount)) {
                    // Highlight red if below min, but don't interrupt typing
                    this.style.borderColor = amount < minAmount ? "red" : "";

                    // Calculate profits only if within valid range
                    if (amount >= minAmount && amount <= maxAmount) {
                        const dailyProfit = (amount * roi) / 100;
                        const totalProfit = dailyProfit * cycle;
                        dailyProfitEl.textContent = dailyProfit.toFixed(2);
                        totalProfitEl.textContent = totalProfit.toFixed(2);
                    } else {
                        dailyProfitEl.textContent = "0";
                        totalProfitEl.textContent = "0";
                    }
                } else {
                    dailyProfitEl.textContent = "0";
                    totalProfitEl.textContent = "0";
                }
            });

            // Validate on form submit
            form.addEventListener("submit", function(event) {
                event.preventDefault();

                const selectedOption = minerSelect.options[minerSelect.selectedIndex];
                if (!selectedOption.value) {
                    // alert("Please select a miner first.");
                    Swal.fire("Select Miner!", `Please select a miner first.`, "warning");
                    return;
                }

                const minAmount = parseFloat(selectedOption.dataset.min);
                const maxAmount = parseFloat(selectedOption.dataset.max);

                const displayCrypto = selectedOption.dataset.crypto;
                const amount = parseFloat(amountInput.value);

                if (isNaN(amount) || amount < minAmount || amount > maxAmount) {
                    Swal.fire("Invaild Amount!", `Investment amount must be between <br> ${minAmount} ${displayCrypto} and ${maxAmount} ${displayCrypto}.`, "warning");
                    return;
                }

                // Send purchase request
                // fetch("assets/php/purchase_miner.php", {
                //         method: "POST",
                //         headers: {
                //             "Content-Type": "application/json"
                //         },
                //         body: JSON.stringify({
                //             miner_id: selectedOption.value,
                //             amount: amount
                //         })
                //     })
                //     .then(response => response.json())
                //     .then(data => {
                //         if (data.success) {
                //             Swal.fire("Mining Successful!", "Your Mining started successfully.", "success");
                //             location.reload();
                //         } else {
                //             Swal.fire("Error!", "An error occurred while starting mining.", "error");
                //             console.log(data.message);
                //         }
                //     });

                // Prepare form data
                const formData = new FormData();
                formData.append("miner_id", selectedOption.value);
                formData.append("amount", amount);

                // Send purchase request
                fetch("assets/php/purchase_miner.php", {
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire("Mining Successful!", "Your mining started successfully.", "success")
                                .then(() => location.reload());
                        } else {
                            Swal.fire("Error!", data.message || "An error occurred while starting mining.", "error");
                        }
                    })
                    .catch(error => {
                        Swal.fire("Error!", "Something went wrong. Please try again.", "error");
                        console.error("Fetch error:", error);
                    });
            });
        });
    </script>




</body>

</html>