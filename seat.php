<?php include 'header/front.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="image/icon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เลือกที่นั่งชมภาพยนตร์</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="css/seat.css">
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
    if ($_SESSION['show_id'] != '') {
        $show_id = $_SESSION['show_id'];
    } else {
        header('Location: showtime.php');
    }

    $_SESSION['seat_id'] = [];
    $_SESSION['total_price'] = '';

    $mysqli = require __DIR__ . "/database.php";

    $sql_select = "SELECT name, poster, show_date, show_time, theater FROM movie JOIN showtime USING (movie_id) WHERE show_id = '$show_id'";

    $result = mysqli_query($conn, $sql_select);

    $item = $result->fetch_assoc();
    ?>

    <!--stepper-->
    <div class="">
        <div>
            <ol class="grid grid-cols-1 divide-x divide-gray-100 overflow-hidden  border border-gray-100 text-sm text-gray-500 sm:grid-cols-4 bg-[#f9f9f9]">
                <a href="showtime.php">
                    <li class="flex items-center justify-center gap-2 p-4 bg-gradient-to-r from-cyan-500 to-sky-500 hover:from-cyan-500 hover:to-indigo-600">
                        <svg class="h-7 w-7 shrink-0 text-[#eee]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                        </svg>

                        <p class="leading-none text-[#eee]">
                            <strong class="block font-medium"> เลือกรอบฉาย </strong>
                            <small class="mt-1"></small>
                        </p>
                    </li>
                </a>

                <li class="relative flex items-center justify-center gap-2 bg-[#2851a5] p-4 bg-gradient-to-r from-sky-500 to-indigo-500">

                    <svg class="h-7 w-7 shrink-0 text-[#eee]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>

                    <p class="leading-none text-[#eee]">
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

    <div class="grid grid-cols-4 place-items-center mx-auto w-full bg-[#eee] pb-32 pt-8">
        <div class="w-[70%] max-w-[900px] col-span-3 select-l">

            <section>
                <div class="flex items-center mt-3 justify-around py-16">
                    <div class="border place-item-center border-2 border rounded border-gray-500 border p-4">
                        <div class="text-center">
                            <div class="div font-bold">
                                โรงภาพยนตร์ที่ <?= $item['theater'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col justify-content-center">
                        <div class="seat normal disabled mx-3"></div>
                        <div class="type-text ">
                            Normal
                        </div>
                        <div class="type-price">
                            220 บาท
                        </div>
                    </div>
                    <div class="flex flex-col justify-content-center">
                        <div class="seat premium disabled mx-4"></div>
                        <div class="type-text">
                            Premium
                        </div>
                        <div class="type-price">
                            240 บาท
                        </div>
                    </div>
                </div>
            </section>

            <div class="seats">
                <div class="flex flex-col gap-y-8">
                    <div class="flex flex-col items-center gap-y-10">
                        <img class="drop-shadow-xl" src="image/screen.svg" alt="">
                        <div class="font-semibold text-lg text-center jo">จอภาพ</div>
                    </div>
                    <div class="grid grid-cols-12 place-items-center gap-x-2 gap-y-3 mt-20">
                        <!-- E -->
                        <div class="row-id text-lg">
                            E
                        </div>
                        <div>
                            <button class="seat normal" seat_id="E1" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="E2" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="E3" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="E4" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="E5" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="E6" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="E7" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="E8" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="E9" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="E10" seat_price="220"></button>
                        </div>
                        <div class="row-id text-lg">
                            E
                        </div>
                        <!-- D -->
                        <div class="row-id text-lg">
                            D
                        </div>
                        <div>
                            <button class="seat normal" seat_id="D1" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="D2" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="D3" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="D4" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="D5" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="D6" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="D7" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="D8" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="D9" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="D10" seat_price="220"></button>
                        </div>
                        <div class="row-id text-lg">
                            D
                        </div>
                        <!-- C -->
                        <div class="row-id text-lg">
                            C
                        </div>
                        <div>
                            <button class="seat normal" seat_id="C1" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="C2" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="C3" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="C4" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="C5" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="C6" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="C7" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="C8" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="C9" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="C10" seat_price="220"></button>
                        </div>
                        <div class="row-id text-lg">
                            C
                        </div>
                        <!-- D -->
                        <div class="row-id text-lg">
                            B
                        </div>
                        <div>
                            <button class="seat normal" seat_id="B1" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="B2" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="B3" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="B4" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="B5" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="B6" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="B7" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="B8" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="B9" seat_price="220"></button>
                        </div>
                        <div>
                            <button class="seat normal" seat_id="B10" seat_price="220"></button>
                        </div>
                        <div class="row-id text-lg">
                            B
                        </div>
                        <!-- E -->
                        <div class="row-id text-lg">
                            A
                        </div>
                        <div>
                            <button class="seat premium" seat_id="A1" seat_price="240"></button>
                        </div>
                        <div>
                            <button class="seat premium" seat_id="A2" seat_price="240"></button>
                        </div>
                        <div>
                            <button class="seat premium" seat_ids="A3" seat_price="240"></button>
                        </div>
                        <div>
                            <button class="seat premium" seat_id="A4" seat_price="240"></button>
                        </div>
                        <div>
                            <button class="seat premium" seat_id="A5" seat_price="240"></button>
                        </div>
                        <div>
                            <button class="seat premium" seat_id="A6" seat_price="240"></button>
                        </div>
                        <div>
                            <button class="seat premium" seat_id="A7" seat_price="240"></button>
                        </div>
                        <div>
                            <button class="seat premium" seat_id="A8" seat_price="240"></button>
                        </div>
                        <div>
                            <button class="seat premium" seat_id="A9" seat_price="240"></button>
                        </div>
                        <div>
                            <button class="seat premium" seat_id="A10" seat_price="240"></button>
                        </div>
                        <div class="row-id text-lg">
                            A
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="block rounded-lg bg-neutral-200 shadow-xl dark:bg-neutral-800 text-center max-w-[260px] mt-2">
                <!-- Card image -->
                <a href="">
                    <img class="rounded-t-lg" src="<?= $item['poster'] ?>" alt="" />
                </a>

                <!-- Card body -->
                <div class="p-6">

                    <!-- Title -->
                    <h5 class="mb-2 text-2xl font-bold tracking-wide text-neutral-800 dark:text-neutral-50 text-[#fff]">
                        <?= $item['name'] ?>
                    </h5>

                    <!-- Text -->
                    <p class="mb-2 text-base text-neutral-800 dark:text-neutral-300 font-bold">
                        วันที่ฉาย : <?= $item['show_date'] ?>
                    </p>
                    <p class="mb-2 text-base text-neutral-800 dark:text-neutral-300 font-bold">
                        รอบฉาย : <?= $item['show_time'] ?>
                    </p>

                    <p class="mb-2 text-base text-neutral-800 dark:text-neutral-300 font-bold">
                        โรงภาพยนตร์ที่ <?= $item['theater'] ?>
                    </p>

                    <div id="payment_div">
                        <div class="border place-item-center border-2 border-neutral-500 p-4">
                            <div class="text-center text-md text-neutral-800">
                                <div class="div">
                                    <p>Selected Seat ID: </p>
                                    <span class="font-bold" id="seat" name="seat"></span><br>
                                    <p>Total Price: <span class="font-bold" id="price" name="price">0</span> Baht</p>
                                </div>
                                <div class="div">
                                </div>
                            </div>
                        </div>

                        <?php
                        if ($_SESSION['user_type'] == 'emp_front') {
                            echo '<a href="payment_complete.php">
                                    <button id="payment_button" class="mt-3 inline-block rounded px-6 pb-2 pt-2.5 text-lg font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150
                                        ease-in-out hover:shadow-[0_4px_9px_-4px_#3b71ca] focus:bg-blue-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] 
                                        focus:outline-none focus:ring-0 active:bg-blue-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] 
                                        dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] 
                                        dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] bg-gradient-to-r from-sky-300 to-indigo-300 hover:from-sky-300 hover:to-indigo-300" disabled>Payment Success</button>
                                </a>';
                        } else {
                            echo '<a href="payment.php">
                                    <button id="payment_button" class="mt-3 inline-block rounded px-6 pb-2 pt-2.5 text-lg font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150
                                        ease-in-out hover:shadow-[0_4px_9px_-4px_#3b71ca] focus:bg-blue-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] 
                                        focus:outline-none focus:ring-0 active:bg-blue-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] 
                                        dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] 
                                        dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] bg-gradient-to-r from-sky-300 to-indigo-300 hover:from-sky-300 hover:to-indigo-300" disabled>Buy Ticket</button>
                                </a>';
                        }
                        ?>

                        
                    </div>

                </div>

            </div>
        </div>
    </div>

    <?php
    mysqli_close($conn);
    ?>

    <?php include 'header/footer.php'; ?>

    <script src="js/seat.js"></script>
</body>

</html>