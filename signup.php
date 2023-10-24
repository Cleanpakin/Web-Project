<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="image/icon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <title>สมัครสมาชิก</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mali&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Mali', cursive;
        }
    </style>
</head>

<body>
    <div class="lg:flex bg-[#fff]">
        <div class="lg:w-1/2 xl:max-w-screen-mlg">
            <div class="py-5 bg-indigo-100 lg:bg-white flex justify-center lg:justify-start lg:px-12">
                <div class="cursor-pointer flex items-center">
                    <div>
                        <svg class="w-10 text-indigo-500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 225 225" style="enable-background:new 0 0 225 225;" xml:space="preserve">
                            <style type="text/css">
                            </style>
                            <g transform="matrix( 1, 0, 0, 1, 0,0) ">
                                <g>
                                    <path id="Layer0_0_1_STROKES" class="st0" d="M173.8,151.5l13.6-13.6 M35.4,89.9l29.1-29 M89.4,34.9v1 M137.4,187.9l-0.6-0.4     M36.6,138.7l0.2-0.2 M56.1,169.1l27.7-27.6 M63.8,111.5l74.3-74.4 M87.1,188.1L187.6,87.6 M110.8,114.5l57.8-57.8" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="text-2xl text-indigo-700 tracking-wide ml-2 font-semibold">CINENIC</div>
                </div>
            </div>
            <div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl">
                <h2 class="text-center text-4xl text-indigo-700 font-display font-semibold lg:text-left xl:text-5xl
                xl:text-bold">Sign up</h2>
                <div class="mt-6">
                    <form action="" method="post" id="login">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] === "POST") {
                            $email = $_POST['email'];

                            $mysqli = require __DIR__ . "/database.php";

                            $sql_select = "SELECT email FROM user WHERE email = '$email'";

                            $result_select = mysqli_query($conn, $sql_select);

                            if (mysqli_num_rows($result_select) == 0) {
                                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                                $fname = $_POST['firstname'];
                                $lname = $_POST['lastname'];

                                $sql_insert = "INSERT INTO user(email, f_name, l_name, password, type) VALUES('$email', '$fname', '$lname', '$password', 'customer')";

                                mysqli_query($conn, $sql_insert);

                                mysqli_close($conn);

                                header('Location: index.php');
                                exit();
                            } else {
                                echo ('The email address is already in use by another account.');
                                mysqli_close($conn);
                            }
                        }
                        ?>
                        <div>
                            <div class="text-sm font-bold text-gray-700 tracking-wide px-1 my-2">Email</div>
                            <input class="w-full text-lg py-2 px-2 border rounded border-gray-300 focus:outline-none focus:border-indigo-300" type="email" id="email" name='email' class="form-control" placeholder="Enter Email">
                            <p id="email_p" class="text-red-500 text-xs"></p>
                        </div>
                        <div class="mt-3">
                            <div class="flex justify-between items-center">
                                <div class="text-sm font-bold text-gray-700 tracking-wide px-1 my-2">Password</div>
                            </div>
                            <input class="w-full text-lg py-2 px-2 border rounded border-gray-300 focus:outline-none focus:border-indigo-300" type="password" placeholder="Enter your password" id="password" name="password" class="form-control">
                            <p id="password_p" class="text-red-500 text-xs"></p>
                        </div>
                        <div class="mt-3">
                            <div class="flex justify-between items-center">
                                <div class="text-sm font-bold text-gray-700 tracking-wide px-1 my-2">Firstname</div>
                            </div>
                            <input class="w-full text-lg py-2 px-2 border rounded border-gray-300 focus:outline-none focus:border-indigo-300" type="text" placeholder="Enter Firstname" id="firstname" name="firstname" class="form-control">
                            <p id="firstname_p" class="text-red-500 text-xs"></p>
                        </div>
                        <div class="mt-3">
                            <div class="flex justify-between items-center">
                                <div class="text-sm font-bold text-gray-700 tracking-wide px-1 my-2">Lastname</div>
                            </div>
                            <input class="w-full text-lg py-2 px-2 border rounded border-gray-300 focus:outline-none focus:border-indigo-300" type="text" placeholder="Enter Lastname" id="lastname" name="lastname" class="form-control">
                            <p id="lastname_p" class="text-red-500 text-xs"></p>
                        </div>
                        <div class="mt-10">
                            <button class="bg-gradient-to-r from-cyan-400 to-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide
                            font-semibold font-display focus:outline-none focus:shadow-outline hover:from-cyan-500 hover:to-indigo-600
                            shadow-lg" type="submit" id="submit" disabled>Sign up</button>
                        </div>
                    </form>
                    <div class="mt-6 text-sm font-display font-semibold text-gray-700 text-center">
                        เป็นสมาชิกกับ CINENIC แล้ว? <a href="login.php" class="cursor-pointer text-indigo-600 hover:text-indigo-800">เข้าสู่ระบบ</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-center bg-indigo-100 flex-1 h-screen " style="background-image: url(&quot;https://images.unsplash.com/photo-1559570278-eb8d71d06403?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxMjA3fDB8MXxhbGx8fHx8fHx8fHwxNjk2NjExNTU1fA&ixlib=rb-4.0.3&q=80&w=1080&quot;);">
        </div>
        <div class="max-w-xs transform duration-200 hover:scale-110 cursor-pointer">

        </div>
    </div>

    <section class="mt-8">
        <!-- Footer -->
        <footer class="bg-secondary text-white">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2023 Copyright: Cineteca
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </section>


    <script src="js/signup.js"></script>
</body>

</html>