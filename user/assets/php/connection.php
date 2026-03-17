<?php

// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "aprobitmarket_db";

$servername = "localhost:3306";
$username = "bitpromarketprim_user";
$password = "bitpromarketprim_user";
$dbname = "bitpromarketprim_database";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
