<?php
if (isset($_GET['id'])) {
    session_start();

    $id = $_GET['id'];

    $mysqli = require __DIR__ . "/database.php";

    $sql_delete = "DELETE FROM showtime WHERE show_id = '$id'";

    mysqli_query($conn, $sql_delete);

    mysqli_close($conn);

    $_SESSION['status'] = 'delete_success';

    header('Location: system_st.php');
}
