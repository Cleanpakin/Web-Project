<?php include 'header/front.php'; ?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="image/icon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINENIC Cinema</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mali&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Mali', cursive;
        }

        .card {
            min-width: 260px;
        }

        .arrow {
            top: 50%;
        }

        #carrusel {
            scroll-behavior: smooth;
        }
    </style>
</head>

<?php
$_SESSION['movie'] = '';
$_SESSION['show_id'] =  '';
$_SESSION['seat_id'] = [];
$_SESSION['total_price'] = '';

$mysqli = require __DIR__ . "/database.php";
?>

<body class="bg-[#eee]">

    <?php include 'header/header.php'; ?>

    <!--Hero Section-->
    <section class="lg:h-[42em] md:h-[30em] sm:h-[20em] min-[400px]:h-[10em] group relative overflow-hidden" id="default-carousel" class="relative" data-carousel="static">
        <!--Hero Image-->
        <div class="hidden duration-700 ease-in-out mb-4" data-carousel-item>
            <div class="relative">
                <img class="w-full" src="https://lh3.googleusercontent.com/JaYh8VUerSofrMwQfiW2wc-Y6Fk2NYPMXQ1MvkLrdxnGjCi4qS1KlYRdCVjgnNLsehPl9wSuz9TO4qi-6fy-J0h2rIi0hH0Bng=w1920" alt="">
                <div class="absolute inset-0 flex flex-col justify-end w-full h-full text-white bg-gradient-to-b from-transparent to-black">
                    <div class="container ml-12 px-4 lg:px-0 pb-4 min-[400px]:pb-0">
                        <h3 class="min-[400px]:text-xs tracking-wider group-hover:mb-1 duration-500">
                            Biography, Drama, History
                        </h3>
                        <h1 class="text-3xl mb-16 lg:text-5xl min-[400px]:text-md group-hover:mb-1 duration-500">
                            Oppenheimer
                        </h1>

                        <div class="flex space-x-8 opacity-0 group-hover:opacity-100 group-hover:mb-10 lg:group-hover:mb-20 duration-1000">
                            <!--Watch-->
                            <a href="showtime.php?name=Oppenheimer">
                                <div class="flex space-x-2 items-center cursor-pointer">
                                    <p class="text-white uppercase lg:text-lg hover:text-sky-300 duration-500">จองภาพยนตร์</p>
                                    <div class="flex h-8 w-8 rounded-full text-center items-center justify-center bg-gradient-to-r from-cyan-400 to-indigo-600 hover:from-cyan-500 hover:to-indigo-700 text-white">
                                        <i class="fas fa-play"></i>
                                    </div>
                                </div>
                            </a>

                            <!--INFO-->
                            <a href="movie_detail.php?name=Oppenheimer">
                                <div class="flex space-x-2 items-center cursor-pointer">
                                    <p class="text-white uppercase lg:text-lg hover:text-sky-300 duration-500">รายละเอียดภาพยนตร์
                                    <div class="flex h-8 w-8 rounded-full text-center items-center justify-center bg-gradient-to-r from-cyan-400 to-indigo-600 hover:from-cyan-500 hover:to-indigo-700 text-white">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="hidden duration-700 ease-in-out mb-4" data-carousel-item>
            <div class="relative">
                <img class="w-full" src="https://lh3.googleusercontent.com/TyYtVWHcexo1_791LrhYF3h8t89x5EQsjRPVD9A_Uo925YPXLtQK3jXPkI65qSOZisPLkEOO6QovrZPgDDe4U-HA7ZTQ1GQ9_g=w1920" alt="">
                <div class="absolute inset-0 flex flex-col justify-end w-full h-full text-white bg-gradient-to-b from-transparent to-black">
                    <div class="container ml-12 px-4 lg:px-0 pb-4">
                        <h3 class="min-[400px]:text-xs tracking-wider group-hover:mb-1 duration-500">
                            Music
                        </h3>
                        <h1 class="text-3xl mb-16 lg:text-5xl min-[400px]:text-md group-hover:mb-1 duration-500">
                            TAYLOR SWIFT I THE ERAS TOUR
                        </h1>

                        <div class="flex space-x-8 opacity-0 group-hover:opacity-100 group-hover:mb-10 lg:group-hover:mb-20 duration-1000">
                            <!--Watch-->
                            <div class="flex space-x-2 items-center cursor-pointer">
                                <a href="#" class="text-white uppercase lg:text-lg hover:text-sky-300 duration-500">จองภาพยนตร์</a>
                                <div class="flex h-8 w-8 rounded-full text-center items-center justify-center bg-gradient-to-r from-cyan-400 to-indigo-600 hover:from-cyan-500 hover:to-indigo-700 text-white">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>

                            <!--INFO-->
                            <div class="flex space-x-2 items-center cursor-pointer">
                                <a href="#" class="text-white uppercase lg:text-lg hover:text-sky-300 duration-500">รายละเอียดภาพยนตร์</a>
                                <div class="flex h-8 w-8 rounded-full text-center items-center justify-center bg-gradient-to-r from-cyan-400 to-indigo-600 hover:from-cyan-500 hover:to-indigo-700 text-white">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden duration-700 ease-in-out mb-4" data-carousel-item>
            <div class="relative">
                <img class="w-full" src="https://lh3.googleusercontent.com/1mjkGvOrs8_B4a9yIzh2c96lgU9kbrtd0F8IQ-TkZFpTPeILGR0xn26gqCWca1iTQFX-CdTML0VdcE_ZnfbmofeQuoW13w0h2Q=w1920" alt="">
                <div class="absolute inset-0 flex flex-col justify-end w-full h-full text-white bg-gradient-to-b from-transparent to-black">
                    <div class="container ml-12 px-4 lg:px-0 pb-4">
                        <h3 class="min-[400px]:text-xs tracking-wider group-hover:mb-1 duration-500">
                            Drama, Horror
                        </h3>
                        <h1 class="text-3xl mb-16 lg:text-5xl min-[400px]:text-md group-hover:mb-1 duration-500">
                            สัปเหร่อ
                        </h1>

                        <div class="flex space-x-8 opacity-0 group-hover:opacity-100 group-hover:mb-10 lg:group-hover:mb-20 duration-1000">
                            <!--Watch-->
                            <div class="flex space-x-2 items-center cursor-pointer">
                                <a href="showtime.php?name=สัปเหร่อ" class="text-white uppercase lg:text-lg hover:text-sky-300 duration-500">จองภาพยนตร์</a>
                                <div class="flex h-8 w-8 rounded-full text-center items-center justify-center bg-gradient-to-r from-cyan-400 to-indigo-600 hover:from-cyan-500 hover:to-indigo-700 text-white">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>

                            <!--INFO-->
                            <div class="flex space-x-2 items-center cursor-pointer">
                                <a href="movie_detail.php?name=สัปเหร่อ" class="text-white uppercase lg:text-lg hover:text-sky-300 duration-500">รายละเอียดภาพยนตร์</a>
                                <div class="flex h-8 w-8 rounded-full text-center items-center justify-center bg-gradient-to-r from-cyan-400 to-indigo-600 hover:from-cyan-500 hover:to-indigo-700 text-white">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden duration-700 ease-in-out mb-4" data-carousel-item>
            <div class="relative">
                <img class="w-full" src="https://lh3.googleusercontent.com/LPabQgd8BR34FHUzWefBcU6EiwUyS-BOORzuEXvl75VS2OnVmqMDA5qLWUMt70ipd1hwigKYJRhGvUA8FyLQ_-4-GTUKWeXt=w1920" alt="">
                <div class="absolute inset-0 flex flex-col justify-end w-full h-full text-white bg-gradient-to-b from-transparent to-black">
                    <div class="container ml-12 px-4 lg:px-0 pb-4">
                        <h3 class="min-[400px]:text-xs tracking-wider group-hover:mb-1 duration-500">
                            Action, Drama, Sci - Fi
                        </h3>
                        <h1 class="text-3xl mb-16 lg:text-5xl min-[400px]:text-md group-hover:mb-1 duration-500">
                            เดอะ ครีเอเตอร์
                        </h1>

                        <div class="flex space-x-8 opacity-0 group-hover:opacity-100 group-hover:mb-10 lg:group-hover:mb-20 duration-1000">
                            <!--Watch-->
                            <div class="flex space-x-2 items-center cursor-pointer">
                                <a href="#" class="text-white uppercase lg:text-lg hover:text-sky-300 duration-500">จองภาพยนตร์</a>
                                <div class="flex h-8 w-8 rounded-full text-center items-center justify-center bg-gradient-to-r from-cyan-400 to-indigo-600 hover:from-cyan-500 hover:to-indigo-700 text-white">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>

                            <!--INFO-->
                            <div class="flex space-x-2 items-center cursor-pointer">
                                <a href="#" class="text-white uppercase lg:text-lg hover:text-sky-300 duration-500">รายละเอียดภาพยนตร์</a>
                                <div class="flex h-8 w-8 rounded-full text-center items-center justify-center bg-gradient-to-r from-cyan-400 to-indigo-600 hover:from-cyan-500 hover:to-indigo-700 text-white">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden duration-700 ease-in-out mb-4" data-carousel-item>
            <div class="relative">
                <img class="w-full" src="https://lh3.googleusercontent.com/BsJwgxEyYRf5vCTBXYf-nnHiBBVQiDoRoiHAXQs1HuNpntIdYWKAUS1se8oLbFtKVeRq2uAJ0cXMO4bMOPwa10mehpnPnEtcnT0=w1920" alt="">
                <div class="absolute inset-0 flex flex-col justify-end w-full h-full text-white bg-gradient-to-b from-transparent to-black">
                    <div class="container ml-12 px-4 lg:px-0 pb-4">
                        <h3 class="min-[400px]:text-xs tracking-wider group-hover:mb-1 duration-500">
                            Action, Crime, Thriller
                        </h3>
                        <h1 class="text-3xl mb-16 lg:text-5xl min-[400px]:text-md group-hover:mb-1 duration-500">
                            มัจจุราชไร้เงา III ปิดตำนานนักฆ่าจับเวลาตาย
                        </h1>

                        <div class="flex space-x-8 opacity-0 group-hover:opacity-100 group-hover:mb-10 lg:group-hover:mb-20 duration-1000">
                            <!--Watch-->
                            <div class="flex space-x-2 items-center cursor-pointer">
                                <a href="#" class="text-white uppercase lg:text-lg hover:text-sky-300 duration-500">จองภาพยนตร์</a>
                                <div class="flex h-8 w-8 rounded-full text-center items-center justify-center bg-gradient-to-r from-cyan-400 to-indigo-600 hover:from-cyan-500 hover:to-indigo-700 text-white">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>

                            <!--INFO-->
                            <div class="flex space-x-2 items-center cursor-pointer">
                                <a href="#" class="text-white uppercase lg:text-lg hover:text-sky-300 duration-500">รายละเอียดภาพยนตร์</a>
                                <div class="flex h-8 w-8 rounded-full text-center items-center justify-center bg-gradient-to-r from-cyan-400 to-indigo-600 hover:from-cyan-500 hover:to-indigo-700 text-white">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <button type="button" class="flex absolute xl:top-[18em] lg:top-[8em] md:top-[10em] left-0 z-30  px-4 h-32 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                    </path>
                </svg>
                <span class="hidden"></span>
            </span>
        </button>
        <button type="button" class="flex absolute xl:top-[18em] lg:top-[8em] md:top-[10em] right-0 z-30  px-4 h-32 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 0 group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="hidden"></span>
            </span>
        </button>
    </section>

    <!--Movie Section-->
    <div id="movie">
        <section class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
            <h1 class=" text-4xl my-10 mx-10 ">Now Showing</h1>
            <div classite="relative">
                <div id="carrusel" class="flex flex-row overflow-x-auto mx-6 slider" data-aos="fade-right" data-aos-duration="1000">
                    <?php
                    $sql_select = "SELECT name, poster, release_date FROM movie WHERE status = 'Now showing'";

                    $result = mysqli_query($conn, $sql_select);

                    while ($item = $result->fetch_assoc()) {

                        if (preg_match('/[\p{Thai}]/u', $item['name'])) {
                            if (strlen($item['name']) > 60) {
                                $short = substr($item['name'], 0, 60) . '...';
                            } else {
                                $short = $item['name'];
                            }
                        } else {
                            if (strlen($item['name']) > 25) {
                                $short = substr($item['name'], 0, 25) . '...';
                            } else {
                                $short = $item['name'];
                            }
                        }

                        echo '<a href="showtime.php?name=' . $item['name'] . '">
                            <div class="card flex flex-col items-start w-[260px] m-3 text-center bg-[#eee]">
                                <img src="' . $item['poster'] . '" class="w-[260px] h-[380px] mb-2">
                                <h4 class="text-lg">' . $short . '</h4>
                                <p class="text-sm">' . $item['release_date'] . '</p>
                            </div>
                            </a>';
                    }
                    ?>
                </div>
                <div id="carrousel-left" class="arrow absolute bg-gradient-to-r from-cyan-500 to-indigo-600 hover:from-cyan-600 hover:to-indigo-700 rounded-full text-white p-3 p-3 shadow cursor-pointer hover:bg-blue-600"> <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg></div>
                <div id="carrousel-right" class="arrow absolute right-0 bg-gradient-to-l from-cyan-500 to-indigo-600 hover:from-cyan-600 hover:to-indigo-700 rounded-full text-white p-3 shadow cursor-pointer hover:bg-blue-600">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg></span>
                </div>
            </div>
        </section>

        <section class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
            <h1 class=" text-4xl my-10 mx-10 ">Coming Soon</h1>
            <div classite="relative">
                <div id="carrusel1" class="flex flex-row overflow-x-auto mx-6 slider" data-aos="fade-right" data-aos-duration="1000">
                    <?php
                    $sql_select = "SELECT name, poster, release_date FROM movie WHERE status = 'Coming soon'";

                    $result = mysqli_query($conn, $sql_select);

                    while ($item = $result->fetch_assoc()) {

                        if (preg_match('/[\p{Thai}]/u', $item['name'])) {
                            if (strlen($item['name']) > 40) {
                                $short = substr($item['name'], 0, 40) . '...';
                            } else {
                                $short = $item['name'];
                            }
                        } else {
                            if (strlen($item['name']) > 25) {
                                $short = substr($item['name'], 0, 25) . '...';
                            } else {
                                $short = $item['name'];
                            }
                        }

                        echo '<a href="showtime.php?name=' . $item['name'] . '">
                            <div class="card flex flex-col items-start w-[260px] m-3 text-center bg-[#eee]">
                                <img src="' . $item['poster'] . '" class="w-[260px] h-[380px] mb-2">
                                <h4 class="text-lg">' . $short . '</h4>
                                <p class="text-sm">' . $item['release_date'] . '</p>
                            </div>
                            </a>';
                    }
                    ?>
                </div>
                <div id="carrousel-left1" class="arrow absolute bg-gradient-to-r from-cyan-500 to-indigo-600 hover:from-cyan-600 hover:to-indigo-700 rounded-full text-white p-3 p-3 shadow cursor-pointer hover:bg-blue-600"> <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg></div>
                <div id="carrousel-right1" class="arrow absolute right-0 bg-gradient-to-l from-cyan-500 to-indigo-600 hover:from-cyan-600 hover:to-indigo-700 rounded-full text-white p-3 shadow cursor-pointer hover:bg-blue-600">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg></span>
                </div>
            </div>
        </section>
    </div>

    <!--promotion-->
    <div>
        <section class="text-gray-600 body-font relative  bg-slate-50">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full mb-12 py-8" id="promotion">
                    <h1 class="sm:text-3xl text-4xl font-medium title-font mb-4 text-gray-900">โปรโมชั่น และ สินค้า</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">โปรโมชั่นและสินค้าที่ดีที่สุดสำหรับสมาชิกคนพิเศษของ
                        CINENIC</p>
                </div>
                <div class="container px-5 py-12 mx-auto">
                    <div class="flex flex-wrap -m-4">
                        <div class="p-4 md:w-1/3" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">
                            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                <img class="lg:h-64 md:h-48 w-full object-cover object-center" src="image/Cine.png" alt="blog">
                                <div class="p-6">
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">โปรโมชั่น</h2>
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">สมัครสมาชิก CINENIC จ่ายทีเดียว
                                        เป็นตลอดชีพ</h1>
                                    <p class="leading-relaxed mb-3">1 กรกฏาคม 2566</p>
                                    <div class="flex items-center flex-wrap ">
                                        <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0" href="#">Learn More
                                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                        <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm py-1">
                                            <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>1.2K
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 md:w-1/3" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
                            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                <img class="lg:h-64 md:h-48 w-full object-cover " src="//fellowproducts.com/cdn/shop/products/Carter-Move-Mug-Family-Classic-Colors-12-oz_900x.png?v=1643661268" alt="blog">
                                <div class="p-6">
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">สินค้า</h2>
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">กระติกเก็บความเย็น/ร้อน CINENIC</h1>
                                    <p class="leading-relaxed mb-3">18 กรกฏาคม 2566</p>
                                    <div class="flex items-center flex-wrap ">
                                        <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0" href="#">Learn More
                                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                        <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm py-1">
                                            <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>0.6k
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 md:w-1/3" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                <img class="lg:h-64 md:h-48 w-full object-cover object-center" src="https://cms.dmpcdn.com/moviearticle/2023/02/14/6dffd290-ac1b-11ed-9e16-b1fe8a6e7fbe_webp_original.jpg" alt="blog">
                                <div class="p-6">
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">โปรโมชั่น</h2>
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">โปรโมชั่น ลดราคาจาก True ID เหลือเพียง 99
                                        บาท!</h1>
                                    <p class="leading-relaxed mb-3">1 กันยายน 2566</p>
                                    <div class="flex items-center flex-wrap ">
                                        <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0" href="#">Learn More
                                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                        <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm py-1">
                                            <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>1.3k
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

    <?php
    mysqli_close($conn);
    ?>

    <?php include 'header/footer.php'; ?>

</body>

<script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
<script type="module" src="script.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>


<script src="js/card.js"></script>

</html>