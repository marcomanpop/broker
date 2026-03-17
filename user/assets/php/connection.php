<?php

// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "aprobitmarket_db";

$servername = "localhost:3306";
$username = "civihqzq_new";
$password = "Y}.]Uw{]kehD";
$dbname = "civihqzq_new";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
