<?php
if (isset($_POST)) {
    session_start();
    
    $mysqli = require __DIR__ . "/database.php";

    $id = $_POST['id'];

    $time = $_POST['time'];

    $dub = $_POST['dub'];

    $sql_update = "UPDATE showtime SET show_time = '$time', dub = '$dub' WHERE show_id = $id";

    $result = mysqli_query($conn, $sql_update);

    mysqli_close($conn);

    $_SESSION['status'] = 'edit_success';

    header('Location: system_st.php');
}
