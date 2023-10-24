<?php
session_start();

if ($_SESSION['user_type'] != 'emp_back' || !isset($_SESSION['user_id'])) {
    header('Location: login.php');
}
?>