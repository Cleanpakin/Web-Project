<?php
session_start();

if (isset($_GET['show_id'])) {
    $_SESSION['show_id'] = $_GET['show_id'];
}

if (isset($_POST)) {
    $raw_data = file_get_contents('php://input');

    $data = json_decode($raw_data, true);

    $_SESSION['seat_id'] = $data['seat_id'];
    $_SESSION['total_price'] = $data['total_price'];
}
