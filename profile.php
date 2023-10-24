<?php include 'header/front.php'; ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="image/icon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติการจอง</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mali&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Mali', cursive;
        }

        .bg-orangee {
            background-color: #FF9900;
        }

        .bg-cream {
            background-color: #eee;
        }

        .bg-blackk {
            background-color: #0C111B;
        }
    </style>
</head>

<body class="bg-[#eee]">

    <?php include 'header/header.php'; ?>

    <?php
    $user_id = $_SESSION['user_id'];

    $mysqli = require __DIR__ . "/database.php";

    $sql_select = "SELECT email, f_name, l_name FROM user WHERE user_id = '$user_id'";

    $result_select = $conn->query($sql_select);

    $item_select = $result_select->fetch_assoc();
    ?>

    <!-- Show reserve -->
    <!-- สีbgที่เป็นสีน้ำเงิน -->
    <div class="bg-[#172554] py-8 min-h-screen">
        <div class="max-w-screen-xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <section class="text-gray-600 body-font relative ">
                <div class="container px-12 py-24 mx-auto ">
                    <div class="flex flex-col text-center w-full mb-12">
                        <i class="fa-solid fa-user text-3xl text-blue-500"></i>
                        <h1 class="sm:text-3xl text-3xl font-medium font-bold title-font mb-4 text-gray-900" style="margin-top: 16px;"><strong><?= $_SESSION['user_type'] == 'emp_front' ? 'ประวัติการขาย' : 'ประวัติการจอง' ?></strong>
                        </h1>
                    </div>
                    <!-- Email -->
                    <div class="flex flex-col items-center">
                        <label for="email" class="leading-7 text-xl text-gray-600 font-bold" style="margin-right: 300px;"><i class="fa-regular fa-envelope" style="margin-right: 12px;"></i>อีเมล</label>

                        <div class="relative w-64 md:w-96 rounded-lg text-lg  py-2 px-3 leading-8 shadow-lg text-sky-950 bg-[#93c5fd] font-bold">
                            <?= $item_select['email'] ?>
                        </div>
                    </div>
                    <!-- First Name -->
                    <div class="flex flex-col items-center mt-8">
                        <label for="fname" class="leading-7 text-xl text-gray-600 font-bold" style="margin-right: 350px;">ชื่อ</label>
                        <div class="relative w-64 md:w-96 rounded-lg text-lg  py-2 px-3 leading-8 shadow-lg text-sky-950 bg-[#93c5fd] font-bold">
                            <?= $item_select['f_name'] ?>
                        </div>
                    </div>
                    <!-- Last Name -->
                    <div class="flex flex-col items-center mt-8">
                        <label for="lname" class="leading-7 text-xl text-gray-600 font-bold" style="margin-right: 303px;">นามสกุล</label>
                        <div class="relative w-64 md:w-96 rounded-lg text-lg  py-2 px-3 leading-8 shadow-lg text-sky-950 bg-[#93c5fd] font-bold">
                            <?= $item_select['l_name'] ?>
                        </div>
                    </div>

                    <!-- ข้อมูลการจอง -->
                    <p class="text-2xl text-center text-black mt-8"><strong><?= $_SESSION['user_type'] == 'emp_front' ? 'ข้อมูลการขาย' : 'ข้อมูลการจอง' ?></strong></p>
                    <br>
                    <!-- lightbox QR Code -->
                    <div id="lightbox" class="hidden fixed top-0 left-0 w-screen h-screen flex justify-center items-center bg-black bg-opacity-90">
                        <div id="lightbox-content" class="bg-white p-8 rounded-lg text-center">
                            <p class="text-2xl font-semibold">QR Code</p>
                            <img id="qr-code" src="" alt="QR Code" width="200">
                            <button id="close-lightbox" class="mt-4 px-4 py-2 bg-red-500 text-white rounded">Close</button>
                        </div>
                    </div>

                    <!-- ตารางข้อมูลการจอง -->
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-4 bg-[#3b82f6] text-white text-center" style="width: 20%;">ชื่อภาพยนตร์</th>
                                <th class="px-6 py-4 bg-[#3b82f6] text-white text-center" style="width: 20%;">โรงภาพยนตร์</th>
                                <th class="px-6 py-4 bg-[#3b82f6] text-white text-center" style="width: 20%;">วันฉายภาพยนตร์</th>
                                <th class="px-6 py-4 bg-[#3b82f6] text-white text-center" style="width: 20%;">เวลาฉาย</th>
                                <th class="px-6 py-4 bg-[#3b82f6] text-white text-center" style="width: 20%;">รหัสที่นั่ง</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql_select = "SELECT name, theater, show_date, show_time, seat_id FROM ticket JOIN showtime USING (show_id) 
                            JOIN movie USING (movie_id) WHERE user_id = '$user_id' ORDER BY show_date desc, show_time desc";

                            $result_select = $conn->query($sql_select);

                            while ($item = $result_select->fetch_assoc()) {
                            ?>
                                <tr class="booking-row cursor-pointer">
                                    <td class="px-6 py-4 bg-[#eff6ff] text-center">
                                        <?= $item['name'] ?>
                                    </td>
                                    <td class="px-6 py-4 bg-[#eff6ff] text-center">
                                        <?= $item['theater'] ?>
                                    </td>
                                    <td class="px-6 py-4 bg-[#eff6ff] text-center">
                                        <?= $item['show_date'] ?>
                                    </td>
                                    <td class="px-6 py-4 bg-[#eff6ff] text-center">
                                        <?= $item['show_time'] ?>
                                    </td>
                                    <td class="px-6 py-4 bg-[#eff6ff] text-center">
                                        <?= $item['seat_id'] ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bookingRows = document.querySelectorAll('.booking-row');
            const lightbox = document.getElementById('lightbox');
            const lightboxContent = document.getElementById('lightbox-content');
            const qrCode = document.getElementById('qr-code');
            const closeLightbox = document.getElementById('close-lightbox');

            bookingRows.forEach(function(row, i) {
                row.addEventListener('click', function() {
                    // Load the QR code image URL for this booking (replace with actual URL)
                    const qrCodeURL = 'https://upload.wikimedia.org/wikipedia/commons/2/2f/Rickrolling_QR_code.png?20200615212723'
                    qrCode.src = qrCodeURL;

                    // Show the lightbox
                    lightbox.classList.remove('hidden');
                });
            });

            closeLightbox.addEventListener('click', function() {
                // Close the lightbox
                lightbox.classList.add('hidden');
            });
        });
    </script>

    <?php include 'header/footer.php'; ?>

</body>

</html>