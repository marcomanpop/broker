<?php

include "connection.php";
// require_once "send_email.php";

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Log successful connection in browser console
if ($conn->connect_error) {
    die("<script>console.error('Connection failed: " . $conn->connect_error . "');</script>");
} else {
    echo "<script>console.log('Connected to the database');</script>";
}

// Fetch active investments where duration_spent starts at 0
$withdrawal_sql = "
    SELECT 
        investments.*,
        users.profit_balance AS user_balance,
        users.currency AS user_currency
    FROM investments
    INNER JOIN users ON investments.user_id = users.id
    WHERE investments.status = 'active' AND investments.duration_spent < investments.duration
";
$withdrawal_stmt = $conn->prepare($withdrawal_sql);
$withdrawal_stmt->execute();
$withdrawal_result = $withdrawal_stmt->get_result();

if ($withdrawal_result->num_rows > 0) {
    while ($row = $withdrawal_result->fetch_assoc()) {
        $user_id = $row['user_id'];
        $package_name = $row['package'];
        $amount = $row['amount'];
        $status = $row['status'];
        $end_date = $row['end_date'];
        $days_spent = $row['duration_spent']; // Starts from 0
        $duration = $row['duration'];
        $total_profit = $row['total_profit'];
        $investment_id = $row['id'];
        $user_balance = $row['user_balance'];
        $user_currency = $row['user_currency'];
        $daily_income = $row['daily_profit']; // Use the fetched daily profit

        if ($days_spent < $duration && $status == 'active') {
            // Start a database transaction
            $conn->begin_transaction();

            try {
                // Increment days spent
                $days_spent += 1;
                $userNewBalance = $user_balance + $daily_income;

                // Update user balance
                $updateUserBalanceSql = "UPDATE users SET profit_balance = ? WHERE id = ?";
                $updateUserBalanceStmt = $conn->prepare($updateUserBalanceSql);
                $updateUserBalanceStmt->bind_param("di", $userNewBalance, $user_id);
                $updateUserBalanceStmt->execute();

                // Determine if investment should be completed
                if ($days_spent == $duration) {
                    $updateInvestmentSql = "UPDATE investments SET status = 'completed', duration_spent = ? WHERE id = ?";
                    $notificationSubject = "Congratulations! Your $package_name package is completed.";
                    $notificationMessage = "Congratulations! You have received your last daily profit of " . $user_currency . number_format($daily_income, 2) . " for your $package_name package. Total profit earned: " . $user_currency . number_format($total_profit, 2) . ".";
                } else {
                    $updateInvestmentSql = "UPDATE investments SET duration_spent = ? WHERE id = ?";
                    $notificationSubject = "Daily Profit Received!";
                    $notificationMessage = "You have received a daily profit of " . $user_currency . number_format($daily_income, 2) . " for your $package_name package.";
                }

                // Update investment duration_spent and status
                $updateInvestmentStmt = $conn->prepare($updateInvestmentSql);
                $updateInvestmentStmt->bind_param("ii", $days_spent, $investment_id);
                $updateInvestmentStmt->execute();

                // Insert profit record
                // $insertProfitSql = "INSERT INTO profits (user_id, amount, package_name) VALUES (?, ?, ?)";
                // $insertProfitStmt = $conn->prepare($insertProfitSql);
                // $insertProfitStmt->bind_param("ids", $user_id, $daily_income, $package_name);
                // $insertProfitStmt->execute();

                // Insert notification
                // $insertNotificationSql = "INSERT INTO notifications (user_id, title, message, created_at) VALUES (?, 'Daily Profit', ?, NOW())";
                // $insertNotificationStmt = $conn->prepare($insertNotificationSql);
                // $insertNotificationStmt->bind_param("is", $user_id, $notificationMessage);
                // $insertNotificationStmt->execute();

                // Commit the transaction
                $conn->commit();

                // Log success in console
                echo "<script>console.log('Investment updated: User ID: $user_id, Old Balance: $user_balance, New Balance: $userNewBalance, Daily Income: $daily_income');</script>";
            } catch (Exception $e) {
                // Rollback transaction in case of an error
                $conn->rollback();

                // Log error in console
                $error_message = "Error processing investment for User ID $user_id: " . $e->getMessage();
                echo "<script>console.error(" . json_encode($error_message) . ");</script>";
            }
        }
    }
} else {
    echo "<script>console.warn('No active investments found');</script>";
}

// Close the database connection
$withdrawal_stmt->close();
$conn->close();
