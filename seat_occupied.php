<?php
session_start();

$show_id = $_SESSION['show_id'];

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT seat_id FROM seat WHERE status = 'occupied' AND show_id = '$show_id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $occupied_seat = array();
    while ($row = $result->fetch_assoc()) {
        $occupied_seat[] = $row["seat_id"];
    }
} else {
    $occupied_seat = array();
}

$conn->close();

echo json_encode($occupied_seat);
?>