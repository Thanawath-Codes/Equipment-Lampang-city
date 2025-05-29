<?php
// เชื่อมต่อฐานข้อมูล
require_once '../../system/database/DB_account.php';

// รับค่าจาก GET
$first_name = $_GET['first_name'] ?? '';
$last_name = $_GET['last_name'] ?? '';
$email_address = $_GET['email_address'] ?? '';
$phone = $_GET['phone'] ?? '';
$department = $_GET['department'] ?? '';
$segment = $_GET['segment'] ?? '';
$division = $_GET['division'] ?? '';
$working = $_GET['working'] ?? '';
$username = $_GET['username'] ?? '';
$password_hash = $_GET['password_hash'] ?? '';
$urole = $_GET['urole'] ?? '';



$where = [];

if (!empty($first_name)) {
    $where[] = "us.first_name LIKE '%" . mysqli_real_escape_string($conn, $first_name) . "%'";
}
if (!empty($last_name)) {
    $where[] = "us.last_name LIKE '%" . mysqli_real_escape_string($conn, $last_name) . "%'";
}
if (!empty($email_address)) {
    $where[] = "us.email_address LIKE '%" . mysqli_real_escape_string($conn, $email_address) . "%'";
}
if (!empty($phone)) {
    $where[] = "us.phone LIKE '%" . mysqli_real_escape_string($conn, $phone) . "%'";
}
if (!empty($department)) {
    $where[] = "us.department = '" . mysqli_real_escape_string($conn, $department) . "'";
}
if (!empty($segment)) {
    $where[] = "us.segment = '" . mysqli_real_escape_string($conn, $segment) . "'";
}
if (!empty($division)) {
    $where[] = "us.division = '" . mysqli_real_escape_string($conn, $division) . "'";
}
if (!empty($working)) {
    $where[] = "us.working = '" . mysqli_real_escape_string($conn, $working) . "'";
}
if (!empty($urole)) {
    $where[] = "us.urole = '" . mysqli_real_escape_string($conn, $urole) . "'";
}
if (!empty($username)) {
    $where[] = "us.username LIKE '%" . mysqli_real_escape_string($conn, $username) . "%'";
}


$sql = "SELECT us.id, us.first_name, us.last_name, 
        us.email_address, us.phone,
        d.name AS department_name, s.name AS segment_name, 
        v.name AS division_name, w.name AS working_name, 
        r.name AS urole_name, us.username, us.created_at
        FROM `user` AS us
        INNER JOIN `departments` AS d ON us.department = d.id
        INNER JOIN `segments` AS s ON us.segment = s.id
        INNER JOIN `divisions` AS v ON us.division = v.id
        INNER JOIN `workings` AS w ON us.working = w.id
        INNER JOIN `uroles` AS r ON us.urole = r.id";

// เช็กว่ามีเงื่อนไขไหม
if (!empty($where)) {
    $sql .= " WHERE " . implode(" AND ", $where);
}

// รันคำสั่ง SQL
$result = mysqli_query($conn, $sql);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQUIP | Data Equipment Account.</title>
    <!--MATERIAL ICONS CDN-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!--GOOGLE FONTS (POPPINS)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!--STYLESHEET-->
    <link rel="stylesheet" href="../../assets/css/search_ups.css">


    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <main>
        <aside>
            <button id="close-btn">
                <span class="material-icons-sharp">close</span>
            </button>
            <div class="sidebar">
                <a href="../../application/controllers/admin/Dashboard.php" class="active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h4>แผงควบคุม</h4>
                </a>
                <a href="../../application/controllers/admin/User_account.php">
                    <span class="material-icons-sharp primary">message</span>
                    <h4>บัญชีผู้ใช้</h4>
                </a>
                <a href="../../application/controllers/admin/Equip_computer.php">
                    <span class="material-icons-sharp">
                        screenshot_monitor
                    </span>
                    <h4>คอมพิวเตอร์</h4>
                </a>
                <a href="../../application/controllers/admin/Equip_monitor.php">
                    <span class="material-icons-sharp">
                        laptop_chromebook
                    </span>
                    <h4>จอคอมพิวเตอร์</h4>
                </a>
                <a href="../../application/controllers/admin/Equip_tablet.php">
                    <span class="material-icons-sharp">
                        tablet_mac
                    </span>
                    <h4>แท็บเล็ต</h4>
                </a>
                <a href="../../application/controllers/admin/Equip_printer.php">
                    <span class="material-icons-sharp">
                        print
                    </span>
                    <h4>ปริ้นเตอร์</h4>
                </a>
                <a href="../../application/controllers/admin/Equip_scanner.php">
                    <span class="material-icons-sharp">
                        document_scanner
                    </span>
                    <h4>สแกนเนอร์</h4>
                </a>
                <a href="../../application/controllers/admin/Equip_ups.php">
                    <span class="material-icons-sharp">
                        charging_station
                    </span>
                    <h4>เครื่องสำรองไฟ</h4>
                </a>
                <a href="../../application/controllers/admin/account/Profile.php">
                    <span class="material-icons-sharp">settings</span>
                    <h4>ตั้งค่า</h4>
                </a>
            </div>
            <!-- END OF SIDEBAR -->

            <div class="updates">
                <span class="material-icons-sharp">pending_actions</span>
                <h4>ข้อมูลที่ค้นหา</h4>
                
                <?php
