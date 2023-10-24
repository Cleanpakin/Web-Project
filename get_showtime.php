<?php
if (isset($_POST)) {
    session_start();

    $raw_data = file_get_contents('php://input');

    $data = json_decode($raw_data, true);

    $mysqli = require __DIR__ . "/database.php";

    $date = $data['date'];

    $theater = $data['theater'];

    $_SESSION['date'] = $date;

    $_SESSION['theater'] = $theater;

    $sql_select = "SELECT DISTINCT name, poster FROM showtime JOIN movie USING (movie_id) WHERE show_date = '$date' and theater = '$theater'";

    $result = mysqli_query($conn, $sql_select);

    $showtime_array = array();

    if (mysqli_num_rows($result) > 0) {

        while ($item = $result->fetch_assoc()) {
            $name_array = array();

            $name_array['name'] = $item['name'];
            $name_array['poster'] = $item['poster'];

            $showtime_array[] = $name_array;
        }

        for ($i = 0; $i < count($showtime_array); $i++) {
            $id_array = array();
            $time_array = array();
            $dub_array = array();

            $name = $showtime_array[$i]['name'];

            $sql_select = "SELECT show_id, show_time, dub FROM showtime JOIN movie USING (movie_id) WHERE show_date = '$date' and theater = '$theater' and name = '$name' ORDER BY show_time ASC";

            $result = mysqli_query($conn, $sql_select);

            while ($item = $result->fetch_assoc()) {
                $id_array[] = $item['show_id'];
                $time_array[] = $item['show_time'];
                $dub_array[] = $item['dub'];
            }

            $showtime_array[$i]['id'] = $id_array;
            $showtime_array[$i]['show_time'] = $time_array;
            $showtime_array[$i]['dub'] = $dub_array;
        }
    }

    $data_json = json_encode($showtime_array, JSON_PRETTY_PRINT);

    echo $data_json;

    mysqli_close($conn);
}
