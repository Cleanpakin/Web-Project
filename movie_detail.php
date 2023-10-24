<?php include 'header/front.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="image/icon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดภาพยนตร์</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mali&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Mali', cursive;
        }

        .videowrapper {
            float: none;
            clear: both;
            width: 100%;
            position: relative;
            padding-bottom: 56.25%;
            padding-top: 25px;
            height: 0;
        }

        .videowrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <?php include 'header/header.php'; ?>

    <?php
    if ($_GET['name'] != '') {
        $movie = $_GET['name'];

        $mysqli = require __DIR__ . "/database.php";

        $sql_select = "SELECT name, poster, category, viewer_rate, time_range, synopsis, trailer, director_name, director_pic FROM movie WHERE name = '$movie'";

        $result = mysqli_query($conn, $sql_select);

        $item = $result->fetch_assoc();
    } else {
        header('Location: index.php');
    }
    ?>

    <section class="text-white body-font bg-neutral-100" data-aos="fade-down" data-aos-duration="1000">
        <div class="container px-5 py-24 mx-auto grid lg:grid-cols-5 text-neutral-900 text-lg">
            <div class="lg:col-span-3 md:flex flex-row">
                <img class="object-cover object-center w-full md:w-[300px] md:h-[450px]" src="<?= $item['poster'] ?>" alt="stats">
                <div class="w-full content-start px-4 sm:pr-10">
                    <div class="w-full">
                        <h1 class="title-font font-semibold text-5xl pb-4 text-[#13015C]"><?= $item['name'] ?></h1>
                        <div class="leading-relaxed text-sm"><?= $item['synopsis'] ?></div>
                    </div>
                    <div class="grid grid-cols-4 mt-5 gap-5 mb-5">
                        <div>
                            <h2 class="title-font font-semibold text-1xl text-[#0074D5]">หมวดหมู่</h2>
                            <p class="leading-relaxed"><?= $item['category'] ?></p>
                        </div>
                        <div>
                            <h2 class="title-font font-semibold text-1xl text-[#0074D5]">เรทผู้ชม</h2>
                            <p class="leading-relaxed"><?= $item['viewer_rate'] ?></p>
                        </div>
                        <div>
                            <h2 class="title-font font-semibold text-1xl text-[#0074D5]">ความยาว</h2>
                            <p class="leading-relaxed"><?= $item['time_range'] ?> นาที</p>
                        </div>
                        <div>
                            <h2 class="title-font font-semibold text-1xl text-[#0074D5]">ผู้กำกับ</h2>
                            <p class="leading-relaxed"><?= $item['director_name'] ?></p>
                            <img class="w-14 h-14 my-1 rounded-full" src="<?= $item['director_pic'] ?>">
                        </div>
                    </div>
                    <a href="showtime.php?<?= $movie ?>">
                        <button class="mt-3 inline-block rounded px-6 pb-2 pt-2.5 text-lg font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150
        ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-blue-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] 
        focus:outline-none focus:ring-0 active:bg-blue-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] 
        dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] 
        dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] bg-gradient-to-r from-sky-500 to-indigo-500 hover:from-sky-600 hover:to-indigo-600">
                            ดูรอบฉายทั้งหมด
                        </button>
                    </a>
                </div>
            </div>
            <div class="mt-5 lg:mt-0 lg:col-span-2 w-full">
                <div class="videowrapper">
                    <iframe src="<?= $item['trailer'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <section class="text-neutral-800 body-font border-t-[#05173c] bg-neutral-100">
        <div class="container px-5 py-5 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-bold title-font mb-8 text-gray-900">นักแสดง</h1>
                <div class="flex flex-wrap -m-2">

                    <?php
                    $sql_select = "SELECT actor_name, actor_pic FROM actor JOIN present USING (actor_name) JOIN movie USING (movie_id) WHERE name = '$movie'";

                    $result = mysqli_query($conn, $sql_select);

                    while ($item = $result->fetch_assoc()) {
                        echo '<div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                        <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="' . $item['actor_pic'] . '">
                                        <div class="flex-grow">
                                            <h2 class="text-gray-900 title-font text-xl font-medium">' . $item['actor_name'] . '</h2>
                                        </div>
                                    </div>
                                </div>';
                    }
                    ?>

    </section>

    <?php include 'header/footer.php'; ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>