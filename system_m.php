<?php include 'header/back.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="image/icon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการรายการภาพยนตร์</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mali&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/7a742b4e40.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script src="js/system_m.js"></script>

    <style>
        body {
            font-family: 'Mali', cursive;
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
        <a href="" class="btn btn-light active disabled-link" style="font-size: 1.6em;" aria-current="page">ไปหน้าจัดการรายการภาพยนตร์</a>
        <a href="system_st.php" class="btn btn-secondary" style="font-size: 1.6em;">ไปหน้าจัดการรอบฉายภาพยนตร์</a>
    </div>

    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <div class="card-body">

                    <?php
                    if (isset($_SESSION['status'])) {
                        if ($_SESSION['status'] == 'add_success') {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>เพิ่มรายการภาพยนตร์สำเร็จ!</strong> สามารถตรวจสอบรายการได้ที่ตารางด้านล่าง
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                        }

                        if ($_SESSION['status'] == 'delete_success') {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>ลบรายการภาพยนตร์สำเร็จ!</strong> สามารถตรวจสอบรายการได้ที่ตารางด้านล่าง
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                        }

                        if ($_SESSION['status'] == 'edit_success') {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>แก้ไขรายการภาพยนตร์สำเร็จ!</strong> สามารถตรวจสอบรายการได้ที่ตารางด้านล่าง
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                        }

                        $_SESSION['status'] = '';
                    }
                    ?>

                    <div class="container my-3">
                        <h2>รายการภาพยนตร์</h2>

                        <div class="row my-4">
                            <div class="col-md-5">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_data">
                                    เพิ่มภาพยนตร์
                                </button>
                            </div>
                        </div>
                        <div>
                            <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>ชื่อภาพยนตร์</th>
                                        <th>วันที่เข้าฉาย</th>
                                        <th>สถานะ</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $mysqli = require __DIR__ . "/database.php";


                                    $sql = "SELECT movie_id, name, release_date, status FROM movie";


                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($item = $result->fetch_assoc()) {
                                            echo '<tr>
                                        <td>' . $item['name'] . '</td>
                                        <td>' . $item['release_date'] . '</td>
                                        <td>' . $item['status'] . '</td>
                                        <td>
                                            <button type="button" class="btn btn-light" name="view" data-bs-toggle="modal" data-bs-target="#view_data" onclick="submit_button(\'view\', ' . $item['movie_id'] . ')">
                                                <i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i>
                                            </button>

                                            <button type="button" class="btn btn-light" name="edit" data-bs-toggle="modal" data-bs-target="#edit_data" onclick="submit_button(\'edit\', ' . $item['movie_id'] . ')">
                                                <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                                            </button>

                                            <button type="button" class="btn btn-light" name="delete" data-bs-toggle="modal" data-bs-target="#delete_data" onclick="submit_button(\'delete\', ' . $item['movie_id'] . ')">
                                                <i class="fa-solid fa-trash" style="color: #000000;"></i>
                                            </button>
                                        </td>
                                        </tr>';
                                        }
                                    }

                                    mysqli_close($conn);

                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Data -->
    <div class="modal fade" id="add_data" tabindex="-1" data-bs-backdrop="static" aria-labelledby="add_data" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">เพิ่มภาพยนตร์</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="check_form" action="add_data.php" method="post">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">ชื่อภาพยนตร์</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" placeholder="ชื่อภาพยนตร์" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">ภาพโปสเตอร์</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="poster" placeholder="https://example.com" pattern="https://.*" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">วันที่เข้าฉาย</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="release_date" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">หมวดหมู่</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="category" placeholder="หมวดหมู่ 1, หมวดหมู่ 2, ..." required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">เรทอายุผู้ชม</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="viewer_rate" placeholder="ตัวย่อเรทอายุผู้ชม" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">ความยาวภาพยนตร์</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="time_range" placeholder="ตัวเลข(นาที)" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">ตัวอย่างภาพยนตร์</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="trailer" placeholder="https://www.youtube.com/embed/..." pattern="https://www.youtube.com/embed/.*" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">ชื่อผู้กำกับ</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="director_name" placeholder="ชื่อผู้กำกับ" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">รูปผู้กำกับ</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="director_pic" placeholder="https://example.com" pattern="https://.*" required>
                            </div>
                        </div>

                        <div id="actor">
                            <input id="actor_count" name="actor_count" value="1" hidden>
                            <div id="1">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">ชื่อนักแสดงคนที่ 1</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="actor_name1" placeholder="ชื่อนักแสดง" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">รูปนักแสดงคนที่ 1</label>
                                    <div class="col-sm-9">
                                        <input type="url" class="form-control" name="actor_pic1" placeholder="https://example.com" pattern="https://.*" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="my-3">
                            <button type="button" class="btn btn-outline-dark btn-sm" onclick="add_actor_add()">เพิ่มนักแสดง</button>
                            <button type="button" class="btn btn-outline-dark btn-sm" onclick="delete_actor_add()">ลบนักแสดง</button>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">เรื่องย่อ</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="synopsis" rows="5" placeholder="เรื่องย่อภาพยนตร์" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">สถานะ</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="status" required>
                                    <option value="" selected>เลือกสถานะ</option>
                                    <option value="Now showing">Now showing</option>
                                    <option value="Coming soon">Coming soon</option>
                                    <option value="Out">Out</option>
                                </select>
                            </div>
                        </div>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- View Data -->
    <div class="modal fade" id="view_data" tabindex="-1" aria-labelledby="view_data" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">ข้อมูลภาพยนตร์</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-sm-4">ชื่อภาพยนตร์ :</div>
                        <div class="col-sm-8" id="name_view"></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4">ภาพโปสเตอร์ :</div>
                        <div class="col-sm-8" id="poster_view"></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4">วันที่เข้าฉาย :</div>
                        <div class="col-sm-8" id="release_date_view"></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4">หมวดหมู่ :</div>
                        <div class="col-sm-8" id="category_view"></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4">เรทอายุผู้ชม :</div>
                        <div class="col-sm-8" id="viewer_rate_view"></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4">ความยาวภาพยนตร์ :</div>
                        <div class="col-sm-8" id="time_range_view"></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4">ตัวอย่างภาพยนตร์ :</div>
                        <div class="col-sm-8" id="trailer_view"></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4">ชื่อผู้กำกับ :</div>
                        <div class="col-sm-8" id="director_name_view"></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4">รูปผู้กำกับ :</div>
                        <div class="col-sm-8" id="director_pic_view"></div>
                    </div>

                    <div id="actor_view"></div>

                    <div class="row mb-3">
                        <div class="col-sm-4">เรื่องย่อ :</div>
                        <div class="col-sm-8" id="synopsis_view"></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4">สถานะ :</div>
                        <div class="col-sm-8" id="status_view"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Data -->
    <div class="modal fade" id="edit_data" tabindex="-1" data-bs-backdrop="static" aria-labelledby="edit_data" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">แก้ไขภาพยนตร์</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="check_form" action="edit_data.php" method="post">
                        <input id="id" name="id" hidden>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">ชื่อภาพยนตร์</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อภาพยนตร์" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">ภาพโปสเตอร์</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" id="poster" name="poster" placeholder="https://example.com" pattern="https://.*" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">วันที่เข้าฉาย</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="release_date" name="release_date" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">หมวดหมู่</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="category" name="category" placeholder="หมวดหมู่ 1, หมวดหมู่ 2, ..." required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">เรทอายุผู้ชม</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="viewer_rate" name="viewer_rate" placeholder="ตัวย่อเรทอายุผู้ชม" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">ความยาวภาพยนตร์</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="time_range" name="time_range" placeholder="ตัวเลข(นาที)" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">ตัวอย่างภาพยนตร์</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" id="trailer" name="trailer" placeholder="https://www.youtube.com/embed/..." pattern="https://www.youtube.com/embed/.*" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">ชื่อผู้กำกับ</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="director_name" name="director_name" placeholder="ชื่อผู้กำกับ" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">รูปผู้กำกับ</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" id="director_pic" name="director_pic" placeholder="https://example.com" pattern="https://.*" required>
                            </div>
                        </div>

                        <div id="actor_edit"></div>

                        <div class="my-3">
                            <button type="button" class="btn btn-outline-dark btn-sm" onclick="add_actor_edit()">เพิ่มนักแสดง</button>
                            <button type="button" class="btn btn-outline-dark btn-sm" onclick="delete_actor_edit()">ลบนักแสดง</button>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">เรื่องย่อ</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="synopsis" name="synopsis" rows="5" placeholder="เรื่องย่อภาพยนตร์" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">สถานะ</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="status" name="status" required>
                                    <option value="" selected>เลือกสถานะ</option>
                                    <option value="Now showing">Now showing</option>
                                    <option value="Coming soon">Coming soon</option>
                                    <option value="Out">Out</option>
                                </select>
                            </div>
                        </div>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Data -->
    <div class="modal fade" id="delete_data" tabindex="-1" data-bs-backdrop="static" aria-labelledby="delete_data" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">ลบข้อมูลภาพยนตร์</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>ข้อมูลภาพยนตร์จะไม่สามารถกู้คืนได้!</strong><br>ท่านต้องการที่จะลบข้อมูลภาพยนตร์หรือไม่</p>
                </div>
                <div class="modal-footer" id="delete_footer"></div>
            </div>
        </div>
    </div>


</body>

</html>