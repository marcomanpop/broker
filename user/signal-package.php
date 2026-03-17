<?php

include "config.php";

// Fetch signal packages
$sql = "SELECT * FROM signal_packages";
$result = $conn->query($sql);

// Generate dropdown options dynamically
$options = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['id'] . '" 
                        data-price="' . $row['price'] . '" 
                        data-accuracy="' . $row['accuracy'] . '" 
                        data-duration="' . $row['duration'] . '"
                        data-pname="' . $row['name'] . '"
                        data-roi="' . $row['roi'] . '" 
                        style="color: #000;">
                        ' . $row['name'] . '
                     </option>';
    }
}
$conn->close();

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
                        <!--    <img src="assets/images/ng.svg">-->
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
                    <p align="center"><strong>CHOOSE A SIGNAL PACKAGE</strong></p>
                </div>

                <div class="amount-card">
                    <form id="signal-form" class="trade-form">
                        <label>Select Signal Package:</label>
                        <select class="form-control" id="signal-package" required>
                            <option value="">-- Select a Package --</option>
                            <?php echo $options; ?>
                        </select>
                        <button type="submit" class="submit-btn" style="margin-top: 10px;">Subscribe</button>
                    </form>
                </div>
            </div>
    </section>
    
    <!-- Signal Package Confirmation Modal -->
    <!--<div class="modal fade" id="signalModal" tabindex="-1" role="dialog">-->
    <!--    <div class="modal-dialog" role="document">-->
    <!--        <div class="modal-content">-->
    <!--            <div class="modal-header">-->
    <!--                <h5 class="modal-title">Subscription Details</h5>-->
    <!--                <button type="button" class="close" data-dismiss="modal">&times;</button>-->
    <!--            </div>-->
    <!--            <div class="modal-body text-center">-->
    <!--                <p><strong>Package:</strong> <span id="modal-signal-package"></span></p>-->
    <!--                <p><strong>Subscription Fee:</strong> $<span id="modal-price"></span></p>-->
    <!--                <p><strong>Signal Accuracy:</strong> <span id="modal-accuracy"></span>%</p>-->
    <!--                <p><strong>Duration:</strong> <span id="modal-signal-duration"></span> Days</p>-->
    <!--                <p><strong>Expected ROI:</strong> <span id="modal-roi"></span>%</p>-->
    <!--            </div>-->
    <!--            <div class="modal-footer">-->
    <!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
    <!-- Subscription Modal -->
    <div class="modal fade" id="signalModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Subscription Details</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-center">
                    <p><strong>Package:</strong> <span id="modal-signal-package"></span></p>
                    <p><strong>Subscription Fee:</strong> $<span id="modal-price"></span></p>
                    <p><strong>Signal Accuracy:</strong> <span id="modal-accuracy"></span>%</p>
                    <p><strong>Duration:</strong> <span id="modal-signal-duration"></span> Days</p>
                    <p><strong>Expected ROI:</strong> <span id="modal-roi"></span>%</p>
                    <p><strong>Your Balance:</strong> $<span id="user-balance"><?= number_format($user['balance'], 2); ?></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="buy-now">Buy Now</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/sidebar.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha512-TPh2Oxlg1zp+kz3nFA0C5vVC6leG/6mm1z9+mA81MI5eaUVqasPLO8Cuk4gMF4gUfP5etR73rgU/8PNMsSesoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.min.js" integrity="sha512-7rusk8kGPFynZWu26OKbTeI+QPoYchtxsmPeBqkHIEXJxeun4yJ4ISYe7C6sz9wdxeE1Gk3VxsIWgCZTc+vX3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        
        $(document).ready(function() {
            $("#signal-form").submit(function(event) {
                event.preventDefault();
        
                let signalPackage = $("#signal-package option:selected");
        
                if (signalPackage.val() === "") {
                    alert("Please select a signal package.");
                    return;
                }
        
                let packageName = signalPackage.data("pname");
                let price = parseFloat(signalPackage.data("price"));
                let accuracy = signalPackage.data("accuracy");
                let duration = signalPackage.data("duration");
                let roi = signalPackage.data("roi");
                let userBalance = <?= $user['balance']?>;
        
                $("#modal-signal-package").text(packageName);
                $("#modal-price").text(price);
                $("#modal-accuracy").text(accuracy);
                $("#modal-signal-duration").text(duration);
                $("#modal-roi").text(roi);
        
                $("#signalModal").modal("show");
        
                $("#buy-now").off("click").on("click", function() {
                    if (userBalance < price) {
                        alert(`Insufficient balance. Please deposit funds. User Balance = ${userBalance} and Price = ${price}`);
                        return;
                    }
        
                    $.ajax({
                        type: "POST",
                        url: "assets/php/subscribe.php",
                        data: {
                            user_id: <?= $user['id'] ?>,
                            package_name: packageName,
                            price: price,
                            accuracy: accuracy,
                            duration: duration,
                            roi: roi
                        },
                        success: function(response) {
                            alert(response);
                            $("#signalModal").modal("hide");
                            location.reload();
                        },
                        error: function() {
                            alert("Error processing request.");
                        }
                    });
                });
            });
        });

    </script>

</body>

</html>