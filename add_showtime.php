<?php
if (isset($_POST)) {
    session_start();

    $seat = [
        'A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'A9', 'A10',
        'B1', 'B2', 'B3', 'B4', 'B5', 'B6', 'B7', 'B8', 'B9', 'B10',
        'C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10',
        'D1', 'D2', 'D3', 'D4', 'D5', 'D6', 'D7', 'D8', 'D9', 'D10',
        'E1', 'E2', 'E3', 'E4', 'E5', 'E6', 'E7', 'E8', 'E9', 'E10'
    ];

    $mysqli = require __DIR__ . "/database.php";

    $date = $_SESSION['date'];

    $theater = $_SESSION['theater'];

    $name = $_POST['name'];

    $time = $_POST['time'];

    $dub = $_POST['dub'];

    $sql_select = "SELECT movie_id FROM movie WHERE status in ('Now showing', 'Coming soon') and name = '$name'";

    $result = mysqli_query($conn, $sql_select);

    if (mysqli_num_rows($result) != 0) {
        $item = $result->fetch_assoc();

        $id = $item['movie_id'];

        $sql_insert = "INSERT INTO showtime(show_date, show_time, movie_id, theater, dub) VALUES ('$date', '$time', '$id', '$theater', '$dub')";

        $result_insert = mysqli_query($conn, $sql_insert);

        $sql_select = "SELECT show_id FROM showtime WHERE show_date = '$date' and show_time = '$time' and movie_id = '$id' and theater = '$theater' and dub = '$dub'";

        $result_select = mysqli_query($conn, $sql_select);

        $item = $result_select->fetch_assoc();

        $show_id = $item['show_id'];

        foreach ($seat as $seat_id) {
            $sql_insert = "INSERT INTO seat(show_id, seat_id, status) VALUES ('$show_id', '$seat_id', 'available')";

            $result_insert = mysqli_query($conn, $sql_insert);
        }

        $_SESSION['status'] = 'add_success';
    } else {
        $_SESSION['status'] = 'add_fail';
    }

    mysqli_close($conn);

    header('Location: system_st.php');
}
