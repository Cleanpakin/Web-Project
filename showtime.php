<?php include 'header/front.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="image/icon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เลือกรอบฉายภาพยนตร์</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mali&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Mali', cursive;
        }
    </style>
</head>

<body class="bg-[#eee]">

    <?php include 'header/header.php'; ?>

    <?php
    if (isset($_GET['name'])) {
        $_SESSION['movie'] = $_GET['name'];
    }

    if ($_SESSION['movie'] == '') {
        header('Location: index.php');
    }

    $movie = $_SESSION['movie'];

    $_SESSION['show_id'] = '';
    $_SESSION['seat_id'] = [];
    $_SESSION['total_price'] = '';

    $mysqli = require __DIR__ . "/database.php";

    $sql_select = "SELECT movie_id, name, poster, category, viewer_rate, time_range FROM movie WHERE name = '$movie'";

    $result = mysqli_query($conn, $sql_select);

    $item = $result->fetch_assoc();
    ?>

    <div class="">
        <div>
            <ol class="grid grid-cols-1 divide-x divide-gray-100 overflow-hidden border border-gray-100 text-sm text-gray-500 sm:grid-cols-4 bg-[#f9f9f9]">

                <li class="flex items-center bg-gradient-to-r from-sky-500 to-indigo-500 justify-center gap-2 p-4">
                    <svg class="h-7 w-7 shrink-0 text-[#eee]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                    </svg>

                    <p class="leading-none text-[#eee]">
                        <strong class="block font-medium"> เลือกรอบฉาย </strong>
                        <small class="mt-1"></small>
                    </p>
                </li>


                <li class="relative flex items-center justify-center gap-2 p-4">
                    <svg class="h-7 w-7 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>

                    <p class="leading-none">
                        <strong class="block font-medium"> เลือกที่นั่ง </strong>
                    </p>
                </li>

                <li class="flex items-center justify-center gap-2 p-4">
                    <svg class="h-7 w-7 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>

                    <p class="leading-none">
                        <strong class="block font-medium"> ชำระเงิน </strong>
                    </p>
                </li>

                <li class="flex items-center justify-center gap-2 p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 shrink-0 text-gray-500" fill="#6b7280" stroke="currentColor" stroke-width="2" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z" />
                    </svg>

                    <p class="leading-none">
                        <strong class="block font-medium"> เสร็จสิ้น </strong>
                    </p>
                </li>
            </ol>
        </div>
    </div>
    <!-- hero -->
    <section class="text-white body-font overflow-hidden bg-[#E5E5E5]">
        <div class="container grid px-5 py-12 mx-auto justify-items-center">
            <div class="w-full lg:w-6/12 sm:w-6/6 md:6/12 mx-auto flex flex-wrap items-center">
                <img alt="" class="lg:w-[260px] w-[260px] lg:h-[380px]  rounded" src="<?= $item['poster'] ?>">
                <div class="lg:w-6/12 md:w-6/12 pl-4 lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h2 class="text-sm title-font text-[#0074D5] tracking-widest mb-2">Movie name</h2>
                    <h1 class="text-[#13015C] text-4xl title-font font-semibold mb-2"><?= $item['name'] ?></h1>
                    <div class="flex mb-2">
                    </div>
                    <div class="flex mb-6 text-[#000000]">
                        <?php echo $item['category'] ?>
                        </span>
                    </div>
                    <div class="flex mb-4 ">
                        <span class="flex  py-2 space-x-2s">
                            <span class="text-[#000000]">เรทผู้ชม: <?= $item['viewer_rate'] ?></span>
                        </span>
                        <span class="flex ml-2  py-2 border-l-2 border-neutral-400 space-x-2s">
                            <span class="text-[#000000] ml-2"><?= $item['time_range'] ?> นาที</span>
                        </span>
                    </div>

                    <?php
                    if ($_SESSION['user_type'] != 'emp_front') {
                        echo '<a href="movie_detail.php?name=' . $item['name'] . '"><button class="mt-3 inline-block rounded px-6 pb-2 pt-2.5 text-lg font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150
                        ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-blue-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] 
                        focus:outline-none focus:ring-0 active:bg-blue-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] 
                        dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] 
                        dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] bg-gradient-to-r from-sky-500 to-indigo-500 hover:from-sky-600 hover:to-indigo-600">รายละเอียด</button></a>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>

    <?php
    $movie_id = $item['movie_id'];

    for ($i = 0; $i < 6; $i++) {
        ${'day' . $i} = date('D d M', strtotime("+$i day"));
        ${'date' . $i} = date('Y-m-d', strtotime("+$i day"));
    }

    date_default_timezone_set('Asia/Bangkok');

    $current_time = date("H:i");
    ?>

    <!--โรงหนัง-->
    <section class="text-white body-font overflow-hidden bg-[#E5E5E5]">
        <div class="max-w-2xl mx-auto mb-20">
            <div class="border-b border-gray-200 dark:border-gray-700 mb-4">
                <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300 active" id="day0-tab" data-tabs-target="#day0" type="button" role="tab" aria-controls="day0" aria-selected="true"><?= $day0 ?></button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="day1-tab" data-tabs-target="#day1" type="button" role="tab" aria-controls="day1" aria-selected="false"><?= $day1 ?></button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="day2-tab" data-tabs-target="#day2" type="button" role="tab" aria-controls="day2" aria-selected="false"><?= $day2 ?></button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="day3-tab" data-tabs-target="#day3" type="button" role="tab" aria-controls="day3" aria-selected="false"><?= $day3 ?></button>
                    </li>
                    <li role="presentation">
                        <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="day4-tab" data-tabs-target="#day4" type="button" role="tab" aria-controls="day4" aria-selected="false"><?= $day4 ?></button>
                    </li>
                </ul>
            </div>

            <div id="myTabContent">

                <!-- Day 1 -->
                <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800" id="day0" role="tabpanel" aria-labelledby="day0-tab">

                    <?php
                    $sql_theater = "SELECT distinct theater FROM showtime WHERE movie_id = '$movie_id' and show_date = '$date0' order by theater asc";

                    $result_t = mysqli_query($conn, $sql_theater);

                    if (mysqli_num_rows($result_t) > 0) {
                        while ($item_t = $result_t->fetch_assoc()) {
                            $theater = $item_t['theater'];

                            echo '<div class="mx-auto text-gray-700 mb-0.5 h-30">
                                <div class="flex p-3">
                                    <span class="text-2xl leading-4 font-medium text-black-500">Theater ' . $theater . '</span>
                                </div>';

                            $sql_dub = "SELECT distinct dub FROM showtime WHERE movie_id = '$movie_id' and show_date = '$date0' and theater = '$theater' order by show_time asc";

                            $result_d = mysqli_query($conn, $sql_dub);

                            while ($item_d = $result_d->fetch_assoc()) {
                                $dub = $item_d['dub'];

                                echo '<div class="flex">
                                    <div class="ml-3 my-5 p-1 flex space-y-1 border-r-2 pr-3 ">
                                        <div>
                                            <svg viewBox="0 0 405.88 359.77" class="w-[18px] h-[18px] pt-2">
                                                <path d="M226.08,359.77a11.5,11.5,0,0,1-6.9-2.3L112.91,277.7C107.14,274,93,264.48,93,248.58V111.87c0-14.3,10.53-23.39,19.81-29.72L219.17,2.3a11.5,11.5,0,0,1,6.9-2.3,26.53,26.53,0,0,1,26.5,26.5V333.27A26.53,26.53,0,0,1,226.08,359.77ZM228.55,24L126.4,100.7,126,101c-6.7,4.55-10,8.11-10,10.85V248.58c0,1.39,1.27,4.53,9.76,10,0.22,0.14.44,0.29,0.65,0.45l102.15,76.67a3.49,3.49,0,0,0,1-2.48V26.5A3.49,3.49,0,0,0,228.55,24Z" class="cls-1"></path>
                                                <path d="M104.5,261.94h-78C11.89,261.94,0,251.41,0,238.47V121.3c0-12.94,11.89-23.47,26.5-23.47h78a11.5,11.5,0,0,1,11.5,11.5V250.44A11.5,11.5,0,0,1,104.5,261.94ZM23,237.9a5.59,5.59,0,0,0,3.5,1H93V120.82H26.5a5.59,5.59,0,0,0-3.5,1v116Z" class="cls-1"></path>
                                                <path d="M323.7,313.84a11.5,11.5,0,0,1-6-21.3,136.47,136.47,0,0,0,5-229.53A11.5,11.5,0,1,1,335.6,43.94a159.44,159.44,0,0,1-5.9,268.2A11.45,11.45,0,0,1,323.7,313.84Z" class="cls-1"></path>
                                                <path d="M289.25,269.35a11.5,11.5,0,0,1-5.35-21.69,80.75,80.75,0,0,0,7.68-138.47,11.5,11.5,0,1,1,12.88-19.06A103.75,103.75,0,0,1,294.58,268,11.45,11.45,0,0,1,289.25,269.35Z" class=""></path>
                                            </svg>
                                        </div>
                                        <div class="pl-2">' . $dub . '</div>
                                    </div>';

                                $sql_time = "SELECT show_id, show_time FROM showtime WHERE movie_id = '$movie_id' and show_date = '$date0' and theater = '$theater' and dub = '$dub' order by show_time asc";

                                $result_st = mysqli_query($conn, $sql_time);

                                while ($item_st = $result_st->fetch_assoc()) {

                                    if ($current_time > $item_st['show_time']) {
                                        echo '<div class="ml-3 my-5 p-1 ">
                                                <button type="submit" data-show_id="' . $item_st['show_id'] . '" class="text-white bg-gradient-to-r from-sky-300 to-indigo-300 hover:from-sky-300 hover:to-indigo-300
                                                font-medium rounded-lg text-md px-5 py-2.5 text-center mr-2 mb-2 show-button disabled">' . $item_st['show_time'] . '</button>
                                            </div>';
                                    } else {
                                        echo '<div class="ml-3 my-5 p-1 ">
                                                <a href="seat.php"><button type="submit" data-show_id="' . $item_st['show_id'] . '" class="text-white bg-gradient-to-r from-sky-500 to-indigo-500 hover:from-sky-600 hover:to-indigo-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800
                                                font-medium rounded-lg text-md px-5 py-2.5 text-center mr-2 mb-2 show-button">' . $item_st['show_time'] . '</button></a>
                                            </div>';
                                    }             
                                }

                                echo '</div>';
                            }

                            echo '</div>';
                        }
                    } else {
                        echo '<p class="text-gray-500 dark:text-gray-400 text-sm">ไม่มีรอบฉายในวันที่เลือก</p>';
                    }
                    ?>

                </div>

                <!-- Day 2 -->
                <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800 hidden" id="day1" role="tabpanel" aria-labelledby="day1-tab">

                    <?php
                    $sql_theater = "SELECT distinct theater FROM showtime WHERE movie_id = '$movie_id' and show_date = '$date1' order by theater asc";

                    $result_t = mysqli_query($conn, $sql_theater);

                    if (mysqli_num_rows($result_t) > 0) {
                        while ($item_t = $result_t->fetch_assoc()) {
                            $theater = $item_t['theater'];

                            echo '<div class="mx-auto text-gray-700 mb-0.5 h-30">
                                <div class="flex p-3">
                                    <span class="text-2xl leading-4 font-medium text-black-500">Theater ' . $theater . '</span>
                                </div>';

                            $sql_dub = "SELECT distinct dub FROM showtime WHERE movie_id = '$movie_id' and show_date = '$date1' and theater = '$theater' order by show_time asc";

                            $result_d = mysqli_query($conn, $sql_dub);

                            while ($item_d = $result_d->fetch_assoc()) {
                                $dub = $item_d['dub'];

                                echo '<div class="flex">
                                    <div class="ml-3 my-5 p-1 flex space-y-1 border-r-2 pr-3 ">
                                        <div>
                                            <svg viewBox="0 0 405.88 359.77" class="w-[18px] h-[18px] pt-2">
                                                <path d="M226.08,359.77a11.5,11.5,0,0,1-6.9-2.3L112.91,277.7C107.14,274,93,264.48,93,248.58V111.87c0-14.3,10.53-23.39,19.81-29.72L219.17,2.3a11.5,11.5,0,0,1,6.9-2.3,26.53,26.53,0,0,1,26.5,26.5V333.27A26.53,26.53,0,0,1,226.08,359.77ZM228.55,24L126.4,100.7,126,101c-6.7,4.55-10,8.11-10,10.85V248.58c0,1.39,1.27,4.53,9.76,10,0.22,0.14.44,0.29,0.65,0.45l102.15,76.67a3.49,3.49,0,0,0,1-2.48V26.5A3.49,3.49,0,0,0,228.55,24Z" class="cls-1"></path>
                                                <path d="M104.5,261.94h-78C11.89,261.94,0,251.41,0,238.47V121.3c0-12.94,11.89-23.47,26.5-23.47h78a11.5,11.5,0,0,1,11.5,11.5V250.44A11.5,11.5,0,0,1,104.5,261.94ZM23,237.9a5.59,5.59,0,0,0,3.5,1H93V120.82H26.5a5.59,5.59,0,0,0-3.5,1v116Z" class="cls-1"></path>
                                                <path d="M323.7,313.84a11.5,11.5,0,0,1-6-21.3,136.47,136.47,0,0,0,5-229.53A11.5,11.5,0,1,1,335.6,43.94a159.44,159.44,0,0,1-5.9,268.2A11.45,11.45,0,0,1,323.7,313.84Z" class="cls-1"></path>
                                                <path d="M289.25,269.35a11.5,11.5,0,0,1-5.35-21.69,80.75,80.75,0,0,0,7.68-138.47,11.5,11.5,0,1,1,12.88-19.06A103.75,103.75,0,0,1,294.58,268,11.45,11.45,0,0,1,289.25,269.35Z" class=""></path>
                                            </svg>
                                        </div>
                                        <div class="pl-2">' . $dub . '</div>
                                    </div>';

                                $sql_time = "SELECT show_id, show_time FROM showtime WHERE movie_id = '$movie_id' and show_date = '$date1' and theater = '$theater' and dub = '$dub' order by show_time asc";

                                $result_st = mysqli_query($conn, $sql_time);

                                while ($item_st = $result_st->fetch_assoc()) {

                                    echo '<div class="ml-3 my-5 p-1 ">
                                        <a href="seat.php"><button type="submit" data-show_id="' . $item_st['show_id'] . '" date class="text-white bg-gradient-to-r from-sky-500 to-indigo-500 hover:from-sky-600 hover:to-indigo-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800
                                        font-medium rounded-lg text-md px-5 py-2.5 text-center mr-2 mb-2 show-button">' . $item_st['show_time'] . '</button></a>
                                    </div>';
                                }

                                echo '</div>';
                            }

                            echo '</div>';
                        }
                    } else {
                        echo '<p class="text-gray-500 dark:text-gray-400 text-sm">ไม่มีรอบฉายในวันที่เลือก</p>';
                    }
                    ?>

                </div>

                <!-- Day 3 -->
                <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800 hidden" id="day2" role="tabpanel" aria-labelledby="day2-tab">

                    <?php
                    $sql_theater = "SELECT distinct theater FROM showtime WHERE movie_id = '$movie_id' and show_date = '$date2' order by theater asc";

                    $result_t = mysqli_query($conn, $sql_theater);

                    if (mysqli_num_rows($result_t) > 0) {
                        while ($item_t = $result_t->fetch_assoc()) {
                            $theater = $item_t['theater'];

                            echo '<div class="mx-auto text-gray-700 mb-0.5 h-30">
                                <div class="flex p-3">
                                    <span class="text-2xl leading-4 font-medium text-black-500">Theater ' . $theater . '</span>
                                </div>';

                            $sql_dub = "SELECT distinct dub FROM showtime WHERE movie_id = '$movie_id' and show_date = '$date2' and theater = '$theater' order by show_time asc";

                            $result_d = mysqli_query($conn, $sql_dub);

                            while ($item_d = $result_d->fetch_assoc()) {
                                $dub = $item_d['dub'];

                                echo '<div class="flex">
                                    <div class="ml-3 my-5 p-1 flex space-y-1 border-r-2 pr-3 ">
                                        <div>
                                            <svg viewBox="0 0 405.88 359.77" class="w-[18px] h-[18px] pt-2">
                                                <path d="M226.08,359.77a11.5,11.5,0,0,1-6.9-2.3L112.91,277.7C107.14,274,93,264.48,93,248.58V111.87c0-14.3,10.53-23.39,19.81-29.72L219.17,2.3a11.5,11.5,0,0,1,6.9-2.3,26.53,26.53,0,0,1,26.5,26.5V333.27A26.53,26.53,0,0,1,226.08,359.77ZM228.55,24L126.4,100.7,126,101c-6.7,4.55-10,8.11-10,10.85V248.58c0,1.39,1.27,4.53,9.76,10,0.22,0.14.44,0.29,0.65,0.45l102.15,76.67a3.49,3.49,0,0,0,1-2.48V26.5A3.49,3.49,0,0,0,228.55,24Z" class="cls-1"></path>
                                                <path d="M104.5,261.94h-78C11.89,261.94,0,251.41,0,238.47V121.3c0-12.94,11.89-23.47,26.5-23.47h78a11.5,11.5,0,0,1,11.5,11.5V250.44A11.5,11.5,0,0,1,104.5,261.94ZM23,237.9a5.59,5.59,0,0,0,3.5,1H93V120.82H26.5a5.59,5.59,0,0,0-3.5,1v116Z" class="cls-1"></path>
                                                <path d="M323.7,313.84a11.5,11.5,0,0,1-6-21.3,136.47,136.47,0,0,0,5-229.53A11.5,11.5,0,1,1,335.6,43.94a159.44,159.44,0,0,1-5.9,268.2A11.45,11.45,0,0,1,323.7,313.84Z" class="cls-1"></path>
                                                <path d="M289.25,269.35a11.5,11.5,0,0,1-5.35-21.69,80.75,80.75,0,0,0,7.68-138.47,11.5,11.5,0,1,1,12.88-19.06A103.75,103.75,0,0,1,294.58,268,11.45,11.45,0,0,1,289.25,269.35Z" class=""></path>
                                            </svg>
                                        </div>
                                        <div class="pl-2">' . $dub . '</div>
                                    </div>';

                                $sql_time = "SELECT show_id, show_time FROM showtime WHERE movie_id = '$movie_id' and show_date = '$date2' and theater = '$theater' and dub = '$dub' order by show_time asc";

                                $result_st = mysqli_query($conn, $sql_time);

                                while ($item_st = $result_st->fetch_assoc()) {

                                    echo '<div class="ml-3 my-5 p-1 ">
                                        <a href="seat.php"><button type="submit" data-show_id="' . $item_st['show_id'] . '" date class="text-white bg-gradient-to-r from-sky-500 to-indigo-500 hover:from-sky-600 hover:to-indigo-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800
                                        font-medium rounded-lg text-md px-5 py-2.5 text-center mr-2 mb-2 show-button">' . $item_st['show_time'] . '</button></a>
                                    </div>';
                                }

                                echo '</div>';
                            }

                            echo '</div>';
                        }
                    } else {
                        echo '<p class="text-gray-500 dark:text-gray-400 text-sm">ไม่มีรอบฉายในวันที่เลือก</p>';
                    }
                    ?>

                </div>

                <!-- Day 4 -->
                <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800 hidden" id="day3" role="tabpanel" aria-labelledby="day3-tab">

                    <?php
                    $sql_theater = "SELECT distinct theater FROM showtime WHERE movie_id = '$movie_id' and show_date = '$date3' order by theater asc";

                    $result_t = mysqli_query($conn, $sql_theater);

                    if (mysqli_num_rows($result_t) > 0) {
                        while ($item_t = $result_t->fetch_assoc()) {
                            $theater = $item_t['theater'];

                            echo '<div class="mx-auto text-gray-700 mb-0.5 h-30">
                                <div class="flex p-3">
                                    <span class="text-2xl leading-4 font-medium text-black-500">Theater ' . $theater . '</span>
                                </div>';

                            $sql_dub = "SELECT distinct dub FROM showtime WHERE movie_id = '$movie_id' and show_date = '$date3' and theater = '$theater' order by show_time asc";

                            $result_d = mysqli_query($conn, $sql_dub);

                            while ($item_d = $result_d->fetch_assoc()) {
                                $dub = $item_d['dub'];

                                echo '<div class="flex">
                                    <div class="ml-3 my-5 p-1 flex space-y-1 border-r-2 pr-3 ">
                                        <div>
                                            <svg viewBox="0 0 405.88 359.77" class="w-[18px] h-[18px] pt-2">
                                                <path d="M226.08,359.77a11.5,11.5,0,0,1-6.9-2.3L112.91,277.7C107.14,274,93,264.48,93,248.58V111.87c0-14.3,10.53-23.39,19.81-29.72L219.17,2.3a11.5,11.5,0,0,1,6.9-2.3,26.53,26.53,0,0,1,26.5,26.5V333.27A26.53,26.53,0,0,1,226.08,359.77ZM228.55,24L126.4,100.7,126,101c-6.7,4.55-10,8.11-10,10.85V248.58c0,1.39,1.27,4.53,9.76,10,0.22,0.14.44,0.29,0.65,0.45l102.15,76.67a3.49,3.49,0,0,0,1-2.48V26.5A3.49,3.49,0,0,0,228.55,24Z" class="cls-1"></path>
                                                <path d="M104.5,261.94h-78C11.89,261.94,0,251.41,0,238.47V121.3c0-12.94,11.89-23.47,26.5-23.47h78a11.5,11.5,0,0,1,11.5,11.5V250.44A11.5,11.5,0,0,1,104.5,261.94ZM23,237.9a5.59,5.59,0,0,0,3.5,1H93V120.82H26.5a5.59,5.59,0,0,0-3.5,1v116Z" class="cls-1"></path>
                                                <path d="M323.7,313.84a11.5,11.5,0,0,1-6-21.3,136.47,136.47,0,0,0,5-229.53A11.5,11.5,0,1,1,335.6,43.94a159.44,159.44,0,0,1-5.9,268.2A11.45,11.45,0,0,1,323.7,313.84Z" class="cls-1"></path>
                                                <path d="M289.25,269.35a11.5,11.5,0,0,1-5.35-21.69,80.75,80.75,0,0,0,7.68-138.47,11.5,11.5,0,1,1,12.88-19.06A103.75,103.75,0,0,1,294.58,268,11.45,11.45,0,0,1,289.25,269.35Z" class=""></path>
                                            </svg>
                                        </div>
                                        <div class="pl-2">' . $dub . '</div>
                                    </div>';

                                $sql_time = "SELECT show_id, show_time FROM showtime WHERE movie_id = '$movie_id' and show_date = '$date3' and theater = '$theater' and dub = '$dub' order by show_time asc";

                                $result_st = mysqli_query($conn, $sql_time);

                                while ($item_st = $result_st->fetch_assoc()) {

                                    echo '<div class="ml-3 my-5 p-1 ">
                                        <a href="seat.php"><button type="submit" data-show_id="' . $item_st['show_id'] . '" date class="text-white bg-gradient-to-r from-sky-500 to-indigo-500 hover:from-sky-600 hover:to-indigo-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800
                                        font-medium rounded-lg text-md px-5 py-2.5 text-center mr-2 mb-2 show-button">' . $item_st['show_time'] . '</button></a>
                                    </div>';
                                }

                                echo '</div>';
                            }

                            echo '</div>';
                        }
                    } else {
                        echo '<p class="text-gray-500 dark:text-gray-400 text-sm">ไม่มีรอบฉายในวันที่เลือก</p>';
                    }
                    ?>

                </div>

                <!-- Day 5 -->
                <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800 hidden" id="day4" role="tabpanel" aria-labelledby="day4-tab">

                    <?php
                    $sql_theater = "SELECT distinct theater FROM showtime WHERE movie_id = '$movie_id' and show_date = '$date4' order by theater asc";

                    $result_t = mysqli_query($conn, $sql_theater);

                    if (mysqli_num_rows($result_t) > 0) {
                        while ($item_t = $result_t->fetch_assoc()) {
                            $theater = $item_t['theater'];

                            echo '<div class="mx-auto text-gray-700 mb-0.5 h-30">
                                <div class="flex p-3">
                                    <span class="text-2xl leading-4 font-medium text-black-500">Theater ' . $theater . '</span>
                                </div>';

                            $sql_dub = "SELECT distinct dub FROM showtime WHERE movie_id = '$movie_id' and show_date = '$date4' and theater = '$theater' order by show_time asc";

                            $result_d = mysqli_query($conn, $sql_dub);

                            while ($item_d = $result_d->fetch_assoc()) {
                                $dub = $item_d['dub'];

                                echo '<div class="flex">
                                    <div class="ml-3 my-5 p-1 flex space-y-1 border-r-2 pr-3">
                                        <div>
                                            <svg viewBox="0 0 405.88 359.77" class="w-[18px] h-[18px] pt-2">
                                                <path d="M226.08,359.77a11.5,11.5,0,0,1-6.9-2.3L112.91,277.7C107.14,274,93,264.48,93,248.58V111.87c0-14.3,10.53-23.39,19.81-29.72L219.17,2.3a11.5,11.5,0,0,1,6.9-2.3,26.53,26.53,0,0,1,26.5,26.5V333.27A26.53,26.53,0,0,1,226.08,359.77ZM228.55,24L126.4,100.7,126,101c-6.7,4.55-10,8.11-10,10.85V248.58c0,1.39,1.27,4.53,9.76,10,0.22,0.14.44,0.29,0.65,0.45l102.15,76.67a3.49,3.49,0,0,0,1-2.48V26.5A3.49,3.49,0,0,0,228.55,24Z" class="cls-1"></path>
                                                <path d="M104.5,261.94h-78C11.89,261.94,0,251.41,0,238.47V121.3c0-12.94,11.89-23.47,26.5-23.47h78a11.5,11.5,0,0,1,11.5,11.5V250.44A11.5,11.5,0,0,1,104.5,261.94ZM23,237.9a5.59,5.59,0,0,0,3.5,1H93V120.82H26.5a5.59,5.59,0,0,0-3.5,1v116Z" class="cls-1"></path>
                                                <path d="M323.7,313.84a11.5,11.5,0,0,1-6-21.3,136.47,136.47,0,0,0,5-229.53A11.5,11.5,0,1,1,335.6,43.94a159.44,159.44,0,0,1-5.9,268.2A11.45,11.45,0,0,1,323.7,313.84Z" class="cls-1"></path>
                                                <path d="M289.25,269.35a11.5,11.5,0,0,1-5.35-21.69,80.75,80.75,0,0,0,7.68-138.47,11.5,11.5,0,1,1,12.88-19.06A103.75,103.75,0,0,1,294.58,268,11.45,11.45,0,0,1,289.25,269.35Z" class=""></path>
                                            </svg>
                                        </div>
                                        <div class="pl-2">' . $dub . '</div>
                                    </div>';

                                $sql_time = "SELECT show_id, show_time FROM showtime WHERE movie_id = '$movie_id' and show_date = '$date4' and theater = '$theater' and dub = '$dub' order by show_time asc";

                                $result_st = mysqli_query($conn, $sql_time);

                                while ($item_st = $result_st->fetch_assoc()) {

                                    echo '<div class="ml-3 my-5 p-1 ">
                                        <a href="seat.php"><button type="submit" data-show_id="' . $item_st['show_id'] . '" date class="text-white bg-gradient-to-r from-sky-500 to-indigo-500 hover:from-sky-600 hover:to-indigo-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800
                                        font-medium rounded-lg text-md px-5 py-2.5 text-center mr-2 mb-2 show-button">' . $item_st['show_time'] . '</button></a>
                                    </div>';
                                }

                                echo '</div>';
                            }

                            echo '</div>';
                        }
                    } else {
                        echo '<p class="text-gray-500 dark:text-gray-400 text-sm">ไม่มีรอบฉายในวันที่เลือก</p>';
                    }
                    ?>

                </div>

            </div>

        </div>
    </section>

    <?php
    mysqli_close($conn);
    ?>

    <?php include 'header/footer.php'; ?>

    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>

    <script>
        var buttons = document.querySelectorAll(".show-button");

        buttons.forEach(function(button) {
            button.addEventListener("click", function() {
                var show_id = this.getAttribute("data-show_id");

                fetch(`session.php?show_id=${show_id}`)
            });
        });
    </script>

</body>

</html>