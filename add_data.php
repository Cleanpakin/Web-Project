<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();

    $mysqli = require __DIR__ . "/database.php";

    $columns = array(
        'name', 'poster', 'release_date', 'category', 'viewer_rate', 'time_range',
        'trailer', 'director_name', 'director_pic', 'synopsis', 'status'
    );

    foreach ($columns as $column) {
        ${$column} = $_POST[$column];
    }

    $sql_movie_insert =
        "INSERT INTO movie(name, poster, release_date, category, viewer_rate, time_range,
    trailer, director_name, director_pic, synopsis, status) VALUES ('$name', '$poster', '$release_date', 
    '$category', '$viewer_rate', '$time_range', '$trailer', '$director_name', '$director_pic', '$synopsis', '$status')";

    mysqli_query($conn, $sql_movie_insert);

    $sql_select_id = "SELECT movie_id FROM movie WHERE name = '$name'";

    $result = mysqli_query($conn, $sql_select_id);

    $movie_id = mysqli_fetch_assoc($result)['movie_id'];

    $actor_count = $_POST['actor_count'];

    for ($i = 1; $i <= $actor_count; $i++) {
        $actor_name = $_POST['actor_name' . $i];
        $actor_pic = $_POST['actor_pic' . $i];

        $sql_select_actor = "SELECT actor_name FROM actor WHERE actor_name = '$actor_name'";

        $result = mysqli_query($conn, $sql_select_actor);

        if (mysqli_num_rows($result) == 0) {
            $sql_actor_insert = "INSERT INTO actor(actor_name, actor_pic) VALUES ('$actor_name', '$actor_pic')";

            $result = mysqli_query($conn, $sql_actor_insert);
        }

        $sql_present_insert = "INSERT INTO present(movie_id, actor_name) VALUES ($movie_id, '$actor_name')";

        $result = mysqli_query($conn, $sql_present_insert);
    }

    mysqli_close($conn);

    $_SESSION['status'] = 'add_success';

    header('Location: system_m.php');
}
