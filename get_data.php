<?php
    if (isset($_POST)) {

        $raw_data = file_get_contents('php://input');

        $data = json_decode($raw_data, true);

        $mysqli = require __DIR__ . "/database.php";

        $movie_id = $data['movie_id'];

        $sql_select = "SELECT * FROM movie WHERE movie_id = '$movie_id'";

        $result = mysqli_query($conn, $sql_select);

        $movie_data = mysqli_fetch_assoc($result);

        $columns = array('name', 'poster', 'release_date', 'category', 'viewer_rate', 'time_range', 'trailer', 'director_name', 'director_pic', 'synopsis', 'status');

        $data_array = array();
        
        foreach ($columns as $column) {
            $data_array[$column] = $movie_data[$column];
        }

        $sql_select = "SELECT actor_name, actor_pic FROM present JOIN actor USING (actor_name) WHERE movie_id = '$movie_id'";

        $result = mysqli_query($conn, $sql_select);

        $actor_name_array = array();

        $actor_pic_array = array();

        $count = 0;

        while ($item = $result->fetch_assoc()) {
            $actor_name_array[] = $item['actor_name'];
            $actor_pic_array[] = $item['actor_pic'];

            $count += 1;
        }

        $data_array['actor_name'] = $actor_name_array;

        $data_array['actor_pic'] =  $actor_pic_array;

        $data_array['count'] = $count;

        $data_json = json_encode($data_array, JSON_PRETTY_PRINT);

        echo $data_json;

        mysqli_close($conn);
    }
