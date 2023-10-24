<?php include 'header/front.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="image/icon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ชำระเงิน</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mali&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Mali', cursive;
        }

        .rw {
            display: flex;
        }

        .cl {
            width: 50%;
        }

        .right {
            margin-top: 2%;
        }

        .left {
            margin-left: 2%;
        }
    </style>
</head>

<body class="bg-[#eee]">

    <?php include 'header/header.php'; ?>

    <?php
    if ($_SESSION['total_price'] == '') {
        header('Location: seat.php');
    }
    ?>

    <!--stepper-->
    <div>
        <ol
            class="grid grid-cols-1 divide-x divide-gray-100 overflow-hidden  border border-gray-100 text-sm text-gray-500 sm:grid-cols-4 bg-[#f9f9f9]">
            <a href="showtime.php">
                <li
                    class="flex items-center  justify-center gap-2 p-4 bg-gradient-to-r from-cyan-500 to-sky-500 hover:from-cyan-500 hover:to-indigo-600">
                    <svg class="h-7 w-7 shrink-0 text-[#eee]" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                    </svg>

                    <p class="leading-none ">
                        <strong class="block font-medium text-[#eee]"> เลือกรอบฉาย </strong>
                        <small class="mt-1"></small>
                    </p>
                </li>
            </a>

            <a href="seat.php">
                <li
                    class="relative flex items-center justify-center gap-2 p-4 bg-gradient-to-r from-sky-500 to-blue-500 hover:from-cyan-500 hover:to-indigo-600">

                    <svg class="h-7 w-7 shrink-0 text-[#eee]" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>

                    <p class="leading-none">
                        <strong class="block font-medium text-[#eee]"> เลือกที่นั่ง </strong>
                    </p>
                </li>
            </a>

            <li
                class="flex items-center justify-center gap-2 p-4 bg-[#2851a5] bg-gradient-to-r from-blue-500 to-indigo-500">
                <svg class="h-7 w-7 shrink-0 text-[#eee]" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                </svg>

                <p class="leading-none">
                    <strong class="block font-medium text-[#eee]"> ชำระเงิน </strong>
                </p>
            </li>

            <li class="flex items-center justify-center gap-2 p-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 shrink-0 text-gray-500" fill="#6b7280"
                    stroke="currentColor" stroke-width="2"
                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z" />
                </svg>

                <p class="leading-none">
                    <strong class="block font-medium"> เสร็จสิ้น </strong>
                </p>
            </li>
        </ol>
    </div>

    <?php
    $movie = $_SESSION['movie'];
    $show_id = $_SESSION['show_id'];

    $mysqli = require __DIR__ . "/database.php";

    $sql_select = "SELECT poster, show_date, show_time FROM showtime JOIN movie USING (movie_id) WHERE show_id = '$show_id'";

    $result = mysqli_query($conn, $sql_select);

    $item = $result->fetch_assoc();
    ?>
    <!-- hero -->
    <div class="rw">
        <div class="cl">
            <section class="text-white body-font overflow-hidden">
                <div class="container grid px-10 py-10 mx-auto justify-items-center">
                    <div class="w-full lg:w-/12 sm:w-/6 md:/12 mx-auto flex flex-wrap items-center ">
                        <img alt="" class="lg:w-[50%] lg:h-[]  rounded" src="<?= $item['poster'] ?>">
                        <div class="lg:w-6/12 md:w-6/12 pl-4 lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                            <h1 class="text-[#13015C] text-4xl title-font font-medium mb-4"><strong>
                                    <?= $_SESSION['movie'] ?>
                                </strong></h1>
                            <h4 class="text-black text-xl font-medium mb-2">วันที่: <strong>
                                    <?= $item['show_date'] ?>
                                </strong></h4>
                            <h4 class="text-black text-xl font-medium mb-2">เวลา: <strong>
                                    <?= $item['show_time'] ?>
                                </strong></h4>
                            <h4 class="text-black text-xl font-medium mb-2">ที่นั่ง: <strong>
                                    <?php
                                    foreach ($_SESSION['seat_id'] as $seat_id) {
                                        echo $seat_id . ' ';
                                    }
                                    ?>
                                </strong>
                            </h4>
                            <h4 class="text-black text-xl font-medium mb-2">ราคารวม: <strong>
                                    <?= $_SESSION['total_price'] ?>
                                </strong> บาท</h4>
                            <div class="flex mb-2">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!--จ่ายเงิน-->
        <div class="cl">
            <div class="w-full max-w-lg mx-auto p-8 right">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="w-full pt-1 pb-5">
                        <div
                            class="bg-[#497DFE] text-white overflow-hidden rounded-full w-20 h-20 -mt-16 mx-auto shadow-lg flex justify-center items-center">
                            <i class="fa-regular fa-credit-card"></i>
                        </div>
                    </div>
                    <h2 class="text-lg font-medium mb-6">ชำระเงินด้วยบัตรเครดิต</h2>
                    <form action="payment_complete.php" method="post" id="form">
                        <div class="grid grid-cols-5 gap-6">
                            <div class="col-span-5 sm:col-span-5">
                                <label for="card-number" class="block text-sm font-medium text-gray-700 mb-2">Card
                                    Number</label>
                                <input type="text" name="card-number" id="card-number" placeholder="1234 5678 1234 5678"
                                    class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500"
                                    required maxlength="19">
                                <p id="card_p" class="text-red-500 text-xs"></p>
                            </div>
                            <div class="col-span-5 sm:col-span-5">
                                <label for="card-holder" class="block text-sm font-medium text-gray-700 mb-2">Card
                                    Holder</label>
                                <input type="text" name="card-holder" id="card-holder" placeholder="Full Name"
                                    class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500"
                                    required>
                                <p id="hold_p" class="text-red-500 text-xs"></p>
                            </div>
                            <div class="col-span-3 sm:col-span-3">
                                <label for="expiration-date"
                                    class="block text-sm font-medium text-gray-700 mb-2">Expiration Date</label>
                                <input type="text" name="expiration-date" id="expiration-date" placeholder="MM / YY"
                                    class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500"
                                    required maxlength="7">
                                <p id="exp_p" class="text-red-500 text-xs"></p>
                            </div>
                            <div class="col-span-2 sm:col-span-2 mb-12">
                                <label for="cvv" class="block text-sm font-medium text-gray-700 mb-2">CVV</label>
                                <input type="text" name="cvv" id="cvv" placeholder="123"
                                    class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500"
                                    required maxlength="3">
                                <p id="cvv_p" class="text-red-500 text-xs"></p>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <button
                                class="block w-full max-w-xs mx-auto bg-gradient-to-r from-sky-500 to-indigo-500 hover:from-sky-600 hover:to-indigo-600 focus:bg-indigo-600 text-white rounded-lg px-3 py-3 mt-3 font-semibold"
                                id="submit"><i class="fa-solid fa-cart-shopping" style="color: #ededed;"></i>
                                ชำระเงิน</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->
    <?php
    mysqli_close($conn);
    ?>

    <?php include 'header/footer.php'; ?>

</body>
<script src="js/payment.js"></script>

</html>