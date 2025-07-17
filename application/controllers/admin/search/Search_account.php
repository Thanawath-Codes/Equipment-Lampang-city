<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQUIP | Search Account.</title>
    <!--MATERIAL ICONS CDN-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!--GOOGLE FONTS (POPPINS)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!--STYLESHEET-->
    <link rel="stylesheet" href="../../../../assets/css/create_account.css">
    <!--AJAX-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--SCRIPT JQUERY-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
    <nav>
        <div class="container">
            <img src="../../../../assets/images/logo.png" class="logo">
            <div class="profile-area">
                <div class="profile">
                    <div class="profile-photo">
                        <img src="../../../../assets/images/profiled.png">
                    </div>
                    <h5>ADMINISRATOR</h5>
                    <a href="../account/Profile.php">
                        <span class="material-icons-sharp">expand_more</span>
                    </a>
                </div>
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
            </div>
        </div>
    </nav>
    <!-- END OF NAVBAR -->

    <main>
        <aside>
            <button id="close-btn">
                <span class="material-icons-sharp">close</span>
            </button>
            <div class="sidebar">
                <a href="../Dashboard.php" class="active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h4>แผงควบคุม</h4>
                </a>
                <a href="../User_account.php">
                    <span class="material-icons-sharp primary">message</span>
                    <h4>บัญชีผู้ใช้</h4>
                </a>
                <a href="../Equip_computer.php">
                    <span class="material-icons-sharp">payment</span>
                    <h4>เพิ่มครุภัณฑ์</h4>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">help_center</span>
                    <h4>ศูนย์ช่วยเหลือ</h4>
                </a>
                <a href="../account/Profile.php">
                    <span class="material-icons-sharp">settings</span>
                    <h4>ตั้งค่า</h4>
                </a>
            </div>
            <!-- END OF SIDEBAR -->

            <div class="updates">
                <span class="material-icons-sharp">update</span>
                <h4>Updates Available</h4>
                <p>Security Updates</p>
                <p>General Updates</p>
                <a href="#">EQUIP Version 1.8.20</a>
            </div>
        </aside>
        <!------------------- END OF ASIDE ------------------->

        <section class="middle">

            <div class="admin_registration">
                <div class="content">
                    <div class="title">ค้นหาข้อมูลส่วนตัว</div>
                <form id="search_form" action="../../../../system/libraries/Data_account.php" method="get">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">ชื่อ</span>
                                <input type="text" name="first_name" placeholder="กรอกชื่อของผู้ใช้งาน">
                            </div>
                            <div class="input-box">
                                <span class="details">นามสกุล</span>
                                <input type="text" name="last_name" placeholder="กรอกนามสกุลของผู้ใช้งาน">
                            </div>

                            <div class="input-box">
                                <span class="details">อีเมล์</span>
                                <input type="text" name="email_address" placeholder="กรอกที่อยู่อีเมลของผู้ใช้งาน">
                            </div>
                            <div class="input-box">
                                <span class="details">เบอร์โทร</span>
                                <input type="text" name="phone" id="phone" maxlength="12"
                                    placeholder="กรอกหมายเลขโทรศัพท์ของผู้ใช้งาน">
                            </div>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                const phoneInput = document.getElementById('phone');
                                phoneInput.addEventListener('input', function(e) {
                                    let input = e.target.value.replace(/\D/g, ''); // เอาเฉพาะตัวเลข
                                    let formatted = '';

                                    if (input.length <= 3) {
                                        formatted = input;
                                    } else if (input.length <= 6) {
                                        formatted = input.slice(0, 3) + '-' + input.slice(3);
                                    } else {
                                        formatted = input.slice(0, 3) + '-' + input.slice(3, 6) + '-' + input.slice(6, 10);
                                    }

                                    e.target.value = formatted;
                                });
                            });
                        </script>

                        <?php

                        include('../../../../system/database/DB_account.php');

                        $department = "SELECT * FROM departments";
                        $department_qry = mysqli_query($conn, $department);

                        ?>

                        <div class="state-agency">
                            <div class="title">ค้นหาสถานะผู้ใช้</div>
                            <div class="column">
                                <div class="select-box">
                                    <select class="select-box" id="department" name="department">
                                        <option selected disabled>กอง/สำนัก</option>
                                        <?php while ($row = mysqli_fetch_assoc($department_qry)): ?>
                                        <option value="<?php echo $row['id']; ?>">
                                            <?php echo $row['name']; ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="segment" name='segment'>
                                        <option selected disabled>ส่วน</option>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="division" name='division'>
                                        <option selected disabled>ฝ่าย</option>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="working" name='working'>
                                        <option selected disabled>งาน</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="user_role">
                            <div class="title">ค้นหาสิทธิ์ผู้ใช้</div>

                            <?php

                            include('../../../../system/database/DB_account.php');

                            $urole = "SELECT * FROM uroles";
                            $urole_qry = mysqli_query($conn, $urole);

                            ?>

                            <div class="column">
                                <div class="select-box">
                                    <select class="select-box" id="urole" name="urole">
                                        <option selected disabled>เลือกสิทธิ์ผู้ใช้</option>
                                        <?php while ($row = mysqli_fetch_assoc($urole_qry)): ?>
                                        <option value="<?php echo $row['id']; ?>">
                                            <?php echo $row['name']; ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="title">ค้นหาบัญชี</div>
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">ชื่อผู้ใช้</span>
                                <input type="text" name="username" placeholder="กรอกชื่อผู้ใช้งาน" maxlength="22">
                            </div>
                            <div class="input-box">
                                <span class="details">รหัสผ่าน</span>
                                <input type="password" name="password_hash" placeholder="กรอกรหัสผ่านของผู้ใช้งาน" maxlength="12">
                            </div>
                        </div>

                        <div class="notification_message">
                            <p>
                                <span class="material-icons-sharp">error</span>
                                รหัสผ่านควรมีความยาว 5-12 ตัวอักษรขึ้นไปเท่านั้น.
                            </p>
                        </div>
                        <div class="notification_message">
                            <p>
                                <span class="material-icons-sharp">error</span>
                                อนุญาติให้ใช้เฉพาะตัวอักษร (a-z) หรือ (A-Z) ตัวเลข(0-9) และเครื่องหมายสัญประกาศ (_)
                                เท่านั้น.
                            </p>
                        </div>

                        <div class="wrapper">
                            <div class="btns">
                                <div class="update_page">
                                    <div class="btn_update">
                                        <button type="submit" name="submit">ค้นหาข้อมูล</button>
                                    </div>
                                </div>
                                <div class="back_page">
                                    <div class="btn_back">
                                        <a href="../User_account.php">ย้อนกลับ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <script>
                        $(document).ready(function () {
                        $('#search-form').on('submit', function (e) {
                            e.preventDefault();

                            $.ajax({
                                url: '../../../system/libraries/Data_account.php',  // หน้าแสดงผล
                                type: 'GET',
                                data: $(this).serialize(),  // ส่งข้อมูลจากฟอร์ม
                                dataType: 'html',  // รับข้อมูลเป็น HTML
                                success: function (data) {
                                    $('#result').html(data);  // แสดงผลลัพธ์ใน div#result
                                },
                                error: function (xhr, status, error) {
                                    console.error('เกิดข้อผิดพลาด: ', error);
                                    $('#result').html('<p style="color:red;">เกิดข้อผิดพลาดในการค้นหา</p>');
                                }
                            });
                        });
                    });

                    </script>
                </div>
            </div>
            <!-- END OF EQUIPMENT MICRO COMPUTER -->

        </section>
        <!-- END OF MIDDLE -->

        <section class="right">
            <div class="investments">
                <div class="header">
                    <h2>สิทธิ์ผู้ใช้</h2>
                    <a href="../User_account.php">เพิ่มเติม<span class="material-icons-sharp">
                            chevron_right
                        </span></a>
                </div>

                <div class="investment">
                    <img src="../../../../assets/images/profiled.png">
                    <h4>ADMIN</h4>
                    <div class="date-time">
                        <p>
                            <?php
                            include('../../../../system/database/DB_account.php');

                            // สร้าง query
                            $sql = "
                          SELECT 
                              uroles.name,
                              MAX(user.created_at) AS latest_date
                          FROM 
                              user
                          JOIN 
                              uroles ON user.urole = uroles.id
                          WHERE 
                              uroles.name = 'ADMIN'
                          GROUP BY 
                              uroles.name
                      ";

                            // ดำเนินการ query
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                // ดึงข้อมูล
                                $row = mysqli_fetch_assoc($result);
                                if ($row) {
                                    $latest_date = $row['latest_date'];

                                    // แปลงวันที่ให้เป็นรูปแบบ 7 Nov, 2021
                                    $final_date = date('j M, Y', strtotime($latest_date));

                                    // แสดงผลใน <> tag
                                    echo "$final_date";
                                } else {
                                    echo "ไม่พบข้อมูล.";
                                }
                            } else {
                                echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                            }
                            ?>

                        </p>
                        <small class="text-muted">
                            <?php
                            include('../../../../system/database/DB_account.php');

                            // สร้าง query
                            $sql = "
                        SELECT 
                              uroles.name,
                              MAX(user.created_at) AS latest_date
                          FROM 
                              user
                          JOIN 
                              uroles ON user.urole = uroles.id
                          WHERE 
                              uroles.name = 'ADMIN'
                          GROUP BY 
                              uroles.name
                    ";

                            // ดำเนินการ query
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                // ดึงข้อมูล
                                $row = mysqli_fetch_assoc($result);
                                if ($row) {
                                    $latest_date = $row['latest_date'];

                                    // แปลงเวลาให้เป็นรูปแบบ 9:14pm
                                    $final_date = date('g:ia', strtotime($latest_date));

                                    // แสดงผลเฉพาะเวลา
                                    echo "$final_date";
                                } else {
                                    echo "ไม่พบข้อมูล.";
                                }
                            } else {
                                echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                            }
                            ?>
                        </small>
                    </div>
                    <div class="bonds">
                        <?php

                        include('../../../../system/database/DB_account.php');

                        // SQL Query
                        $sql = "
                            SELECT d.sortname 
                            FROM user u
                            JOIN departments d ON u.department = d.id
                            JOIN uroles r ON u.urole = r.id
                            WHERE r.name = 'ADMIN'
                            ORDER BY u.created_at DESC
                            LIMIT 1;
                        ";
                        if ($conn) { // Check if connection is valid
                            $result = mysqli_query($conn, $sql);

                            if ($result && mysqli_num_rows($result) > 0) { // Check if data is found
                                $row_data = mysqli_fetch_assoc($result);
                                echo "<p>" . $row_data['sortname'] . "</p>"; // Output inside <p> tag
                            } else {
                                echo "No data found.";
                            }

                            // Close connection
                            mysqli_close($conn);
                        } else {
                            echo "Database connection failed.";
                        }
                        ?>



                        <small class="text-muted">Agency</small>
                    </div>

                    <div class="amount">

                        <?php
                        include('../../../../system/database/DB_account.php');

                        $sql = "
                        SELECT COUNT(*) AS total
                        FROM user u
                        JOIN uroles ur ON u.urole = ur.id
                        WHERE ur.name = 'ADMIN'
                        ";
                        $result = $conn->query($sql);

                        if ($result === false) {
                            // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
                            echo "Error: " . $conn->error;
                            $total_count = 0;
                        } else {
                            // ตรวจสอบผลลัพธ์
                            if ($result->num_rows > 0) {
                                // ดึงข้อมูลออกมา
                                $row = $result->fetch_assoc();
                                $total_count = $row['total'];
                            } else {
                                $total_count = 0;
                            }
                        }

                        $conn->close();
                        ?>
                        <h4>₵<?php echo $total_count; ?></h4>

                        <?php
                        include('../../../../system/database/DB_account.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล PERSONNEL
                        $sql_date = "
                  SELECT DATE(MAX(u.created_at)) AS latest_date
                  FROM user u
                  JOIN uroles ur ON u.urole = ur.id
                  WHERE ur.name = 'ADMIN'
              ";
                        $result_date = $conn->query($sql_date);

                        if ($result_date === false) {
                            die("Error (Latest Date Query): " . $conn->error);
                        } else {
                            $row_date = $result_date->fetch_assoc();
                            $latest_date = $row_date['latest_date']; // รูปแบบเป็น YYYY-MM-DD
                        }

                        if ($latest_date) {
                            // นับจำนวนข้อมูล WINDOWS 10 ในวันที่ล่าสุดของเฉพาะ WINDOWS 10
                            $sql_count = "
                    SELECT COUNT(*) AS total
                    FROM user u
                    JOIN uroles ur ON u.urole = ur.id
                    WHERE ur.name = 'ADMIN' AND DATE(u.created_at) = '$latest_date'
                ";
                            $result_count = $conn->query($sql_count);

                            if ($result_count === false) {
                                die("Error (Count Query): " . $conn->error);
                            } else {
                                $row_count = $result_count->fetch_assoc();
                                $total_count = $row_count['total'];
                            }
                        } else {
                            $total_count = 0;
                        }

                        $conn->close();
                        ?>
                        <small class="danger">
                            +<?php echo $total_count; ?> Mc
                        </small>
                    </div>

                </div>
                <!-- END OF INVESTMENT -->
                <div class="investment">
                    <img src="../../../../assets/images/profiling.png">
                    <h4>PERSONNEL</h4>
                    <div class="date-time">
                        <p>
                            <?php
                            include('../../../../system/database/DB_account.php');

                            // สร้าง query
                            $sql = "
                          SELECT 
                              uroles.name,
                              MAX(user.created_at) AS latest_date
                          FROM 
                              user
                          JOIN 
                              uroles ON user.urole = uroles.id
                          WHERE 
                              uroles.name = 'PERSONNEL'
                          GROUP BY 
                              uroles.name
                      ";

                            // ดำเนินการ query
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                // ดึงข้อมูล
                                $row = mysqli_fetch_assoc($result);
                                if ($row) {
                                    $latest_date = $row['latest_date'];

                                    // แปลงวันที่ให้เป็นรูปแบบ 7 Nov, 2021
                                    $final_date = date('j M, Y', strtotime($latest_date));

                                    // แสดงผลใน <> tag
                                    echo "$final_date";
                                } else {
                                    echo "ไม่พบข้อมูล.";
                                }
                            } else {
                                echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                            }
                            ?>

                        </p>
                        <small class="text-muted">
                            <?php
                            include('../../../../system/database/DB_account.php');

                            // สร้าง query
                            $sql = "
                        SELECT 
                              uroles.name,
                              MAX(user.created_at) AS latest_date
                          FROM 
                              user
                          JOIN 
                              uroles ON user.urole = uroles.id
                          WHERE 
                              uroles.name = 'PERSONNEL'
                          GROUP BY 
                              uroles.name
                    ";

                            // ดำเนินการ query
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                // ดึงข้อมูล
                                $row = mysqli_fetch_assoc($result);
                                if ($row) {
                                    $latest_date = $row['latest_date'];

                                    // แปลงเวลาให้เป็นรูปแบบ 9:14pm
                                    $final_date = date('g:ia', strtotime($latest_date));

                                    // แสดงผลเฉพาะเวลา
                                    echo "$final_date";
                                } else {
                                    echo "ไม่พบข้อมูล.";
                                }
                            } else {
                                echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                            }
                            ?>
                        </small>
                    </div>
                    <div class="bonds">
                        <?php

                        include('../../../../system/database/DB_account.php');

                        // SQL Query
                        $sql = "
                            SELECT d.sortname 
                            FROM user u
                            JOIN departments d ON u.department = d.id
                            JOIN uroles r ON u.urole = r.id
                            WHERE r.name = 'PERSONNEL'
                            ORDER BY u.created_at DESC
                            LIMIT 1;
                        ";
                        if ($conn) { // Check if connection is valid
                            $result = mysqli_query($conn, $sql);

                            if ($result && mysqli_num_rows($result) > 0) { // Check if data is found
                                $row_data = mysqli_fetch_assoc($result);
                                echo "<p>" . $row_data['sortname'] . "</p>"; // Output inside <p> tag
                            } else {
                                echo "No data found.";
                            }

                            // Close connection
                            mysqli_close($conn);
                        } else {
                            echo "Database connection failed.";
                        }
                        ?>



                        <small class="text-muted">Agency</small>
                    </div>
                    <div class="amount">
                        <?php
                        include('../../../../system/database/DB_account.php');

                        $sql = "
                        SELECT COUNT(*) AS total
                        FROM user u
                        JOIN uroles ur ON u.urole = ur.id
                        WHERE ur.name = 'PERSONNEL'
                        ";
                        $result = $conn->query($sql);

                        if ($result === false) {
                            // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
                            echo "Error: " . $conn->error;
                            $total_count = 0;
                        } else {
                            // ตรวจสอบผลลัพธ์
                            if ($result->num_rows > 0) {
                                // ดึงข้อมูลออกมา
                                $row = $result->fetch_assoc();
                                $total_count = $row['total'];
                            } else {
                                $total_count = 0;
                            }
                        }

                        $conn->close();
                        ?>
                        <h4>₵<?php echo $total_count; ?></h4>

                        <?php
                        include('../../../../system/database/DB_account.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล PERSONNEL
                        $sql_date = "
                  SELECT DATE(MAX(u.created_at)) AS latest_date
                  FROM user u
                  JOIN uroles ur ON u.urole = ur.id
                  WHERE ur.name = 'PERSONNEL'
              ";
                        $result_date = $conn->query($sql_date);

                        if ($result_date === false) {
                            die("Error (Latest Date Query): " . $conn->error);
                        } else {
                            $row_date = $result_date->fetch_assoc();
                            $latest_date = $row_date['latest_date']; // รูปแบบเป็น YYYY-MM-DD
                        }

                        if ($latest_date) {
                            // นับจำนวนข้อมูล WINDOWS 10 ในวันที่ล่าสุดของเฉพาะ WINDOWS 10
                            $sql_count = "
                    SELECT COUNT(*) AS total
                    FROM user u
                    JOIN uroles ur ON u.urole = ur.id
                    WHERE ur.name = 'PERSONNEL' AND DATE(u.created_at) = '$latest_date'
                ";
                            $result_count = $conn->query($sql_count);

                            if ($result_count === false) {
                                die("Error (Count Query): " . $conn->error);
                            } else {
                                $row_count = $result_count->fetch_assoc();
                                $total_count = $row_count['total'];
                            }
                        } else {
                            $total_count = 0;
                        }

                        $conn->close();
                        ?>
                        <small class="success">
                            +<?php echo $total_count; ?> Mc
                        </small>
                    </div>
                </div>
                <!-------------- END OF INVESTMENT -------------->
            </div>
            <!-------------------- END OF INVESTMENTS -------------------->

            <div class="recent-transactions">
                <div class="header">
                    <h2>หน่วยงานภายใน</h2>
                    <a href="../Dashboard.php">เพิ่มเติม<span class="material-icons-sharp">
                            chevron_right
                        </span></a>
                </div>

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-purple-light">
                            <span class="material-icons-sharp purple">
                                laptop_chromebook
                            </span>
                        </div>
                        <div class="details">
                            <h4>Municipal</h4>  
                            <p>
                            <?php
                                include('../../../../system/database/DB_account.php');

                                // สร้าง query
                                $sql = "
                                SELECT 
                                    departments.name,
                                    MAX(user.created_at) AS latest_date
                                FROM 
                                    user
                                JOIN 
                                    departments ON user.department = departments.id
                                WHERE 
                                    departments.name = 'สำนักปลัดเทศบาล'
                                GROUP BY 
                                    departments.name
                                ";

                                // ดำเนินการ query
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // ดึงข้อมูล
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        $latest_date = $row['latest_date'];

                                        // แปลงวันที่ให้เป็นรูปแบบ 31.10.2567
                                        $day = date('d', strtotime($latest_date)); // วันที่
                                        $month = date('m', strtotime($latest_date)); // เดือน
                                        $year = date('Y', strtotime($latest_date)) + 543; // ปี (เพิ่ม 543)

                                        $final_date = "$day.$month.$year";

                                        // แสดงผลใน <> tag
                                        echo $final_date;
                                    } else {
                                        echo "ไม่พบข้อมูล.";
                                    }
                                } else {
                                    echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="../../../../assets/images/visa.png">
                        </div>
                        <div class="details">
                        <?php
                        include('../../../../system/database/DB_account.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล
                        $sql_date = "
                  SELECT DATE(MAX(u.created_at)) AS latest_date
                  FROM user u
                  JOIN departments d ON u.department = d.id
                  WHERE d.name = 'สำนักปลัดเทศบาล'
              ";
                        $result_date = $conn->query($sql_date);

                        if ($result_date === false) {
                            die("Error (Latest Date Query): " . $conn->error);
                        } else {
                            $row_date = $result_date->fetch_assoc();
                            $latest_date = $row_date['latest_date']; // รูปแบบเป็น YYYY-MM-DD
                        }

                        if ($latest_date) {
                            // นับจำนวนข้อมูล WINDOWS 10 ในวันที่ล่าสุดของเฉพาะ WINDOWS 10
                            $sql_count = "
                    SELECT COUNT(*) AS total
                    FROM user u
                    JOIN departments d ON u.department = d.id
                    WHERE d.name = 'สำนักปลัดเทศบาล' AND DATE(u.created_at) = '$latest_date'
                ";
                            $result_count = $conn->query($sql_count);

                            if ($result_count === false) {
                                die("Error (Count Query): " . $conn->error);
                            } else {
                                $row_count = $result_count->fetch_assoc();
                                $total_count = $row_count['total'];
                            }
                        } else {
                            $total_count = 0;
                        }

                        $conn->close();
                        ?>
                        <p>
                            <?php echo $total_count; ?> User
                        </p>

                        <small class="text-muted">
                                <?php
                                include('../../../../system/database/DB_account.php');

                                // สร้าง query
                                $sql = "
                            SELECT 
                                departments.name,
                                MAX(user.created_at) AS latest_date
                            FROM 
                                user
                            JOIN 
                                departments ON user.department = departments.id
                            WHERE 
                                departments.name = 'สำนักปลัดเทศบาล'
                            GROUP BY 
                                departments.name
                        ";

                                // ดำเนินการ query
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // ดึงข้อมูล
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        $latest_date = $row['latest_date'];

                                        // แปลงเวลาให้เป็นรูปแบบ 9:14pm
                                        $final_date = date('g:ia', strtotime($latest_date));

                                        // แสดงผลเฉพาะเวลา
                                        echo "$final_date";
                                    } else {
                                        echo "ไม่พบข้อมูล.";
                                    }
                                } else {
                                    echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                                }
                                ?>
                            </small>
                        </div>
                    </div>

                    <?php
                        include('../../../../system/database/DB_account.php');

                                        $sql = "
                            SELECT COUNT(*) AS total
                            FROM user u
                            JOIN departments d ON u.department = d.id
                            WHERE d.name = 'สำนักปลัดเทศบาล'
                            ";
                        $result = $conn->query($sql);

                        if ($result === false) {
                            // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
                            echo "Error: " . $conn->error;
                            $total_count = 0;
                        } else {
                            // ตรวจสอบผลลัพธ์
                            if ($result->num_rows > 0) {
                                // ดึงข้อมูลออกมา
                                $row = $result->fetch_assoc();
                                $total_count = $row['total'];
                            } else {
                                $total_count = 0;
                            }
                        }

                        $conn->close();
                        ?>
                        <h4><?php echo $total_count; ?></h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-purple-light">
                            <span class="material-icons-sharp purple">
                                screenshot_monitor
                            </span>
                        </div>
                        <div class="details">
                            <h4>Education</h4>
                            <p>
                            <?php
                                include('../../../../system/database/DB_account.php');

                                // สร้าง query
                                $sql = "
                                SELECT 
                                    departments.name,
                                    MAX(user.created_at) AS latest_date
                                FROM 
                                    user
                                JOIN 
                                    departments ON user.department = departments.id
                                WHERE 
                                    departments.name = 'สำนักการศึกษา'
                                GROUP BY 
                                    departments.name
                                ";

                                // ดำเนินการ query
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // ดึงข้อมูล
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        $latest_date = $row['latest_date'];

                                        // แปลงวันที่ให้เป็นรูปแบบ 31.10.2567
                                        $day = date('d', strtotime($latest_date)); // วันที่
                                        $month = date('m', strtotime($latest_date)); // เดือน
                                        $year = date('Y', strtotime($latest_date)) + 543; // ปี (เพิ่ม 543)

                                        $final_date = "$day.$month.$year";

                                        // แสดงผลใน <> tag
                                        echo $final_date;
                                    } else {
                                        echo "ไม่พบข้อมูล.";
                                    }
                                } else {
                                    echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-primary">
                            <img src="../../../../assets/images/visa.png">
                        </div>
                        <div class="details">

                        <?php
                        include('../../../../system/database/DB_account.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล
                        $sql_date = "
                  SELECT DATE(MAX(u.created_at)) AS latest_date
                  FROM user u
                  JOIN departments d ON u.department = d.id
                  WHERE d.name = 'สำนักการศึกษา'
              ";
                        $result_date = $conn->query($sql_date);

                        if ($result_date === false) {
                            die("Error (Latest Date Query): " . $conn->error);
                        } else {
                            $row_date = $result_date->fetch_assoc();
                            $latest_date = $row_date['latest_date']; // รูปแบบเป็น YYYY-MM-DD
                        }

                        if ($latest_date) {
                            // นับจำนวนข้อมูล WINDOWS 10 ในวันที่ล่าสุดของเฉพาะ WINDOWS 10
                            $sql_count = "
                    SELECT COUNT(*) AS total
                    FROM user u
                    JOIN departments d ON u.department = d.id
                    WHERE d.name = 'สำนักการศึกษา' AND DATE(u.created_at) = '$latest_date'
                ";
                            $result_count = $conn->query($sql_count);

                            if ($result_count === false) {
                                die("Error (Count Query): " . $conn->error);
                            } else {
                                $row_count = $result_count->fetch_assoc();
                                $total_count = $row_count['total'];
                            }
                        } else {
                            $total_count = 0;
                        }

                        $conn->close();
                        ?>
                        <p>
                            <?php echo $total_count; ?> User
                        </p>


                        <small class="text-muted">
                                <?php
                                include('../../../../system/database/DB_account.php');

                                // สร้าง query
                                $sql = "
                            SELECT 
                                departments.name,
                                MAX(user.created_at) AS latest_date
                            FROM 
                                user
                            JOIN 
                                departments ON user.department = departments.id
                            WHERE 
                                departments.name = 'สำนักการศึกษา'
                            GROUP BY 
                                departments.name
                        ";

                                // ดำเนินการ query
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // ดึงข้อมูล
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        $latest_date = $row['latest_date'];

                                        // แปลงเวลาให้เป็นรูปแบบ 9:14pm
                                        $final_date = date('g:ia', strtotime($latest_date));

                                        // แสดงผลเฉพาะเวลา
                                        echo "$final_date";
                                    } else {
                                        echo "ไม่พบข้อมูล.";
                                    }
                                } else {
                                    echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                                }
                                ?>
                            </small>
                        </div>
                    </div>

                    <?php
                        include('../../../../system/database/DB_account.php');

                                        $sql = "
                            SELECT COUNT(*) AS total
                            FROM user u
                            JOIN departments d ON u.department = d.id
                            WHERE d.name = 'สำนักการศึกษา'
                            ";
                        $result = $conn->query($sql);

                        if ($result === false) {
                            // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
                            echo "Error: " . $conn->error;
                            $total_count = 0;
                        } else {
                            // ตรวจสอบผลลัพธ์
                            if ($result->num_rows > 0) {
                                // ดึงข้อมูลออกมา
                                $row = $result->fetch_assoc();
                                $total_count = $row['total'];
                            } else {
                                $total_count = 0;
                            }
                        }

                        $conn->close();
                        ?>
                        <h4><?php echo $total_count; ?></h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-success-light">
                            <span class="material-icons-sharp success">
                                tablet_mac
                            </span>
                        </div>
                        <div class="details">
                            <h4>Finance</h4>
                            <p>
                            <?php
                                include('../../../../system/database/DB_account.php');

                                // สร้าง query
                                $sql = "
                                SELECT 
                                    departments.name,
                                    MAX(user.created_at) AS latest_date
                                FROM 
                                    user
                                JOIN 
                                    departments ON user.department = departments.id
                                WHERE 
                                    departments.name = 'กองคลัง'
                                GROUP BY 
                                    departments.name
                                ";

                                // ดำเนินการ query
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // ดึงข้อมูล
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        $latest_date = $row['latest_date'];

                                        // แปลงวันที่ให้เป็นรูปแบบ 31.10.2567
                                        $day = date('d', strtotime($latest_date)); // วันที่
                                        $month = date('m', strtotime($latest_date)); // เดือน
                                        $year = date('Y', strtotime($latest_date)) + 543; // ปี (เพิ่ม 543)

                                        $final_date = "$day.$month.$year";

                                        // แสดงผลใน <> tag
                                        echo $final_date;
                                    } else {
                                        echo "ไม่พบข้อมูล.";
                                    }
                                } else {
                                    echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                                }
                                ?>

                            </p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-dark">
                            <img src="../../../../assets/images/master_card.png">
                        </div>
                        <div class="details">

                           <?php
                        include('../../../../system/database/DB_account.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล
                        $sql_date = "
                  SELECT DATE(MAX(u.created_at)) AS latest_date
                  FROM user u
                  JOIN departments d ON u.department = d.id
                  WHERE d.name = 'กองคลัง'
              ";
                        $result_date = $conn->query($sql_date);

                        if ($result_date === false) {
                            die("Error (Latest Date Query): " . $conn->error);
                        } else {
                            $row_date = $result_date->fetch_assoc();
                            $latest_date = $row_date['latest_date']; // รูปแบบเป็น YYYY-MM-DD
                        }

                        if ($latest_date) {
                            // นับจำนวนข้อมูล WINDOWS 10 ในวันที่ล่าสุดของเฉพาะ WINDOWS 10
                            $sql_count = "
                    SELECT COUNT(*) AS total
                    FROM user u
                    JOIN departments d ON u.department = d.id
                    WHERE d.name = 'กองคลัง' AND DATE(u.created_at) = '$latest_date'
                ";
                            $result_count = $conn->query($sql_count);

                            if ($result_count === false) {
                                die("Error (Count Query): " . $conn->error);
                            } else {
                                $row_count = $result_count->fetch_assoc();
                                $total_count = $row_count['total'];
                            }
                        } else {
                            $total_count = 0;
                        }

                        $conn->close();
                        ?>
                        <p>
                            <?php echo $total_count; ?> User
                        </p>


                        <small class="text-muted">
                                <?php
                                include('../../../../system/database/DB_account.php');

                                // สร้าง query
                                $sql = "
                            SELECT 
                                departments.name,
                                MAX(user.created_at) AS latest_date
                            FROM 
                                user
                            JOIN 
                                departments ON user.department = departments.id
                            WHERE 
                                departments.name = 'กองคลัง'
                            GROUP BY 
                                departments.name
                        ";

                                // ดำเนินการ query
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // ดึงข้อมูล
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        $latest_date = $row['latest_date'];

                                        // แปลงเวลาให้เป็นรูปแบบ 9:14pm
                                        $final_date = date('g:ia', strtotime($latest_date));

                                        // แสดงผลเฉพาะเวลา
                                        echo "$final_date";
                                    } else {
                                        echo "ไม่พบข้อมูล.";
                                    }
                                } else {
                                    echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                                }
                                ?>
                            </small>
                        </div>
                    </div>

                    <?php
                        include('../../../../system/database/DB_account.php');

                                        $sql = "
                            SELECT COUNT(*) AS total
                            FROM user u
                            JOIN departments d ON u.department = d.id
                            WHERE d.name = 'กองคลัง'
                            ";
                        $result = $conn->query($sql);

                        if ($result === false) {
                            // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
                            echo "Error: " . $conn->error;
                            $total_count = 0;
                        } else {
                            // ตรวจสอบผลลัพธ์
                            if ($result->num_rows > 0) {
                                // ดึงข้อมูลออกมา
                                $row = $result->fetch_assoc();
                                $total_count = $row['total'];
                            } else {
                                $total_count = 0;
                            }
                        }

                        $conn->close();
                        ?>
                        <h4><?php echo $total_count; ?></h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-danger-light">
                            <span class="material-icons-sharp danger">
                                print
                            </span>
                        </div>
                        <div class="details">
                            <h4>Engineer</h4>

                            <p>
                            <?php
                                include('../../../../system/database/DB_account.php');

                                // สร้าง query
                                $sql = "
                                SELECT 
                                    departments.name,
                                    MAX(user.created_at) AS latest_date
                                FROM 
                                    user
                                JOIN 
                                    departments ON user.department = departments.id
                                WHERE 
                                    departments.name = 'สำนักช่าง'
                                GROUP BY 
                                    departments.name
                                ";

                                // ดำเนินการ query
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // ดึงข้อมูล
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        $latest_date = $row['latest_date'];

                                        // แปลงวันที่ให้เป็นรูปแบบ 31.10.2567
                                        $day = date('d', strtotime($latest_date)); // วันที่
                                        $month = date('m', strtotime($latest_date)); // เดือน
                                        $year = date('Y', strtotime($latest_date)) + 543; // ปี (เพิ่ม 543)

                                        $final_date = "$day.$month.$year";

                                        // แสดงผลใน <> tag
                                        echo $final_date;
                                    } else {
                                        echo "ไม่พบข้อมูล.";
                                    }
                                } else {
                                    echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="../../../../assets/images/visa.png">
                        </div>
                        <div class="details">
                        <?php
                        include('../../../../system/database/DB_account.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล
                        $sql_date = "
                  SELECT DATE(MAX(u.created_at)) AS latest_date
                  FROM user u
                  JOIN departments d ON u.department = d.id
                  WHERE d.name = 'สำนักช่าง'
              ";
                        $result_date = $conn->query($sql_date);

                        if ($result_date === false) {
                            die("Error (Latest Date Query): " . $conn->error);
                        } else {
                            $row_date = $result_date->fetch_assoc();
                            $latest_date = $row_date['latest_date']; // รูปแบบเป็น YYYY-MM-DD
                        }

                        if ($latest_date) {
                            // นับจำนวนข้อมูล WINDOWS 10 ในวันที่ล่าสุดของเฉพาะ WINDOWS 10
                            $sql_count = "
                    SELECT COUNT(*) AS total
                    FROM user u
                    JOIN departments d ON u.department = d.id
                    WHERE d.name = 'สำนักช่าง' AND DATE(u.created_at) = '$latest_date'
                ";
                            $result_count = $conn->query($sql_count);

                            if ($result_count === false) {
                                die("Error (Count Query): " . $conn->error);
                            } else {
                                $row_count = $result_count->fetch_assoc();
                                $total_count = $row_count['total'];
                            }
                        } else {
                            $total_count = 0;
                        }

                        $conn->close();
                        ?>
                        <p>
                            <?php echo $total_count; ?> User
                        </p>


                        <small class="text-muted">
                                <?php
                                include('../../../../system/database/DB_account.php');

                                // สร้าง query
                                $sql = "
                            SELECT 
                                departments.name,
                                MAX(user.created_at) AS latest_date
                            FROM 
                                user
                            JOIN 
                                departments ON user.department = departments.id
                            WHERE 
                                departments.name = 'สำนักช่าง'
                            GROUP BY 
                                departments.name
                        ";

                                // ดำเนินการ query
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // ดึงข้อมูล
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        $latest_date = $row['latest_date'];

                                        // แปลงเวลาให้เป็นรูปแบบ 9:14pm
                                        $final_date = date('g:ia', strtotime($latest_date));

                                        // แสดงผลเฉพาะเวลา
                                        echo "$final_date";
                                    } else {
                                        echo "ไม่พบข้อมูล.";
                                    }
                                } else {
                                    echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                                }
                                ?>
                            </small>
                        </div>
                    </div>

                    <?php
                        include('../../../../system/database/DB_account.php');

                                        $sql = "
                            SELECT COUNT(*) AS total
                            FROM user u
                            JOIN departments d ON u.department = d.id
                            WHERE d.name = 'สำนักช่าง'
                            ";
                        $result = $conn->query($sql);

                        if ($result === false) {
                            // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
                            echo "Error: " . $conn->error;
                            $total_count = 0;
                        } else {
                            // ตรวจสอบผลลัพธ์
                            if ($result->num_rows > 0) {
                                // ดึงข้อมูลออกมา
                                $row = $result->fetch_assoc();
                                $total_count = $row['total'];
                            } else {
                                $total_count = 0;
                            }
                        }

                        $conn->close();
                        ?>
                        <h4><?php echo $total_count; ?></h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-danger-light">
                            <span class="material-icons-sharp danger">
                                document_scanner
                            </span>
                        </div>
                        <div class="details">
                            <h4>Health</h4>

                            <p>
                            <?php
                                include('../../../../system/database/DB_account.php');

                                // สร้าง query
                                $sql = "
                                SELECT 
                                    departments.name,
                                    MAX(user.created_at) AS latest_date
                                FROM 
                                    user
                                JOIN 
                                    departments ON user.department = departments.id
                                WHERE 
                                    departments.name = 'กองสาธารณสุขและสิ่งแวดล้อม'
                                GROUP BY 
                                    departments.name
                                ";

                                // ดำเนินการ query
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // ดึงข้อมูล
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        $latest_date = $row['latest_date'];

                                        // แปลงวันที่ให้เป็นรูปแบบ 31.10.2567
                                        $day = date('d', strtotime($latest_date)); // วันที่
                                        $month = date('m', strtotime($latest_date)); // เดือน
                                        $year = date('Y', strtotime($latest_date)) + 543; // ปี (เพิ่ม 543)

                                        $final_date = "$day.$month.$year";

                                        // แสดงผลใน <> tag
                                        echo $final_date;
                                    } else {
                                        echo "ไม่พบข้อมูล.";
                                    }
                                } else {
                                    echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-primary">
                            <img src="../../../../assets/images/visa.png">
                        </div>
                        <div class="details">

                        <?php
                        include('../../../../system/database/DB_account.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล
                        $sql_date = "
                  SELECT DATE(MAX(u.created_at)) AS latest_date
                  FROM user u
                  JOIN departments d ON u.department = d.id
                  WHERE d.name = 'กองสาธารณสุขและสิ่งแวดล้อม'
              ";
                        $result_date = $conn->query($sql_date);

                        if ($result_date === false) {
                            die("Error (Latest Date Query): " . $conn->error);
                        } else {
                            $row_date = $result_date->fetch_assoc();
                            $latest_date = $row_date['latest_date']; // รูปแบบเป็น YYYY-MM-DD
                        }

                        if ($latest_date) {
                            // นับจำนวนข้อมูล WINDOWS 10 ในวันที่ล่าสุดของเฉพาะ WINDOWS 10
                            $sql_count = "
                    SELECT COUNT(*) AS total
                    FROM user u
                    JOIN departments d ON u.department = d.id
                    WHERE d.name = 'กองสาธารณสุขและสิ่งแวดล้อม' AND DATE(u.created_at) = '$latest_date'
                ";
                            $result_count = $conn->query($sql_count);

                            if ($result_count === false) {
                                die("Error (Count Query): " . $conn->error);
                            } else {
                                $row_count = $result_count->fetch_assoc();
                                $total_count = $row_count['total'];
                            }
                        } else {
                            $total_count = 0;
                        }

                        $conn->close();
                        ?>
                        <p>
                            <?php echo $total_count; ?> User
                        </p>

                        <small class="text-muted">
                                <?php
                                include('../../../../system/database/DB_account.php');

                                // สร้าง query
                                $sql = "
                            SELECT 
                                departments.name,
                                MAX(user.created_at) AS latest_date
                            FROM 
                                user
                            JOIN 
                                departments ON user.department = departments.id
                            WHERE 
                                departments.name = 'กองสาธารณสุขและสิ่งแวดล้อม'
                            GROUP BY 
                                departments.name
                        ";

                                // ดำเนินการ query
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // ดึงข้อมูล
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        $latest_date = $row['latest_date'];

                                        // แปลงเวลาให้เป็นรูปแบบ 9:14pm
                                        $final_date = date('g:ia', strtotime($latest_date));

                                        // แสดงผลเฉพาะเวลา
                                        echo "$final_date";
                                    } else {
                                        echo "ไม่พบข้อมูล.";
                                    }
                                } else {
                                    echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                                }
                                ?>
                            </small>
                        </div>
                    </div>

                    <?php
                        include('../../../../system/database/DB_account.php');

                                        $sql = "
                            SELECT COUNT(*) AS total
                            FROM user u
                            JOIN departments d ON u.department = d.id
                            WHERE d.name = 'กองสาธารณสุขและสิ่งแวดล้อม'
                            ";
                        $result = $conn->query($sql);

                        if ($result === false) {
                            // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
                            echo "Error: " . $conn->error;
                            $total_count = 0;
                        } else {
                            // ตรวจสอบผลลัพธ์
                            if ($result->num_rows > 0) {
                                // ดึงข้อมูลออกมา
                                $row = $result->fetch_assoc();
                                $total_count = $row['total'];
                            } else {
                                $total_count = 0;
                            }
                        }

                        $conn->close();
                        ?>
                        <h4><?php echo $total_count; ?></h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-success-light">
                            <span class="material-icons-sharp success">
                                charging_station
                            </span>
                        </div>
                        <div class="details">
                            <h4>Strategy</h4>

                            <p>
                            <?php
                                include('../../../../system/database/DB_account.php');

                                // สร้าง query
                                $sql = "
                                SELECT 
                                    departments.name,
                                    MAX(user.created_at) AS latest_date
                                FROM 
                                    user
                                JOIN 
                                    departments ON user.department = departments.id
                                WHERE 
                                    departments.name = 'กองยุทธศาสตร์และงบประมาณ'
                                GROUP BY 
                                    departments.name
                                ";

                                // ดำเนินการ query
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // ดึงข้อมูล
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        $latest_date = $row['latest_date'];

                                        // แปลงวันที่ให้เป็นรูปแบบ 31.10.2567
                                        $day = date('d', strtotime($latest_date)); // วันที่
                                        $month = date('m', strtotime($latest_date)); // เดือน
                                        $year = date('Y', strtotime($latest_date)) + 543; // ปี (เพิ่ม 543)

                                        $final_date = "$day.$month.$year";

                                        // แสดงผลใน <> tag
                                        echo $final_date;
                                    } else {
                                        echo "ไม่พบข้อมูล.";
                                    }
                                } else {
                                    echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-dark">
                            <img src="../../../../assets/images/master_card.png">
                        </div>
                        <div class="details">
                            
                        <?php
                        include('../../../../system/database/DB_account.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล
                        $sql_date = "
                  SELECT DATE(MAX(u.created_at)) AS latest_date
                  FROM user u
                  JOIN departments d ON u.department = d.id
                  WHERE d.name = 'กองยุทธศาสตร์และงบประมาณ'
              ";
                        $result_date = $conn->query($sql_date);

                        if ($result_date === false) {
                            die("Error (Latest Date Query): " . $conn->error);
                        } else {
                            $row_date = $result_date->fetch_assoc();
                            $latest_date = $row_date['latest_date']; // รูปแบบเป็น YYYY-MM-DD
                        }

                        if ($latest_date) {
                            // นับจำนวนข้อมูล WINDOWS 10 ในวันที่ล่าสุดของเฉพาะ WINDOWS 10
                            $sql_count = "
                    SELECT COUNT(*) AS total
                    FROM user u
                    JOIN departments d ON u.department = d.id
                    WHERE d.name = 'กองยุทธศาสตร์และงบประมาณ' AND DATE(u.created_at) = '$latest_date'
                ";
                            $result_count = $conn->query($sql_count);

                            if ($result_count === false) {
                                die("Error (Count Query): " . $conn->error);
                            } else {
                                $row_count = $result_count->fetch_assoc();
                                $total_count = $row_count['total'];
                            }
                        } else {
                            $total_count = 0;
                        }

                        $conn->close();
                        ?>
                        <p>
                            <?php echo $total_count; ?> User
                        </p>

                        <small class="text-muted">
                                <?php
                                include('../../../../system/database/DB_account.php');

                                // สร้าง query
                                $sql = "
                            SELECT 
                                departments.name,
                                MAX(user.created_at) AS latest_date
                            FROM 
                                user
                            JOIN 
                                departments ON user.department = departments.id
                            WHERE 
                                departments.name = 'กองยุทธศาสตร์และงบประมาณ'
                            GROUP BY 
                                departments.name
                        ";

                                // ดำเนินการ query
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // ดึงข้อมูล
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        $latest_date = $row['latest_date'];

                                        // แปลงเวลาให้เป็นรูปแบบ 9:14pm
                                        $final_date = date('g:ia', strtotime($latest_date));

                                        // แสดงผลเฉพาะเวลา
                                        echo "$final_date";
                                    } else {
                                        echo "ไม่พบข้อมูล.";
                                    }
                                } else {
                                    echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                                }
                                ?>
                            </small>
                        </div>
                    </div>

                    <?php
                        include('../../../../system/database/DB_account.php');

                                        $sql = "
                            SELECT COUNT(*) AS total
                            FROM user u
                            JOIN departments d ON u.department = d.id
                            WHERE d.name = 'กองยุทธศาสตร์และงบประมาณ'
                            ";
                        $result = $conn->query($sql);

                        if ($result === false) {
                            // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
                            echo "Error: " . $conn->error;
                            $total_count = 0;
                        } else {
                            // ตรวจสอบผลลัพธ์
                            if ($result->num_rows > 0) {
                                // ดึงข้อมูลออกมา
                                $row = $result->fetch_assoc();
                                $total_count = $row['total'];
                            } else {
                                $total_count = 0;
                            }
                        }

                        $conn->close();
                        ?>
                        <h4><?php echo $total_count; ?></h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-purple-light">
                            <span class="material-icons-sharp purple">
                                laptop_chromebook
                            </span>
                        </div>
                        <div class="details">
                            <h4>Welfare</h4>
                            <p>
                            <?php
                                include('../../../../system/database/DB_account.php');

                                // สร้าง query
                                $sql = "
                                SELECT 
                                    departments.name,
                                    MAX(user.created_at) AS latest_date
                                FROM 
                                    user
                                JOIN 
                                    departments ON user.department = departments.id
                                WHERE 
                                    departments.name = 'กองสวัสดิการสังคม'
                                GROUP BY 
                                    departments.name
                                ";

                                // ดำเนินการ query
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // ดึงข้อมูล
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        $latest_date = $row['latest_date'];

                                        // แปลงวันที่ให้เป็นรูปแบบ 31.10.2567
                                        $day = date('d', strtotime($latest_date)); // วันที่
                                        $month = date('m', strtotime($latest_date)); // เดือน
                                        $year = date('Y', strtotime($latest_date)) + 543; // ปี (เพิ่ม 543)

                                        $final_date = "$day.$month.$year";

                                        // แสดงผลใน <> tag
                                        echo $final_date;
                                    } else {
                                        echo "ไม่พบข้อมูล.";
                                    }
                                } else {
                                    echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="../../../../assets/images/visa.png">
                        </div>
                        <div class="details">

                        <?php
                        include('../../../../system/database/DB_account.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล
                        $sql_date = "
                  SELECT DATE(MAX(u.created_at)) AS latest_date
                  FROM user u
                  JOIN departments d ON u.department = d.id
                  WHERE d.name = 'กองสวัสดิการสังคม'
              ";
                        $result_date = $conn->query($sql_date);

                        if ($result_date === false) {
                            die("Error (Latest Date Query): " . $conn->error);
                        } else {
                            $row_date = $result_date->fetch_assoc();
                            $latest_date = $row_date['latest_date']; // รูปแบบเป็น YYYY-MM-DD
                        }

                        if ($latest_date) {
                            // นับจำนวนข้อมูล WINDOWS 10 ในวันที่ล่าสุดของเฉพาะ WINDOWS 10
                            $sql_count = "
                    SELECT COUNT(*) AS total
                    FROM user u
                    JOIN departments d ON u.department = d.id
                    WHERE d.name = 'กองสวัสดิการสังคม' AND DATE(u.created_at) = '$latest_date'
                ";
                            $result_count = $conn->query($sql_count);

                            if ($result_count === false) {
                                die("Error (Count Query): " . $conn->error);
                            } else {
                                $row_count = $result_count->fetch_assoc();
                                $total_count = $row_count['total'];
                            }
                        } else {
                            $total_count = 0;
                        }

                        $conn->close();
                        ?>
                        <p>
                            <?php echo $total_count; ?> User
                        </p>
                        <small class="text-muted">
                                <?php
                                include('../../../../system/database/DB_account.php');

                                // สร้าง query
                                $sql = "
                            SELECT 
                                departments.name,
                                MAX(user.created_at) AS latest_date
                            FROM 
                                user
                            JOIN 
                                departments ON user.department = departments.id
                            WHERE 
                                departments.name = 'กองสวัสดิการสังคม'
                            GROUP BY 
                                departments.name
                        ";

                                // ดำเนินการ query
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // ดึงข้อมูล
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        $latest_date = $row['latest_date'];

                                        // แปลงเวลาให้เป็นรูปแบบ 9:14pm
                                        $final_date = date('g:ia', strtotime($latest_date));

                                        // แสดงผลเฉพาะเวลา
                                        echo "$final_date";
                                    } else {
                                        echo "ไม่พบข้อมูล.";
                                    }
                                } else {
                                    echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                                }
                                ?>
                            </small>
                        </div>
                    </div>

                    <?php
                        include('../../../../system/database/DB_account.php');

                                        $sql = "
                            SELECT COUNT(*) AS total
                            FROM user u
                            JOIN departments d ON u.department = d.id
                            WHERE d.name = 'กองสวัสดิการสังคม'
                            ";
                        $result = $conn->query($sql);

                        if ($result === false) {
                            // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
                            echo "Error: " . $conn->error;
                            $total_count = 0;
                        } else {
                            // ตรวจสอบผลลัพธ์
                            if ($result->num_rows > 0) {
                                // ดึงข้อมูลออกมา
                                $row = $result->fetch_assoc();
                                $total_count = $row['total'];
                            } else {
                                $total_count = 0;
                            }
                        }

                        $conn->close();
                        ?>
                        <h4><?php echo $total_count; ?></h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-purple-light">
                            <span class="material-icons-sharp purple">
                                laptop_chromebook
                            </span>
                        </div>
                        <div class="details">
                            <h4>Personnel</h4>

                            <p>
                            <?php
                                include('../../../../system/database/DB_account.php');

                                // สร้าง query
                                $sql = "
                                SELECT 
                                    departments.name,
                                    MAX(user.created_at) AS latest_date
                                FROM 
                                    user
                                JOIN 
                                    departments ON user.department = departments.id
                                WHERE 
                                    departments.name = 'กองการเจ้าหน้าที่'
                                GROUP BY 
                                    departments.name
                                ";

                                // ดำเนินการ query
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // ดึงข้อมูล
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        $latest_date = $row['latest_date'];

                                        // แปลงวันที่ให้เป็นรูปแบบ 31.10.2567
                                        $day = date('d', strtotime($latest_date)); // วันที่
                                        $month = date('m', strtotime($latest_date)); // เดือน
                                        $year = date('Y', strtotime($latest_date)) + 543; // ปี (เพิ่ม 543)

                                        $final_date = "$day.$month.$year";

                                        // แสดงผลใน <> tag
                                        echo $final_date;
                                    } else {
                                        echo "ไม่พบข้อมูล.";
                                    }
                                } else {
                                    echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-primary">
                            <img src="../../../../assets/images/visa.png">
                        </div>
                        <div class="details">

                        <?php
                        include('../../../../system/database/DB_account.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล
                        $sql_date = "
                  SELECT DATE(MAX(u.created_at)) AS latest_date
                  FROM user u
                  JOIN departments d ON u.department = d.id
                  WHERE d.name = 'กองการเจ้าหน้าที่'
              ";
                        $result_date = $conn->query($sql_date);

                        if ($result_date === false) {
                            die("Error (Latest Date Query): " . $conn->error);
                        } else {
                            $row_date = $result_date->fetch_assoc();
                            $latest_date = $row_date['latest_date']; // รูปแบบเป็น YYYY-MM-DD
                        }

                        if ($latest_date) {
                            // นับจำนวนข้อมูล WINDOWS 10 ในวันที่ล่าสุดของเฉพาะ WINDOWS 10
                            $sql_count = "
                    SELECT COUNT(*) AS total
                    FROM user u
                    JOIN departments d ON u.department = d.id
                    WHERE d.name = 'กองการเจ้าหน้าที่' AND DATE(u.created_at) = '$latest_date'
                ";
                            $result_count = $conn->query($sql_count);

                            if ($result_count === false) {
                                die("Error (Count Query): " . $conn->error);
                            } else {
                                $row_count = $result_count->fetch_assoc();
                                $total_count = $row_count['total'];
                            }
                        } else {
                            $total_count = 0;
                        }

                        $conn->close();
                        ?>
                        <p>
                            <?php echo $total_count; ?> User
                        </p>

                            <small class="text-muted">
                                <?php
                                include('../../../../system/database/DB_account.php');

                                // สร้าง query
                                $sql = "
                            SELECT 
                                departments.name,
                                MAX(user.created_at) AS latest_date
                            FROM 
                                user
                            JOIN 
                                departments ON user.department = departments.id
                            WHERE 
                                departments.name = 'กองการเจ้าหน้าที่'
                            GROUP BY 
                                departments.name
                        ";

                                // ดำเนินการ query
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // ดึงข้อมูล
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        $latest_date = $row['latest_date'];

                                        // แปลงเวลาให้เป็นรูปแบบ 9:14pm
                                        $final_date = date('g:ia', strtotime($latest_date));

                                        // แสดงผลเฉพาะเวลา
                                        echo "$final_date";
                                    } else {
                                        echo "ไม่พบข้อมูล.";
                                    }
                                } else {
                                    echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                                }
                                ?>
                            </small>
                        </div>
                    </div>

                    <?php
                        include('../../../../system/database/DB_account.php');

                                        $sql = "
                            SELECT COUNT(*) AS total
                            FROM user u
                            JOIN departments d ON u.department = d.id
                            WHERE d.name = 'กองการเจ้าหน้าที่'
                            ";
                        $result = $conn->query($sql);

                        if ($result === false) {
                            // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
                            echo "Error: " . $conn->error;
                            $total_count = 0;
                        } else {
                            // ตรวจสอบผลลัพธ์
                            if ($result->num_rows > 0) {
                                // ดึงข้อมูลออกมา
                                $row = $result->fetch_assoc();
                                $total_count = $row['total'];
                            } else {
                                $total_count = 0;
                            }
                        }

                        $conn->close();
                        ?>
                        <h4><?php echo $total_count; ?></h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-success-light">
                            <span class="material-icons-sharp success">
                                charging_station
                            </span>
                        </div>
                        <div class="details">
                            <h4>Cofounder</h4>

                            <p>
                            <?php
                                include('../../../../system/database/DB_account.php');

                                // สร้าง query
                                $sql = "
                                SELECT 
                                    departments.name,
                                    MAX(user.created_at) AS latest_date
                                FROM 
                                    user
                                JOIN 
                                    departments ON user.department = departments.id
                                WHERE 
                                    departments.name = 'คณะผู้บริหาร'
                                GROUP BY 
                                    departments.name
                                ";

                                // ดำเนินการ query
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // ดึงข้อมูล
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        $latest_date = $row['latest_date'];

                                        // แปลงวันที่ให้เป็นรูปแบบ 31.10.2567
                                        $day = date('d', strtotime($latest_date)); // วันที่
                                        $month = date('m', strtotime($latest_date)); // เดือน
                                        $year = date('Y', strtotime($latest_date)) + 543; // ปี (เพิ่ม 543)

                                        $final_date = "$day.$month.$year";

                                        // แสดงผลใน <> tag
                                        echo $final_date;
                                    } else {
                                        echo "ไม่พบข้อมูล.";
                                    }
                                } else {
                                    echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-dark">
                            <img src="../../../../assets/images/master_card.png">
                        </div>
                        <div class="details">

                            <?php
                        include('../../../../system/database/DB_account.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล
                        $sql_date = "
                  SELECT DATE(MAX(u.created_at)) AS latest_date
                  FROM user u
                  JOIN departments d ON u.department = d.id
                  WHERE d.name = 'คณะผู้บริหาร'
              ";
                        $result_date = $conn->query($sql_date);

                        if ($result_date === false) {
                            die("Error (Latest Date Query): " . $conn->error);
                        } else {
                            $row_date = $result_date->fetch_assoc();
                            $latest_date = $row_date['latest_date']; // รูปแบบเป็น YYYY-MM-DD
                        }

                        if ($latest_date) {
                            // นับจำนวนข้อมูล WINDOWS 10 ในวันที่ล่าสุดของเฉพาะ WINDOWS 10
                            $sql_count = "
                    SELECT COUNT(*) AS total
                    FROM user u
                    JOIN departments d ON u.department = d.id
                    WHERE d.name = 'คณะผู้บริหาร' AND DATE(u.created_at) = '$latest_date'
                ";
                            $result_count = $conn->query($sql_count);

                            if ($result_count === false) {
                                die("Error (Count Query): " . $conn->error);
                            } else {
                                $row_count = $result_count->fetch_assoc();
                                $total_count = $row_count['total'];
                            }
                        } else {
                            $total_count = 0;
                        }

                        $conn->close();
                        ?>
                        <p>
                            <?php echo $total_count; ?> Mach
                        </p>
                
                        <small class="text-muted">
                                <?php
                                include('../../../../system/database/DB_account.php');

                                // สร้าง query
                                $sql = "
                            SELECT 
                                departments.name,
                                MAX(user.created_at) AS latest_date
                            FROM 
                                user
                            JOIN 
                                departments ON user.department = departments.id
                            WHERE 
                                departments.name = 'คณะผู้บริหาร'
                            GROUP BY 
                                departments.name
                        ";

                                // ดำเนินการ query
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // ดึงข้อมูล
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        $latest_date = $row['latest_date'];

                                        // แปลงเวลาให้เป็นรูปแบบ 9:14pm
                                        $final_date = date('g:ia', strtotime($latest_date));

                                        // แสดงผลเฉพาะเวลา
                                        echo "$final_date";
                                    } else {
                                        echo "ไม่พบข้อมูล.";
                                    }
                                } else {
                                    echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                                }
                                ?>
                            </small>
                        </div>
                    </div>

                    <?php
                        include('../../../../system/database/DB_account.php');

                                        $sql = "
                            SELECT COUNT(*) AS total
                            FROM user u
                            JOIN departments d ON u.department = d.id
                            WHERE d.name = 'คณะผู้บริหาร'
                            ";
                        $result = $conn->query($sql);

                        if ($result === false) {
                            // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
                            echo "Error: " . $conn->error;
                            $total_count = 0;
                        } else {
                            // ตรวจสอบผลลัพธ์
                            if ($result->num_rows > 0) {
                                // ดึงข้อมูลออกมา
                                $row = $result->fetch_assoc();
                                $total_count = $row['total'];
                            } else {
                                $total_count = 0;
                            }
                        }

                        $conn->close();
                        ?>
                        <h4><?php echo $total_count; ?></h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->
            </div>
            <!-------------------------- END OF TRANSACTIONS -------------------------->
        </section>
        <!---------------------------------------- END OF RIGHT ---------------------------------------->
    </main>
    <!--================================== END OF ASIDE ==================================-->

    <script src="../../../../assets/js/agency.js"></script>




</body>

</html>