<?php
include "../../../assets/php/connection.php";

$sql = "SELECT id, name, roi, max_amount, min_amount, cycle, cryptocurrency FROM miners";
$result = $conn->query($sql);

$miners = [];
while ($row = $result->fetch_assoc()) {
    $miners[] = $row;
}

echo json_encode($miners);
