<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQUIP | User Account.</title>
    <!--MATERIAL ICONS CDN-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!--GOOGLE FONTS (POPPINS)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!--STYLESHEET-->
    <link rel="stylesheet" href="../../../assets/css/user_account.css">

    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <nav>
        <div class="container">
            <img src="../../../assets/images/logo.png" class="logo">
            <div class="search-bar">
                <span class="material-icons-sharp">search</span>
                <a href="search/Search_account.php">ค้นหา...</a>
            </div>
            <div class="profile-area">
                <div class="theme-btn">
                    <span class="material-icons-sharp active">light_mode</span>
                    <p>.ADMIN</p>
                </div>
                <div class="profile">
                    <div class="profile-photo">
                        <img src="../../../assets/images/profiled.png">
                    </div>
                    <h5>
                        <!--Firstname & Lastname-->
                        <?php

                        if (!isset($_SESSION['userid'])) {
                            header("Location: ../Auth.php");
                            exit();
                        }

                        // ตรวจสอบบทบาทของผู้ใช้
                        if ($_SESSION['urole'] == '1' || $_SESSION['urole'] == '2') {
                            include('../../../system/database/DB_account.php');

                            // คำสั่ง SQL ในการดึงข้อมูล first_name และ last_name ของผู้ใช้ที่ล็อกอินอยู่
                            $username = $_SESSION['username'];
                            $sql = "SELECT first_name, last_name FROM user WHERE username = '$username'";

                            $result = $conn->query($sql);

                            // ตรวจสอบว่า query สำเร็จหรือไม่
                            if ($result === false) {
                                echo "Error: " . $conn->error; // แสดงข้อผิดพลาดถ้าเกิดขึ้น
                            } else {
                                // ตรวจสอบว่ามีข้อมูลที่ได้จากการคิวรี่หรือไม่
                                if ($result->num_rows > 0) {
                                    // ดึงข้อมูล first_name และ last_name จากแถวแรก
                                    $row = $result->fetch_assoc();
                                    // แสดงข้อมูล first_name และ last_name ในแท็ก <p>
                                    echo "<p>" . $row['first_name'] . " " . $row['last_name'] . "</p>";
                                } else {
                                    echo "Name not found";
                                }
                            }

                            // ปิดการเชื่อมต่อกับฐานข้อมูล
                            $conn->close();
                        }
                        ?>
                    </h5>
                    <a href="account/Profile.php">
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
                <a href="Dashboard.php" class="active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h4>แผงควบคุม</h4>
                </a>
                <a href="User_account.php">
                    <span class="material-icons-sharp primary">message</span>
                    <h4>บัญชีผู้ใช้</h4>
                </a>
                <a href="Equip_computer.php">
                    <span class="material-icons-sharp">payment</span>
                    <h4>เพิ่มครุภัณฑ์</h4>
                </a>
                <a href="account/Profile.php">
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
                <a href="#">EQUIP Version 1.8.15</a>
            </div>
        </aside>
        <!------------------- END OF ASIDE ------------------->
        <section class="middle">
            <div class="header">
                <h1>บัญชีผู้ใช้</h1>
            </div>
            <div class="wrapper">
                <div class="btns">
                    <a href="../admin/add/Create_account.php">เพิ่มข้อมูลผู้ใช้งาน</a>
                    <a href="../../../system/database/download/export_account.php">ดาวน์โหลดข้อมูลครุภัรฑ์</a>
                </div>
            </div>
            <div class="content_wrapper">
                <div id="user_account_container" class="data_user_account">
                    <div class="table_user_account">
                        <table>
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ</th>
                                    <th>นามสกุล</th>
                                    <th>อีเมล</th>
                                    <th>เบอร์โทร</th>
                                    <th>กอง/สำนัก</th>
                                    <th>ส่วน</th>
                                    <th>ฝ่าย</th>
                                    <th>งาน</th>
                                    <th>ชื่อผู้ใช้</th>
                                    <th>สิทธิ์ผู้ใช้</th>
                                    <th>วันที่และเวลา</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="loading" style="display:none;">กำลังโหลด...</div>
        </section>

        <script>
            let start = 0;
            const limit = 10;
            const container = document.querySelector('#user_account_container tbody');
            const loading = document.getElementById('loading');
            let isLoading = false;

            function loadMoreData() {
                if (isLoading) return;
                isLoading = true;
                loading.style.display = 'block';
                const xhr = new XMLHttpRequest();
                xhr.open('GET', `../../config/load/conn_account.php?start=${start}&limit=${limit}`, true);
                xhr.onload = function () {
                    if (this.status === 200) {
                        console.log(this.responseText); // เพิ่มการดีบัก
                        const data = JSON.parse(this.responseText);
                        if (data.length > 0) {
                            data.forEach(item => {
                                const tr = document.createElement('tr');
                                tr.innerHTML = `
                        <td>${item.id}</td>
                        <td class="first_name">${item.first_name}</td>
                        <td class="last_name">${item.last_name}</td>
                        <td class="email_address">${item.email_address}</td>
                        <td class="phone">${item.phone}</td>
                        <td class="department">${item.department_name}</td>
                        <td class="segment">${item.segment_name}</td>
                        <td class="division">${item.division_name}</td>
                        <td class="working">${item.working_name}</td>
                        <td class="username">${item.username}</td>
                        <td class="urole">${item.urole_name}</td>
                        <td class="created_at">${item.created_at}</td>
                        <td>
                            <a href="update/Update_account.php?id=${item.id}">
                                <span class="material-icons-sharp">drive_file_rename_outline</span>
                            </a>
                        </td>
                        <td>
                            <a href="../../../system/libraries/delete_account.php?id=${item.id}">
                                <span class="material-icons-sharp">delete_forever</span>
                            </a>
                        </td>`;
                                container.appendChild(tr);
                            });
                            start += limit;
                            loading.style.display = 'none';
                            isLoading = false;
                        } else {
                            loading.innerHTML = 'ไม่มีข้อมูลเพิ่มเติม';
                        }
                    } else {
                        loading.innerHTML = 'เกิดข้อผิดพลาดในการโหลดข้อมูล';
                        isLoading = false;
                    }
                };
                xhr.onerror = function () {
                    loading.innerHTML = 'เกิดข้อผิดพลาดในการโหลดข้อมูล';
                    isLoading = false;
                };
                xhr.send();
            }

            document.querySelector('#user_account_container').addEventListener('scroll', () => {
                const containerElement = document.querySelector('#user_account_container');
                if (containerElement.scrollTop + containerElement.clientHeight >= containerElement.scrollHeight - 10) {
                    loadMoreData();
                }
            });

            document.addEventListener('DOMContentLoaded', () => {
                loadMoreData();
            });
        </script>
        
        <!-- END OF MIDDLE -->
        <section class="right">
            <div class="investments">
                <div class="header">
                    <h2>สิทธิ์ผู้ใช้</h2>
                    <a href="search/Search_account.php">เพิ่มเติม<span class="material-icons-sharp">
                            chevron_right
                        </span></a>
                </div>

                <div class="investment">
                    <img src="../../../assets/images/profiled.png">
                    <h4>ADMIN</h4>
                    <div class="date-time">
                        <p>
                            <?php
                            include('../../../system/database/DB_account.php');

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
                            include('../../../system/database/DB_account.php');

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

                        include('../../../system/database/DB_account.php');

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
                        include('../../../system/database/DB_account.php');

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
                        include('../../../system/database/DB_account.php');

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
                    <img src="../../../assets/images/profiling.png">
                    <h4>PERSONNEL</h4>
                    <div class="date-time">
                        <p>
                            <?php
                            include('../../../system/database/DB_account.php');

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
                            include('../../../system/database/DB_account.php');

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

                        include('../../../system/database/DB_account.php');

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
                        include('../../../system/database/DB_account.php');

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
                        include('../../../system/database/DB_account.php');

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
                    <a href="Dashboard.php">เพิ่มเติม<span class="material-icons-sharp">
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
                                include('../../../system/database/DB_account.php');

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
                            <img src="../../../assets/images/visa.png">
                        </div>
                        <div class="details">
                        <?php
                        include('../../../system/database/DB_account.php');

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
                                include('../../../system/database/DB_account.php');

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
                        include('../../../system/database/DB_account.php');

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
                                include('../../../system/database/DB_account.php');

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
                            <img src="../../../assets/images/visa.png">
                        </div>
                        <div class="details">

                        <?php
                        include('../../../system/database/DB_account.php');

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
                                include('../../../system/database/DB_account.php');

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
                        include('../../../system/database/DB_account.php');

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
                                include('../../../system/database/DB_account.php');

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
                            <img src="../../../assets/images/master_card.png">
                        </div>
                        <div class="details">

                           <?php
                        include('../../../system/database/DB_account.php');

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
                                include('../../../system/database/DB_account.php');

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
                        include('../../../system/database/DB_account.php');

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
                                include('../../../system/database/DB_account.php');

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
                            <img src="../../../assets/images/visa.png">
                        </div>
                        <div class="details">
                        <?php
                        include('../../../system/database/DB_account.php');

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
                                include('../../../system/database/DB_account.php');

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
                        include('../../../system/database/DB_account.php');

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
                                include('../../../system/database/DB_account.php');

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
                            <img src="../../../assets/images/visa.png">
                        </div>
                        <div class="details">

                        <?php
                        include('../../../system/database/DB_account.php');

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
                                include('../../../system/database/DB_account.php');

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
                        include('../../../system/database/DB_account.php');

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
                                include('../../../system/database/DB_account.php');

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
                            <img src="../../../assets/images/master_card.png">
                        </div>
                        <div class="details">
                            
                        <?php
                        include('../../../system/database/DB_account.php');

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
                                include('../../../system/database/DB_account.php');

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
                        include('../../../system/database/DB_account.php');

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
                                include('../../../system/database/DB_account.php');

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
                            <img src="../../../assets/images/visa.png">
                        </div>
                        <div class="details">

                        <?php
                        include('../../../system/database/DB_account.php');

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
                                include('../../../system/database/DB_account.php');

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
                        include('../../../system/database/DB_account.php');

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
                                include('../../../system/database/DB_account.php');

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
                            <img src="../../../assets/images/visa.png">
                        </div>
                        <div class="details">

                        <?php
                        include('../../../system/database/DB_account.php');

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
                                include('../../../system/database/DB_account.php');

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
                        include('../../../system/database/DB_account.php');

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
                                include('../../../system/database/DB_account.php');

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
                            <img src="../../../assets/images/master_card.png">
                        </div>
                        <div class="details">

                            <?php
                        include('../../../system/database/DB_account.php');

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
                                include('../../../system/database/DB_account.php');

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
                        include('../../../system/database/DB_account.php');

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



    <script src="../../../assets/js/btn_wrapper.js"></script>



</body>

</html>