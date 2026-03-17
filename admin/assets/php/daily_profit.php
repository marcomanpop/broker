<?php

include('config/connection.php');
    require_once 'send_email.php';

$sql = "SELECT * FROM investments WHERE status = 'Active'";
$result = mysqli_query($conn, $sql);

// Check if the query executed successfully
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Extract values from the row
        $id = $row['id'];
        $user_id = $row['user_id'];
        $rate = $row['rate'];
        $amount = $row['amount'];
        $duration = $row['duration'];
        $days_spent = $row['days_spent'];
        $status = $row['status'];
    
        if ($status == 'Active') {
            if ($days_spent < $duration) {
                $days_spent += 1;
                $daily_profit = ($rate / 100) * $amount;
                $msg = "Your daily profit is $" . number_format($daily_profit, 2) . ".";
    
                // Use prepared statements for the queries
                $stmt1 = $conn->prepare("INSERT INTO notifications (receiver_id, message, type, role) VALUES (?, ?, 'Daily Profit', 'Admin')");
                $stmt1->bind_param("is", $user_id, $msg);
                $stmt1->execute();
                $stmt1->close();
    
                $stmt2 = $conn->prepare("UPDATE investments SET days_spent = ? WHERE id = ?");
                $stmt2->bind_param("ii", $days_spent, $id);
                $stmt2->execute();
                $stmt2->close();
            } elseif ($days_spent == $duration) {
                
                $sql_user = "SELECT email, firstname FROM users WHERE id = '$user_id'";
                $result_user = mysqli_query($conn, $sql_user);

                $email = $row['email'];
                $name = $row['firstname'];

                $message_title = "Your Plan Has Ended";

                $message = " Dear ".$name.",

                We hope you enjoyed the benefits of your plan. We would like to inform you that your subscription has ended as of today.

                Thank you for choosing our services. We value your membership and would love to continue serving you. Please feel free to explore our other plans and let us know if you have any questions or need assistance with renewing your subscription.

                Best regards,

                URUNWA ";
                
                // $days_spent += 1;
                $daily_profit = ($rate / 100) * $amount;
                $total_profit = $daily_profit * $duration;

                $msg2 = "Your investment plan has been completed and you have received a profit of ($" . number_format($total_profit, 2) . ") Your profit and invested amount ($".number_format($amount, 2).") have been sent to your main balance.";
    
                $stmt2 = $conn->prepare("UPDATE investments SET status = 'Completed' WHERE id = ?");
                $stmt2->bind_param("i", $id);
                $stmt2->execute();
                $stmt2->close();
    
                $stmt3 = $conn->prepare("INSERT INTO notifications (receiver_id, message, type, role) VALUES (?, ?, 'Total Profit', 'Admin')");
                $stmt3->bind_param("is", $user_id, $msg2);
                $stmt3->execute();
                $stmt3->close();
    
                $stmt4 = $conn->prepare("UPDATE users SET investment_balance = investment_balance - ?, balance = balance + ? + ? WHERE id = ?");
                $stmt4->bind_param("dddi", $amount, $amount, $total_profit, $user_id);
                $update_balance = $stmt4->execute();
                $stmt4->close();

                if ($update_balance) {
                    $email_result = sendNotificationEmail($email, $message, $message_title);
                }

            }
        }
    }

    // Provide feedback or perform any other necessary actions
    echo "Daily Profit Successful";

} else {
    // Handle the case where the query failed
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>