$labels = [
    'first_name' => 'ชื่อ',
    'last_name' => 'นามสกุล',
    'email_address' => 'อีเมล',
    'phone' => 'เบอร์โทร',
    'department' => 'กอง/สำนัก',
    'segment' => 'ส่วน',
    'division' => 'ฝ่าย',
    'working' => 'งาน',
    'username' => 'ชื่อผู้ใช้',
    'urole' => 'สิทธิ์ผู้ใช้',
];

function getNameById($conn, $table, $id) {
    $stmt = $conn->prepare("SELECT name FROM $table WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($name);
    $stmt->fetch();
    $stmt->close();
    return $name;
}

echo "<pre>";
foreach ($_GET as $key => $value) {
    if (!empty($value)) {
        $label = $labels[$key] ?? $key;
        $displayValue = $value;

        // ตรวจสอบและแปลงรหัสเป็นชื่อ
        switch ($key) {
            case 'department':
                $displayValue = getNameById($conn, 'departments', $value);
                break;
            case 'segment':
                $displayValue = getNameById($conn, 'segments', $value);
                break;
            case 'division':
                $displayValue = getNameById($conn, 'divisions', $value);
                break;
            case 'working':
                $displayValue = getNameById($conn, 'workings', $value);
                break;
            case 'urole':
                $displayValue = getNameById($conn, 'uroles', $value);
                break;
            // เพิ่มกรณีอื่น ๆ ตามต้องการ
        }

        echo "<p>$label : $displayValue\n</p>";
    }
}
echo "</pre>";

?>

                              
<?php
$result = mysqli_query($conn, $sql);

if (!$result) {
    // แสดง error หาก query ล้มเหลว
    echo "<p style='color:red;'>เกิดข้อผิดพลาดในการค้นหา: " . mysqli_error($conn) . "</p>";
    echo "<pre>$sql</pre>"; // สำหรับ debug
} else {
    // นับจำนวนแถวและแสดงผล
    $total_rows = mysqli_num_rows($result);
    echo "<p>จำนวนทั้งหมด : {$total_rows} แถว</p>";
}
?>

                  
                <a href="../../application/controllers/admin/search/Search_account.php">ค้นหาข้อมูล</a>     
            </div>
        </aside>
        <!------------------- END OF ASIDE ------------------->
        <section class="middle">
            
            <div class="wrapper">
                <div class="btns">
                    <a href="../../application/controllers/admin/add/Create_account.php">เพิ่มข้อมูลผู้ใช้งาน</a>
                    <a href="../database/download/export_account.php">ดาวน์โหลดข้อมูล</a>
                </div>
            </div>
            <div class="content_wrapper">
    <div id="ups_list_container" class="data_equipment_ups">
        <div class="table_equipment_ups">
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
                        <th>เวลา</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['first_name']}</td>
                                <td>{$row['last_name']}</td>
                                <td>{$row['email_address']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['department_name']}</td>
                                <td>{$row['segment_name']}</td>
                                <td>{$row['division_name']}</td>
                                <td>{$row['working_name']}</td>
                                <td>{$row['username']}</td>
                                <td>{$row['urole_name']}</td>
                                <td>{$row['created_at']}</td>
                                <td><a href='/Equipment-Lampang-city//application/controllers/admin/update/Update_account.php?id=" . $row['id'] . "'>
                                    <span class='material-icons-sharp'>drive_file_rename_outline</span>
                                </a></td>
                                <td><a href='delete_account.php?id=" . $row['id'] . "'>
                                    <span class='material-icons-sharp'>delete_forever</span>
                                </a></td>
                            </tr>";

                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
   
