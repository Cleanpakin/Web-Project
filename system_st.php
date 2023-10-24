<?php include 'header/back.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="image/icon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการรอบฉายภาพยนตร์</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mali&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/7a742b4e40.js" crossorigin="anonymous"></script>

    <script src="js/system_st.js"></script>

    <style>
        body {
            font-family: 'Mali', cursive;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: auto;
            margin-bottom: auto;
            width: 50%;
        }

        .mid {
            text-align: center;
            font-size: x-large;
        }

        .disabled-link {
            pointer-events: none;
            color: gray;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav class="navbar mb-5" style="background-color: #e5e5e5;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="image/icon.svg" alt="Logo" width="60" height="48" class="d-inline-block align-text-center">
                <span style="font-size: 1.4em;">CINENIC</span>
            </a>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="nav-link" href="logout.php"><span class="align-text-center" style="font-size: 1.3em;">Log out</span>
                        <i class="fa-solid fa-right-from-bracket px-1" style="color: #000000;"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="btn-group d-flex justify-content-center px-5 mb-5">
        <a href="system_m.php" class="btn btn-secondary" style="font-size: 1.6em;">ไปหน้าจัดการรายการภาพยนตร์</a>
        <a href="" class="btn btn-light active disabled-link" style="font-size: 1.6em;" aria-current="page">ไปหน้าจัดการรอบฉายภาพยนตร์</a>
    </div>

    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <div class="card-body">
                    <div class="container my-4">
                        <h2>รายการรอบฉายภาพยนตร์</h2>

                        <?php
                        if (isset($_SESSION['status'])) {

                            if ($_SESSION['status'] == 'add_success') {
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    เพิ่มรอบฉายภาพยนตร์สำเร็จ!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }

                            if ($_SESSION['status'] == 'add_fail') {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    เพิ่มรอบฉายภาพยนตร์ไม่สำเร็จ! ชื่อภาพยนตร์ที่กรอกอาจไม่อยู่ในรายการภาพยนตร์
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }

                            if ($_SESSION['status'] == 'edit_success') {
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    แก้ไขรอบฉายภาพยนตร์สำเร็จ!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }

                            if ($_SESSION['status'] == 'delete_success') {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    ลบรอบฉายภาพยนตร์สำเร็จ!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }

                            $_SESSION['status'] = '';
                        }
                        ?>

                        <div class="row my-5">
                            <div class="col-md-3">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <h2 class="col-form-label">เลือกวัน</h2>
                                    </div>
                                    <div class="col-auto">
                                        <input type="date" id="date" name="date" onchange="selected_change()" class="form-control" value="<?= isset($_SESSION['date']) == true ? $_SESSION['date'] : date('Y-m-d') ?>">
                                    </div>
                                </div>

                                <div class="row my-3 align-items-center">
                                    <div class="col-auto">
                                        <h2 class="col-form-label">เลือกโรงฉาย</h2>
                                    </div>
                                    <div class="col-auto">
                                        <select name="theater" id="theater" onchange="selected_change()" class="form-select">
                                            <option value="1" selected>Theater 1</option>
                                            <option value="2" <?= isset($_SESSION['theater']) == true ? ($_SESSION['theater'] == '2' ? 'selected' : '') : '' ?>>Theater 2</option>
                                            <option value="3" <?= isset($_SESSION['theater']) == true ? ($_SESSION['theater'] == '3' ? 'selected' : '') : '' ?>>Theater 3</option>
                                            <option value="4" <?= isset($_SESSION['theater']) == true ? ($_SESSION['theater'] == '4' ? 'selected' : '') : '' ?>>Theater 4</option>
                                            <option value="5" <?= isset($_SESSION['theater']) == true ? ($_SESSION['theater'] == '5' ? 'selected' : '') : '' ?>>Theater 5</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row my-3 align-items-center">
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_data">เพิ่มรอบฉายภาพยนตร์</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="jumbotron" id="output"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Data -->
    <div class="modal fade" id="add_data" tabindex="-1" data-bs-backdrop="static" aria-labelledby="add_data" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">เพิ่มรอบฉายภาพยนตร์</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="add_showtime.php" method="post">
                        <div class="row mb-3">
                            <label class="col-sm-5 col-form-label">ชื่อภาพยนตร์</label>
                            <div class="col-sm-7">
                                <input type="text" list="datalistOptions" class="form-control" name="name" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-5 col-form-label">รอบฉายภาพยนตร์</label>
                            <div class="col-sm-7">
                                <input type="time" class="form-control" name="time" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-5 col-form-label">เสียงพากย์</label>
                            <div class="col-sm-7">
                                <select class="form-select" name="dub">
                                    <option value="English" selected>English</option>
                                    <option value="Thai">Thai</option>
                                    <option value="Japanese">Japanese</option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer" id="add_footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add</button>`
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Data -->
    <div class="modal fade" id="edit_data" tabindex="-1" data-bs-backdrop="static" aria-labelledby="edit_data" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">แก้ไขรอบฉายภาพยนตร์</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="edit_showtime.php" method="post">
                        <input type="text" id="id" name="id" hidden>
                        <div class="row mb-3">
                            <label class="col-sm-5 col-form-label">รอบฉายภาพยนตร์</label>
                            <div class="col-sm-7">
                                <input type="time" class="form-control" id="time" name="time" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-5 col-form-label">เสียงพากย์</label>
                            <div class="col-sm-7">
                                <select class="form-select" id="dub" name="dub">
                                    <option value="English" selected>English</option>
                                    <option value="Thai">Thai</option>
                                    <option value="Japanese">Japanese</option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Confirm</button>`
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Data -->
    <div class="modal fade" id="delete_data" tabindex="-1" data-bs-backdrop="static" aria-labelledby="delete_data" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">ลบรอบฉายภาพยนตร์</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>รอบฉายภาพยนตร์จะไม่สามารถกู้คืนได้!</strong><br>ท่านต้องการที่จะลบรอบฉายภาพยนตร์หรือไม่</p>
                </div>
                <div class="modal-footer" id="delete_footer"></div>
            </div>
        </div>
    </div>

    <?php
    $mysqli = require __DIR__ . "/database.php";

    $sql_select = "SELECT name FROM movie WHERE status in ('Now showing', 'Coming soon')";

    $result = mysqli_query($conn, $sql_select);

    if (mysqli_num_rows($result) > 0) {
        $datalist = '<datalist id="datalistOptions">';

        while ($item = $result->fetch_assoc()) {
            $datalist = $datalist . '<option value="' . $item['name'] . '">';
        }

        $datalist = $datalist . '</datalist>';
    }

    echo $datalist
    ?>

</body>

</html>