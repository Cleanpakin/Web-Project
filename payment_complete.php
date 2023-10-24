<?php include 'header/front.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="image/icon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ชำระเงินสำเร็จ</title>
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
    </style>
</head>

<body class="bg-[#eee]">

    <?php include 'header/header.php'; ?>

    <?php
    if ((($_SESSION['user_type'] == 'customer' && isset($_POST['card-number'])) || ($_SESSION['user_type'] == 'emp_front')) && $_SESSION['seat_id'] != []) {
        $mysqli = require __DIR__ . "/database.php";

        $show_id = $_SESSION['show_id'];
        $user_id = $_SESSION['user_id'];

        foreach ($_SESSION['seat_id'] as $seat_id) {
            $sql_insert = "INSERT INTO ticket(show_id, seat_id, user_id) VALUES ('$show_id', '$seat_id', '$user_id')";

            $result = mysqli_query($conn, $sql_insert);

            $sql_update = "UPDATE seat SET status = 'occupied' WHERE show_id = '$show_id' and seat_id = '$seat_id'";

            $result = mysqli_query($conn, $sql_update);
        } 
        
        $_SESSION['seat_id'] = [];
    } else {
        header('Location: index.php');
    }
    ?>

    <!--stepper-->
    <div class="">
        <div>
            <ol class="grid grid-cols-1 divide-x divide-gray-100 overflow-hidden  border border-gray-100 text-sm text-gray-500 sm:grid-cols-4 bg-[#f9f9f9]">
                <li class="flex items-center  justify-center gap-2 p-4 bg-gradient-to-r from-cyan-500 to-sky-500">
                    <svg class="h-7 w-7 shrink-0 text-[#eee]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                    </svg>

                    <p class="leading-none">
                        <strong class="block font-medium text-[#eee]"> เลือกรอบฉาย </strong>
                        <small class="mt-1"></small>
                    </p>
                </li>

                <li class="relative flex items-center justify-center gap-2 p-4 bg-gradient-to-r from-sky-500 to-blue-500">
                    <svg class="h-7 w-7 shrink-0 text-[#eee]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>

                    <p class="leading-none">
                        <strong class="block font-medium text-[#eee]"> เลือกที่นั่ง </strong>
                    </p>
                </li>

                <li class="flex items-center justify-center gap-2 p-4 bg-gradient-to-r from-blue-500 to-indigo-500">
                    <svg class="h-7 w-7 shrink-0 text-[#eee]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>

                    <p class="leading-none">
                        <strong class="block font-medium text-[#eee]"> ชำระเงิน </strong>
                    </p>
                </li>

                <li class="flex items-center justify-center gap-2 p-4 bg-gradient-to-r from-indigo-500 to-violet-500">
                    <svg class="h-7 w-7 shrink-0 text-[#eee]" xmlns="http://www.w3.org/2000/svg" fill="#eee" stroke="currentColor" stroke-width="2" viewBox="0 0 512 512">
                        <path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z" />
                    </svg>

                    <p class="leading-none text-[#eee]">
                        <strong class="block font-medium"> เสร็จสิ้น </strong>
                    </p>
                </li>
            </ol>
        </div>
    </div>
    <!-- hero -->
    <div class="w-screen">
        <div class="bg-white p-6  md:mx-auto">
            <svg viewBox="0 0 24 24" class="text-green-600 w-16 h-16 mx-auto my-4">
                <path fill="currentColor" d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                </path>
            </svg>
            <div class="text-center">
                <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">ชำระเงินสำเร็จ!</h3>
                <p class="text-gray-900 my-2">ขอบคุณที่เลือกใช้โรงภาพยนตร์ CINENIC</p>
                <p> ขอให้สนุกกับการชมภาพยนตร์ </p>
                <p class="my-4">QR Code สำหรับพิมพ์ที่นั่งชมภาพยนตร์</p>
                <div class="container mx-auto flex px-5  items-center justify-center flex-col">
                <img class="lg:w-[25em] mt-5 md:w-3/6 w-5/6 mb-3 object-cover object-center rounded-lg" alt="hero" src="image/movie_success.jpg" style="margin-top:10">
                </div>
                <div class="py-4 text-center">
                    <a href="index.php" class="px-12 rounded-lg bg-gradient-to-r from-sky-500 to-indigo-500 hover:from-sky-600 hover:to-indigo-600 text-white font-semibold py-3">
                        กลับหน้าแรก
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php
    mysqli_close($conn);
    ?>

    <?php include 'header/footer.php'; ?>

</body>