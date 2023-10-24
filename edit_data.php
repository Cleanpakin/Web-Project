<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();

    $mysqli = require __DIR__ . "/database.php";

    $columns = array(
        'id', 'name', 'poster', 'release_date', 'category', 'viewer_rate', 'time_range',
        'trailer', 'director_name', 'director_pic', 'synopsis', 'status'
    );

    foreach ($columns as $column) {
        ${$column} = $_POST[$column];
    }

    $sql_movie_update = "UPDATE movie SET name = '$name', poster = '$poster', release_date = '$release_date', category = '$category',
    viewer_rate = '$viewer_rate', time_range = '$time_range', trailer = '$trailer', director_name = '$director_name',
    director_pic = '$director_pic', synopsis = '$synopsis', status = '$status' WHERE movie_id = $id";

    mysqli_query($conn, $sql_movie_update);

    $sql_present_delete = "DELETE FROM present WHERE movie_id = $id";

    mysqli_query($conn, $sql_present_delete);

    $actor_count = $_POST['actor_count'];

    for ($i = 1; $i <= $actor_count; $i++) {
        $actor_name = $_POST['actor_name' . $i];
        $actor_pic = $_POST['actor_pic' . $i];

        $sql_select_actor = "SELECT actor_name FROM actor WHERE actor_name = '$actor_name'";

        $result = mysqli_query($conn, $sql_select_actor);

        if (mysqli_num_rows($result) == 0) {
            $sql_actor_insert = "INSERT INTO actor(actor_name, actor_pic) VALUES ('$actor_name', '$actor_pic')";

            $result = mysqli_query($conn, $sql_actor_insert);
        } else {
            $sql_actor_update = "UPDATE actor SET actor_name = '$actor_name', actor_pic = '$actor_pic' WHERE actor_name = '$actor_name'";

            $result = mysqli_query($conn, $sql_actor_update);
        }

        $sql_present_insert = "INSERT INTO present(movie_id, actor_name) VALUES($id, '$actor_name')";

        $result = mysqli_query($conn, $sql_present_insert);
    }

    mysqli_close($conn);

    $_SESSION['status'] = 'edit_success';

    header('Location: system_m.php');
}