</div>
        </section>
        

        <section class="right">
            <div class="investments">
                <div class="header">
                    <h2>สิทธิ์ผู้ใช้</h2>
                    <a href="#">More <span class="material-icons-sharp">
                            chevron_right
                        </span></a>
                </div>

                <div class="investment">
                    <img src="../../assets/images/profiled.png">
                    <h4>ADMIN</h4>
                    <div class="date-time">
                        <p>
                            <?php
                            include('../../system/database/DB_account.php');

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
                            include('../../system/database/DB_account.php');

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

                        include('../../system/database/DB_account.php');

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
                        include('../../system/database/DB_account.php');

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
                        include('../../system/database/DB_account.php');

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
                    <img src="../../assets/images/profiling.png">
                    <h4>PERSONNEL</h4>
                    <div class="date-time">
                        <p>
                            <?php
                            include('../../system/database/DB_account.php');

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
                            include('../../system/database/DB_account.php');

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

                        include('../../system/database/DB_account.php');

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
                        include('../../system/database/DB_account.php');

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
                        include('../../system/database/DB_account.php');

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
                    <a href="#">เพิ่มเติม<span class="material-icons-sharp">
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
                                include('../database/DB_account.php');

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
                            <img src="../../assets/images/visa.png">
                        </div>
                        <div class="details">
                        <?php
                        include('../database/DB_account.php');

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
                                include('../database/DB_account.php');

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
                        include('../database/DB_account.php');

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
                                include('../database/DB_account.php');

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
                            <img src="../../assets/images/visa.png">
                        </div>
                        <div class="details">

                        <?php
                        include('../database/DB_account.php');

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
                                include('../database/DB_account.php');

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
                        include('../database/DB_account.php');

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
                                include('../database/DB_account.php');

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
                            <img src="../../assets/images/master_card.png">
                        </div>
                        <div class="details">

                           <?php
                        include('../database/DB_account.php');

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
                                include('../database/DB_account.php');

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
                        include('../database/DB_account.php');

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
                                include('../database/DB_account.php');

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
                            <img src="../../assets/images/visa.png">
                        </div>
                        <div class="details">
                        <?php
                        include('../database/DB_account.php');

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
                                include('../database/DB_account.php');

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
                        include('../database/DB_account.php');

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
                                include('../database/DB_account.php');

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
                            <img src="../../assets/images/visa.png">
                        </div>
                        <div class="details">

                        <?php
                        include('../database/DB_account.php');

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
                                include('../database/DB_account.php');

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
                        include('../database/DB_account.php');

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
                                include('../database/DB_account.php');

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
                            <img src="../../assets/images/master_card.png">
                        </div>
                        <div class="details">
                            
                        <?php
                        include('../database/DB_account.php');

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
                                include('../database/DB_account.php');

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
                        include('../database/DB_account.php');

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
                                include('../database/DB_account.php');

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
                            <img src="../../assets/images/visa.png">
                        </div>
                        <div class="details">

                        <?php
                        include('../database/DB_account.php');

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
                                include('../database/DB_account.php');

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
                        include('../database/DB_account.php');

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
                                include('../database/DB_account.php');

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
                            <img src="../../assets/images/visa.png">
                        </div>
                        <div class="details">

                        <?php
                        include('../database/DB_account.php');

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
                                include('../database/DB_account.php');

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
                        include('../Database/DB_account.php');

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
                                include('../database/DB_account.php');

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
                            <img src="../../assets/images/master_card.png">
                        </div>
                        <div class="details">

                            <?php
                        include('../database/DB_account.php');

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
                                include('../database/DB_account.php');

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
                        include('../database/DB_account.php');

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

    <script src="../../assets/js/btn_wrapper.js"></script>


</body>

</html>