<?php
if (isset($_GET['movie_id'])) {
    session_start();

    $movie_id = $_GET['movie_id'];

    $mysqli = require __DIR__ . "/database.php";

    $sql_delete = "DELETE FROM movie WHERE movie_id = '$movie_id'";

    mysqli_query($conn, $sql_delete);

    mysqli_close($conn);

    $_SESSION['status'] = 'delete_success';

    header('Location: system_m.php');
}
