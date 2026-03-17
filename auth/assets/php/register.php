<?php
include "../../../assets/php/connection.php";
// require_once "../../../assets/php/send_email.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// $fetchUsersSql = "SELECT * FROM users"; // Select all users
// $stmt = $conn->prepare($fetchUsersSql);
// $stmt->execute();
// $result = $stmt->get_result();

// // Fetch all rows as an associative array
// $users = $result->fetch_all(MYSQLI_ASSOC);
// echo '<pre>';
// print_r($users);
// echo '</pre>';
// Start transaction
$conn->begin_transaction();

// Function to sanitize input
function cleanInput($data)
{
    return htmlspecialchars(strip_tags(trim($data)));
}

// Retrieve and validate form data
$fullname = isset($_POST['fullname']) ? cleanInput($_POST['fullname']) : null;
$username = isset($_POST['username']) ? cleanInput($_POST['username']) : null;
$home_address = isset($_POST['home_address']) ? cleanInput($_POST['home_address']) : null;
$city = isset($_POST['city']) ? cleanInput($_POST['city']) : null;
$postal_code = isset($_POST['postal_code']) ? cleanInput($_POST['postal_code']) : null;
$country = isset($_POST['country']) ? cleanInput($_POST['country']) : null;
$currency = isset($_POST['currency']) ? cleanInput($_POST['currency']) : 'USD';
$phone = isset($_POST['phone']) ? cleanInput($_POST['phone']) : null;
$email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : null;
$password = $_POST['password'];

// // Debug: Display all received values
// echo "<h2>Received Form Data:</h2>";
// echo "<pre>";
// var_dump([
//     "fullname" => $fullname,
//     "username" => $username,
//     "home_address" => $home_address,
//     "city" => $city,
//     "postal_code" => $postal_code,
//     "country" => $country,
//     "currency" => $currency,
//     "phone" => $phone,
//     "email" => $email,
//     "password" => $password,
// ]);
// echo "</pre>";

// die();

// Validate required fields
if (!$fullname || !$username || !$phone || !$email || !$password) {
    header("Location: ../../register.php?message=" . urlencode("All required fields must be filled!") . "&message_type=danger");
    exit();
}

// Check if username, email, or phone already exists
$checkUserSql = "SELECT COUNT(*) AS count FROM users WHERE username = ? OR email = ? OR phone = ?";
$stmt = $conn->prepare($checkUserSql);
$stmt->bind_param('sss', $username, $email, $phone);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['count'] > 0) {
    header("Location: ../../register.php?message=" . urlencode("Username, email, or phone already in use!") . "&message_type=danger");
    exit();
}

// Hash the password securely
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Insert data into database
$insertSql = "INSERT INTO users (fullname, username, home_address, city, postal_code, country, currency, phone, email, password_hash, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($insertSql);
$stmt->bind_param('sssssssssss', $fullname, $username, $home_address, $city, $postal_code, $country, $currency, $phone, $email, $password_hash, $password);

// Prepare email details
$subject = "Welcome to Our Platform!";
$message = "
    <html>
    <head>
        <title>Welcome to Our Platform</title>
    </head>
    <body>
        <h1>Hi $fullname,</h1>
        <p>Welcome to our platform! Below are your account details:</p>
        <ul>
            <li><strong>Username:</strong> $username</li>
            <li><strong>Email:</strong> $email</li>
            <li><strong>Phone:</strong> $phone</li>
        </ul>
        <p>Please keep your credentials safe. If you have any questions, feel free to reach out to our support team.</p>
        <p>Best regards,</p>
        <p>The Support Team</p>
    </body>
    </html>
";

try {
    if (!$stmt->execute()) {
        throw new Exception("Database insertion failed: " . $stmt->error);
    }

    // Send welcome email
    // $email_status = sendNotificationEmail($email, $message, $subject);
    // if ($email_status !== true) {
    //     throw new Exception("Email sending failed: " . $email_status);
    // }

    // Commit transaction
    $conn->commit();

    // Redirect with success message
    $user_message = "Registration successful. Please check your email for confirmation.";
    header("Location: ../../login.php?message=" . urlencode($user_message) . "&message_type=success");
    exit();
} catch (Exception $e) {
    // Rollback transaction if an error occurs
    $conn->rollback();

    // Redirect with error message
    $error_message = "Something went wrong, try again.";
    header("Location: ../../register.php?message=" . urlencode($e->getMessage()) . "&message_type=danger");
    exit();
} finally {
    $stmt->close();
    $conn->close();
}
