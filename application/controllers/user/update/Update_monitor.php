<?php
session_start();

include "../../../../system/database/DB_monitor.php";

$id = $_GET["id"];

// Fetch data from the database
$sql = "SELECT * FROM `monitor_lists` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("No data found for id $id");
}


if (isset($_POST["submit"])) {
    // Check and use existing values if new values are not provided
    $serial_number = !empty($_POST['serial_number']) ? $_POST['serial_number'] : $row['serial_number'];
    $year_equipment = !empty($_POST['year_equipment']) ? $_POST['year_equipment'] : $row['year_equipment'];
    $monitor_brand = !empty($_POST['monitor_brand']) ? $_POST['monitor_brand'] : $row['monitor_brand'];
    $monitor_model = !empty($_POST['monitor_model']) ? $_POST['monitor_model'] : $row['monitor_model'];
    $monitor_size = !empty($_POST['monitor_size']) ? $_POST['monitor_size'] : $row['monitor_size'];
    $status_equipment = !empty($_POST['status_equipment']) ? $_POST['status_equipment'] : $row['status_equipment'];
    $department = !empty($_POST['department']) ? $_POST['department'] : $row['department'];
    $segment = !empty($_POST['segment']) ? $_POST['segment'] : $row['segment'];
    $division = !empty($_POST['division']) ? $_POST['division'] : $row['division'];
    $working = !empty($_POST['working']) ? $_POST['working'] : $row['working'];
    $owner_monitor = !empty($_POST['owner_monitor']) ? $_POST['owner_monitor'] : $row['owner_monitor'];

    // Update data in the database
    $sql = "UPDATE `monitor_lists` SET
        `serial_number`='$serial_number',
        `year_equipment`='$year_equipment',
        `monitor_brand`='$monitor_brand',
        `monitor_model`='$monitor_model',
        `monitor_size`='$monitor_size',
        `status_equipment`='$status_equipment',
        `department`='$department',
        `segment`='$segment',
        `division`='$division',
        `working`='$working',
        `owner_monitor`='$owner_monitor'
        WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../../../../system/messages/equipment/Complete_monitor.php?msg=Data updated successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQUIP | Update Equipment Monitor.</title>
    <!--MATERIAL ICONS CDN-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!--GOOGLE FONTS (POPPINS)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!--STYLESHEET-->
    <link rel="stylesheet" href="../../../../assets/css/update_computer.css">
    <!--AJAX-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--SCRIPT JQUERY-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
                    <a href="../account/Account.php">
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
                <a href="../Equip_monitor.php">
                    <span class="material-icons-sharp">
                        laptop_chromebook
                    </span>
                    <h4>จอคอมพิวเตอร์</h4>
                </a>
                <a href="../Equip_computer.php">
                    <span class="material-icons-sharp">
                        screenshot_monitor
                    </span>
                    <h4>คอมพิวเตอร์</h4>
                </a>
                <a href="../Equip_tablet.php">
                    <span class="material-icons-sharp">
                        tablet_mac
                    </span>
                    <h4>แท็บเล็ต</h4>
                </a>
                <a href="../Equip_printer.php">
                    <span class="material-icons-sharp">
                        print
                    </span>
                    <h4>ปริ้นเตอร์</h4>
                </a>
                <a href="../Equip_scanner.php">
                    <span class="material-icons-sharp">
                        document_scanner
                    </span>
                    <h4>สแกนเนอร์</h4>
                </a>
                <a href="../Equip_ups.php">
                    <span class="material-icons-sharp">
                        charging_station
                    </span>
                    <h4>เครื่องสำรองไฟ</h4>
                </a>
                <a href="../account/Account.php">
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

            <?php
            $sql = "SELECT * FROM `monitor_lists` WHERE id = $id LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>

            <div class="add_equipment_lampangcity">
                <div class="title">แก้ไขครุภัณฑ์</div>
                <div class="content">
                    <form action="" method="post">
                        <div class="equipment_lampangcity">
                            <div class="column">
                                <div class="input-field">
                                    <input type="text" name="serial_number" id="serial_number" maxlength="11"
                                        value="<?php echo $row['serial_number'] ?>" required>
                                    <label for="first_name">เลขครุภัณฑ์จอคอมพิวเตอร์</label>
                                </div>
                            </div>
                        </div>

                        <div class="notification_message">
                            <p>
                                <span class="material-icons-sharp">error</span>
                                กรอกเลขครุภัณฑ์จอคอมพิวเตอร์ ตัวอย่าง 761-43-4366.
                            </p>
                        </div>

                        <div class="equipment_lampangcity" id="update_equipment">
                            <div class="title">แก้ไขครุภัณฑ์</div>
                            <div class="column">
                                <div class="select-box">
                                    <select class="form-select" name="year_equipment">
                                        <option selected disabled>ปีงบประมาณ</option>
                                        <?php
                                        $currentYear = date("Y");
                                        $earliestYear = 1970;
                                        while ($currentYear >= $earliestYear) {
                                            $buddhistYear = $currentYear + 543;
                                            $selected = $buddhistYear == $row['year_equipment'] ? 'selected' : '';
                                            echo "<option value=\"$buddhistYear\" $selected>$buddhistYear</option>";
                                            $currentYear--;
                                        }
                                        ?>
                                    </select>
                                </div>

                                <?php

                                include('../../../../system/database/DB_monitor.php');

                                $monitor_brand = "SELECT * FROM monitor_brands";
                                $monitor_brand_qry = mysqli_query($conn, $monitor_brand);

                                ?>

                                <div class="select-box">
                                    <select class="form-select" id="monitor_brand" name="monitor_brand">
                                        <option selected disabled>เลือก แบรนด์จอคอมพิวเตอร์</option>
                                        <?php while ($monitor_brand_row = mysqli_fetch_assoc($monitor_brand_qry)): ?>
                                        <option value="<?php echo $monitor_brand_row['id']; ?>" <?php if ($monitor_brand_row['id'] == $row['monitor_brand'])
                                               echo 'selected'; ?>>
                                            <?php echo $monitor_brand_row['name']; ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                                <div class="select-box">
                                    <select class="form-select" id="monitor_model" name="monitor_model">
                                        <option selected disabled>เลือก รุ่น/โมเดล</option>
                                        <?php
                                        // ตรวจสอบว่ามีการเลือก monitor_brand แล้วหรือยัง
                                        if (!empty($row['monitor_brand'])) {
                                            $monitor_model_qry = mysqli_query($conn, "SELECT * FROM monitor_models WHERE monitor_brand_id = {$row['monitor_brand']}");
                                            while ($monitor_model_row = mysqli_fetch_assoc($monitor_model_qry)): ?>
                                        <option value="<?php echo $monitor_model_row['id']; ?>" <?php if ($monitor_model_row['id'] == $row['monitor_model'])
                                               echo 'selected'; ?>>
                                            <?php echo $monitor_model_row['name']; ?>
                                        </option>
                                        <?php endwhile;
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="monitor_size" name="monitor_size">
                                        <option selected disabled>เลือกขนาดหน้าจอคอมพิวเตอร์</option>
                                        <?php
                                        // ตรวจสอบว่ามีการเลือก computer_type แล้วหรือยัง
                                        if (!empty($row['monitor_model'])) {
                                            $monitor_size_qry = mysqli_query($conn, "SELECT * FROM monitor_sizes WHERE monitor_model_id = {$row['monitor_model']}");
                                            while ($monitor_size_row = mysqli_fetch_assoc($monitor_size_qry)): ?>
                                        <option value="<?php echo $monitor_size_row['id']; ?>" <?php if ($monitor_size_row['id'] == $row['monitor_size'])
                                               echo 'selected'; ?>>
                                            <?php echo $monitor_size_row['name']; ?>
                                        </option>
                                        <?php endwhile;
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="title">แก้ไขสถานะครุภัณฑ์</div>
                        <div class="status_lampangcity" id="update_status">

                            <?php

                            include('../../../../system/database/DB_monitor.php');

                            $status_equipment = "SELECT * FROM status_equipments";
                            $status_equipment_qry = mysqli_query($conn, $status_equipment);

                            ?>
                            <div class="column">
                                <div class="select-box">
                                    <select class="select-box" id="status_equipment" name="status_equipment">
                                        <option selected disabled>เลือกสถานะจอคอมพิวเตอร์</option>
                                        <?php while ($status_equipment_row = mysqli_fetch_assoc($status_equipment_qry)): ?>
                                        <option value="<?php echo $status_equipment_row['id']; ?>" <?php if ($status_equipment_row['id'] == $row['status_equipment'])
                                               echo 'selected'; ?>>
                                            <?php echo $status_equipment_row['name']; ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="department_lampangcity" id="update_department">

                            <div class="title">แก้ไขผู้ใช้</div>

                            <?php

                            include('../../../../system/database/DB_monitor.php');

                            $department = "SELECT * FROM departments";
                            $department_qry = mysqli_query($conn, $department);

                            ?>
                            <div class="column">
                                <div class="select-box">
                                    <select class="select-box" id="department" name="department">
                                        <option selected disabled>กอง/สำนัก</option>
                                        <?php while ($department_row = mysqli_fetch_assoc($department_qry)): ?>
                                        <option value="<?php echo $department_row['id']; ?>" <?php if ($department_row['id'] == $row['department'])
                                               echo 'selected'; ?>>
                                            <?php echo $department_row['name']; ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="segment" name='segment'>
                                        <option selected disabled>ส่วน</option>
                                        <?php
                                        // ตรวจสอบว่ามีการเลือก department แล้วหรือยัง
                                        if (!empty($row['department'])) {
                                            $segment_qry = mysqli_query($conn, "SELECT * FROM segments WHERE department_id = {$row['department']}");
                                            while ($segment_row = mysqli_fetch_assoc($segment_qry)): ?>
                                        <option value="<?php echo $segment_row['id']; ?>" <?php if ($segment_row['id'] == $row['segment'])
                                               echo 'selected'; ?>>
                                            <?php echo $segment_row['name']; ?>
                                        </option>
                                        <?php endwhile;
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="division" name='division'>
                                        <option selected disabled>ฝ่าย</option>
                                        <?php
                                        // ตรวจสอบว่ามีการเลือก segment แล้วหรือยัง
                                        if (!empty($row['segment'])) {
                                            $division_qry = mysqli_query($conn, "SELECT * FROM divisions WHERE segment_id = {$row['segment']}");
                                            while ($division_row = mysqli_fetch_assoc($division_qry)): ?>
                                        <option value="<?php echo $division_row['id']; ?>" <?php if ($division_row['id'] == $row['division'])
                                               echo 'selected'; ?>>
                                            <?php echo $division_row['name']; ?>
                                        </option>
                                        <?php endwhile;
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="working" name='working'>
                                        <option selected disabled>งาน</option>
                                        <?php
                                        // ตรวจสอบว่ามีการเลือก division แล้วหรือยัง
                                        if (!empty($row['division'])) {
                                            $working_qry = mysqli_query($conn, "SELECT * FROM workings WHERE division_id = {$row['division']}");
                                            while ($working_row = mysqli_fetch_assoc($working_qry)): ?>
                                        <option value="<?php echo $working_row['id']; ?>" <?php if ($working_row['id'] == $row['working'])
                                               echo 'selected'; ?>>
                                            <?php echo $working_row['name']; ?>
                                        </option>
                                        <?php endwhile;
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="title">แก้ไขผู้ใช้ครุภัณฑ์</div>
                            <div class="equipment_lampangcity">
                                <div class="column">
                                    <div class="input-field">
                                        <input type="text" name="owner_monitor"
                                            value="<?php echo $row['owner_monitor'] ?>" required>
                                        <label for="owner_monitor">ชื่อผู้ใช้งานครุภัณฑ์จอคอมพิวเตอร์</label>
                                    </div>
                                </div>
                            </div>

                            <div class="notification_message">
                                <p>
                                    <span class="material-icons-sharp">error</span>
                                    กรอกชื่อเจ้าของครุภัณฑ์ ตัวอย่าง นางสาวริญลญา สกุลสุริยะกานต์.
                                </p>
                            </div>

                            <div class="wrapper">
                                <div class="btns">
                                    <div class="update_page">
                                        <div class="btn_update">
                                            <button type="submit" name="submit">บันทึกข้อมูล</button>
                                        </div>
                                    </div>
                                    <div class="back_page">
                                        <div class="btn_back">
                                            <a href="../Equip_monitor.php">ย้อนกลับ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END OF EQUIPMENT MICRO COMPUTER -->

        </section>
        <!-- END OF MIDDLE -->

        <section class="right">
            <div class="investments">
                <div class="header">
                    <h2>แบรนด์จอคอมพิวเตอร์</h2>
                    <a href="#">เพิ่มเติม<span class="material-icons-sharp">
                            chevron_right
                        </span></a>
                </div>

                <div class="investment">
                    <img src="../../../../assets/images/icon-hp.svg">
                    <h4>HP</h4>
                    <div class="date-time">
                        <p>
                            <?php
                            include('../../../../system/database/DB_monitor.php');

                            // สร้าง query
                            $sql = "
                          SELECT 
                              monitor_brands.name,
                              MAX(monitor_lists.created_at) AS latest_date
                          FROM 
                              monitor_lists
                          JOIN 
                              monitor_brands ON monitor_lists.monitor_brand = monitor_brands.id
                          WHERE 
                              monitor_brands.name = 'HP'
                          GROUP BY 
                              monitor_brands.name
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
                            include('../../../../system/database/DB_monitor.php');

                            // สร้าง query
                            $sql = "
                        SELECT 
                            monitor_brands.name,
                            MAX(monitor_lists.created_at) AS latest_date
                        FROM 
                            monitor_lists
                        JOIN 
                            monitor_brands ON monitor_lists.monitor_brand = monitor_brands.id
                        WHERE 
                            monitor_brands.name = 'HP'
                        GROUP BY 
                            monitor_brands.name
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

                        include('../../../../system/database/DB_monitor.php');

                        // SQL Query
                        $sql = "
    SELECT mm.name 
    FROM monitor_lists ml
    JOIN monitor_models mm ON ml.monitor_model = mm.id
    JOIN monitor_brands mb ON ml.monitor_brand = mb.id
    WHERE mb.name = 'HP'
    ORDER BY ml.created_at DESC -- เรียงวันที่จากล่าสุดไปเก่าสุด
    LIMIT 1; -- เลือกแค่ 1 รายการที่เป็นวันที่ล่าสุด
";

                        if ($conn) { // Check if connection is valid
                            $result = mysqli_query($conn, $sql);

                            if ($result && mysqli_num_rows($result) > 0) { // Check if data is found
                                $row = mysqli_fetch_assoc($result);
                                echo "<p>" . $row['name'] . "</p>"; // Output inside <p> tag
                            } else {
                                echo "No data found.";
                            }

                            // Close connection
                            mysqli_close($conn);
                        } else {
                            echo "Database connection failed.";
                        }
                        ?>
                        <small class="text-muted">Model</small>
                    </div>
                    <div class="amount">
                        <?php
                        include('../../../../system/database/DB_monitor.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM monitor_lists ml
            JOIN monitor_brands mb ON ml.monitor_brand = mb.id
            WHERE mb.name = 'HP'
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
                        include('../../../../system/database/DB_monitor.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล WINDOWS 10
                        $sql_date = "
                  SELECT DATE(MAX(ml.created_at)) AS latest_date
                  FROM monitor_lists ml
                  JOIN monitor_brands mb ON ml.monitor_brand = mb.id
                  WHERE mb.name = 'HP'
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
                    FROM monitor_lists ml
                    JOIN monitor_brands mb ON ml.monitor_brand = mb.id
                    WHERE mb.name = 'HP' AND DATE(ml.created_at) = '$latest_date'
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
                    <img src="../../../../assets/images/icon-acer.svg">
                    <h4>ACER</h4>
                    <div class="date-time">
                        <p>
                            <?php
                            include('../../../../system/database/DB_monitor.php');

                            // สร้าง query
                            $sql = "
                          SELECT 
                              monitor_brands.name,
                              MAX(monitor_lists.created_at) AS latest_date
                          FROM 
                              monitor_lists
                          JOIN 
                              monitor_brands ON monitor_lists.monitor_brand = monitor_brands.id
                          WHERE 
                              monitor_brands.name = 'ACER'
                          GROUP BY 
                              monitor_brands.name
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
                            include('../../../../system/database/DB_monitor.php');

                            // สร้าง query
                            $sql = "
                        SELECT 
                            monitor_brands.name,
                            MAX(monitor_lists.created_at) AS latest_date
                        FROM 
                            monitor_lists
                        JOIN 
                            monitor_brands ON monitor_lists.monitor_brand = monitor_brands.id
                        WHERE 
                            monitor_brands.name = 'ACER'
                        GROUP BY 
                            monitor_brands.name
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

                        include('../../../../system/database/DB_monitor.php');

                        // SQL Query
                        $sql = "
    SELECT mm.name 
    FROM monitor_lists ml
    JOIN monitor_models mm ON ml.monitor_model = mm.id
    JOIN monitor_brands mb ON ml.monitor_brand = mb.id
    WHERE mb.name = 'ACER'
    ORDER BY ml.created_at DESC -- เรียงวันที่จากล่าสุดไปเก่าสุด
    LIMIT 1; -- เลือกแค่ 1 รายการที่เป็นวันที่ล่าสุด
";

                        if ($conn) { // Check if connection is valid
                            $result = mysqli_query($conn, $sql);

                            if ($result && mysqli_num_rows($result) > 0) { // Check if data is found
                                $row = mysqli_fetch_assoc($result);
                                echo "<p>" . $row['name'] . "</p>"; // Output inside <p> tag
                            } else {
                                echo "No data found.";
                            }

                            // Close connection
                            mysqli_close($conn);
                        } else {
                            echo "Database connection failed.";
                        }
                        ?>
                        <small class="text-muted">Model</small>
                    </div>
                    <div class="amount">
                        <?php
                        include('../../../../system/database/DB_monitor.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM monitor_lists ml
            JOIN monitor_brands mb ON ml.monitor_brand = mb.id
            WHERE mb.name = 'ACER'
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
                        include('../../../../system/database/DB_monitor.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล WINDOWS 10
                        $sql_date = "
                  SELECT DATE(MAX(ml.created_at)) AS latest_date
                  FROM monitor_lists ml
                  JOIN monitor_brands mb ON ml.monitor_brand = mb.id
                  WHERE mb.name = 'ACER'
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
                    FROM monitor_lists ml
                    JOIN monitor_brands mb ON ml.monitor_brand = mb.id
                    WHERE mb.name = 'ACER' AND DATE(ml.created_at) = '$latest_date'
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
                <!-- END OF INVESTMENT -->
                <div class="investment">
                    <img src="../../../../assets/images/icon-aoc.svg">
                    <h4>AOC</h4>
                    <div class="date-time">
                        <p>
                            <?php
                            include('../../../../system/database/DB_monitor.php');

                            // สร้าง query
                            $sql = "
                          SELECT 
                              monitor_brands.name,
                              MAX(monitor_lists.created_at) AS latest_date
                          FROM 
                              monitor_lists
                          JOIN 
                              monitor_brands ON monitor_lists.monitor_brand = monitor_brands.id
                          WHERE 
                              monitor_brands.name = 'AOC'
                          GROUP BY 
                              monitor_brands.name
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
                            include('../../../../system/database/DB_monitor.php');

                            // สร้าง query
                            $sql = "
                        SELECT 
                            monitor_brands.name,
                            MAX(monitor_lists.created_at) AS latest_date
                        FROM 
                            monitor_lists
                        JOIN 
                            monitor_brands ON monitor_lists.monitor_brand = monitor_brands.id
                        WHERE 
                            monitor_brands.name = 'AOC'
                        GROUP BY 
                            monitor_brands.name
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

                        include('../../../../system/database/DB_monitor.php');

                        // SQL Query
                        $sql = "
    SELECT mm.name 
    FROM monitor_lists ml
    JOIN monitor_models mm ON ml.monitor_model = mm.id
    JOIN monitor_brands mb ON ml.monitor_brand = mb.id
    WHERE mb.name = 'AOC'
    ORDER BY ml.created_at DESC -- เรียงวันที่จากล่าสุดไปเก่าสุด
    LIMIT 1; -- เลือกแค่ 1 รายการที่เป็นวันที่ล่าสุด
";

                        if ($conn) { // Check if connection is valid
                            $result = mysqli_query($conn, $sql);

                            if ($result && mysqli_num_rows($result) > 0) { // Check if data is found
                                $row = mysqli_fetch_assoc($result);
                                echo "<p>" . $row['name'] . "</p>"; // Output inside <p> tag
                            } else {
                                echo "No data found.";
                            }

                            // Close connection
                            mysqli_close($conn);
                        } else {
                            echo "Database connection failed.";
                        }
                        ?>
                        <small class="text-muted">Model</small>
                    </div>
                    <div class="amount">
                        <?php
                        include('../../../../system/database/DB_monitor.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM monitor_lists ml
            JOIN monitor_brands mb ON ml.monitor_brand = mb.id
            WHERE mb.name = 'AOC'
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
                        include('../../../../system/database/DB_monitor.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล WINDOWS 10
                        $sql_date = "
                  SELECT DATE(MAX(ml.created_at)) AS latest_date
                  FROM monitor_lists ml
                  JOIN monitor_brands mb ON ml.monitor_brand = mb.id
                  WHERE mb.name = 'AOC'
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
                    FROM monitor_lists ml
                    JOIN monitor_brands mb ON ml.monitor_brand = mb.id
                    WHERE mb.name = 'AOC' AND DATE(ml.created_at) = '$latest_date'
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
                    <img src="../../../../assets/images/icon-benq.svg">
                    <h4>BENQ</h4>
                    <div class="date-time">
                        <p>
                            <?php
                            include('../../../../system/database/DB_monitor.php');

                            // สร้าง query
                            $sql = "
                          SELECT 
                              monitor_brands.name,
                              MAX(monitor_lists.created_at) AS latest_date
                          FROM 
                              monitor_lists
                          JOIN 
                              monitor_brands ON monitor_lists.monitor_brand = monitor_brands.id
                          WHERE 
                              monitor_brands.name = 'BENQ'
                          GROUP BY 
                              monitor_brands.name
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
                            include('../../../../system/database/DB_monitor.php');

                            // สร้าง query
                            $sql = "
                        SELECT 
                            monitor_brands.name,
                            MAX(monitor_lists.created_at) AS latest_date
                        FROM 
                            monitor_lists
                        JOIN 
                            monitor_brands ON monitor_lists.monitor_brand = monitor_brands.id
                        WHERE 
                            monitor_brands.name = 'BENQ'
                        GROUP BY 
                            monitor_brands.name
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

                        include('../../../../system/database/DB_monitor.php');

                        // SQL Query
                        $sql = "
    SELECT mm.name 
    FROM monitor_lists ml
    JOIN monitor_models mm ON ml.monitor_model = mm.id
    JOIN monitor_brands mb ON ml.monitor_brand = mb.id
    WHERE mb.name = 'BENQ'
    ORDER BY ml.created_at DESC -- เรียงวันที่จากล่าสุดไปเก่าสุด
    LIMIT 1; -- เลือกแค่ 1 รายการที่เป็นวันที่ล่าสุด
";

                        if ($conn) { // Check if connection is valid
                            $result = mysqli_query($conn, $sql);

                            if ($result && mysqli_num_rows($result) > 0) { // Check if data is found
                                $row = mysqli_fetch_assoc($result);
                                echo "<p>" . $row['name'] . "</p>"; // Output inside <p> tag
                            } else {
                                echo "No data found.";
                            }

                            // Close connection
                            mysqli_close($conn);
                        } else {
                            echo "Database connection failed.";
                        }
                        ?>
                        <small class="text-muted">Model</small>
                    </div>
                    <div class="amount">
                        <?php
                        include('../../../../system/database/DB_monitor.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM monitor_lists ml
            JOIN monitor_brands mb ON ml.monitor_brand = mb.id
            WHERE mb.name = 'BENQ'
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
                        include('../../../../system/database/DB_monitor.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล WINDOWS 10
                        $sql_date = "
                  SELECT DATE(MAX(ml.created_at)) AS latest_date
                  FROM monitor_lists ml
                  JOIN monitor_brands mb ON ml.monitor_brand = mb.id
                  WHERE mb.name = 'BENQ'
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
                    FROM monitor_lists ml
                    JOIN monitor_brands mb ON ml.monitor_brand = mb.id
                    WHERE mb.name = 'BENQ' AND DATE(ml.created_at) = '$latest_date'
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
                <!-------------- END OF INVESTMENT -------------->
            </div>
            <!-------------------- END OF INVESTMENTS -------------------->

            <div class="recent-transactions">
                <div class="header">
                    <h2>ครุภัณฑ์อิเล็กทรอนิกส์</h2>
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
                            <h4>Computer</h4>
                            <?php
                            include('../../../../system/database/DB_computer.php');

                            $sql = "SELECT created_at FROM computer_lists ORDER BY id DESC LIMIT 1"; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่ และ id ด้วยคอลัมน์ที่ใช้เป็น primary key
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // รับค่าผลลัพธ์
                                $row = $result->fetch_assoc();
                                $latestDate = $row["created_at"]; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่
                                // แปลงรูปแบบวันที่เป็นพุทธศักราช
                                $date = new DateTime($latestDate);
                                $year = $date->format('Y') + 543; // แปลงปีเป็นพุทธศักราช
                                $formattedDate = $date->format('d.m.') . $year;
                            } else {
                                $formattedDate = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p><?php echo $formattedDate; ?></p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="../../../../assets/images/visa.png">
                        </div>
                        <div class="details">
                            <?php
                            include('../../../../system/database/DB_computer.php');

                            // ดึงวันที่ล่าสุด
                            $sql_latest_date = "SELECT created_at FROM computer_lists ORDER BY id DESC LIMIT 1";
                            $result_latest_date = $conn->query($sql_latest_date);

                            if ($result_latest_date->num_rows > 0) {
                                $row_latest_date = $result_latest_date->fetch_assoc();
                                $latestDate = $row_latest_date["created_at"];
                                // แปลงวันที่ให้เป็นรูปแบบ Y-m-d เพื่อใช้ในคำสั่ง SQL
                                $latestDateFormatted = date("Y-m-d", strtotime($latestDate));

                                // นับจำนวนแถวที่มีวันที่เป็นวันที่ล่าสุด
                                $sql_count = "SELECT COUNT(*) as total FROM computer_lists WHERE DATE(created_at) = '$latestDateFormatted'";
                                $result_count = $conn->query($sql_count);

                                if ($result_count->num_rows > 0) {
                                    $row_count = $result_count->fetch_assoc();
                                    $totalRows = $row_count["total"];
                                } else {
                                    $totalRows = 0;
                                }
                            } else {
                                $totalRows = 0;
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p><?php echo $totalRows; ?> Mach</p>

                            <?php
                            include('../../../../system/database/DB_computer.php');

                            // ดึงข้อมูลเวลาจากฐานข้อมูล
                            $sql = "SELECT created_at FROM computer_lists ORDER BY id DESC LIMIT 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $createdAt = $row["created_at"];

                                // แปลงเวลาให้เป็นรูปแบบ 12 ชั่วโมงพร้อม am/pm
                                $formattedTime = date('g:iA', strtotime($createdAt));
                                $formattedTime = strtolower($formattedTime); // แปลง AM/PM ให้เป็น am/pm
                            } else {
                                $formattedTime = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <small class="text-muted"><?php echo $formattedTime; ?></small>
                        </div>
                    </div>

                    <?php
                    include('../../../../system/database/DB_computer.php');
                    // การนับจำนวนแถวในตาราง
                    $sql = "SELECT COUNT(*) as total FROM computer_lists";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // รับค่าผลลัพธ์
                        $row = $result->fetch_assoc();
                        $totalRows = $row["total"];
                    } else {
                        $totalRows = 0;
                    }

                    // ปิดการเชื่อมต่อ
                    $conn->close();
                    ?>
                    <h4><?php echo $totalRows; ?></h4>
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
                            <h4>Monitor</h4>
                            <?php
                            include('../../../../system/database/DB_monitor.php');

                            $sql = "SELECT created_at FROM monitor_lists ORDER BY id DESC LIMIT 1"; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่ และ id ด้วยคอลัมน์ที่ใช้เป็น primary key
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // รับค่าผลลัพธ์
                                $row = $result->fetch_assoc();
                                $latestDate = $row["created_at"]; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่
                                // แปลงรูปแบบวันที่เป็นพุทธศักราช
                                $date = new DateTime($latestDate);
                                $year = $date->format('Y') + 543; // แปลงปีเป็นพุทธศักราช
                                $formattedDate = $date->format('d.m.') . $year;
                            } else {
                                $formattedDate = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $formattedDate; ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-primary">
                            <img src="../../../../assets/images/visa.png">
                        </div>
                        <div class="details">
                            <?php
                            include('../../../../system/database/DB_monitor.php');

                            // ดึงวันที่ล่าสุด
                            $sql_latest_date = "SELECT created_at FROM monitor_lists ORDER BY id DESC LIMIT 1";
                            $result_latest_date = $conn->query($sql_latest_date);

                            if ($result_latest_date->num_rows > 0) {
                                $row_latest_date = $result_latest_date->fetch_assoc();
                                $latestDate = $row_latest_date["created_at"];
                                // แปลงวันที่ให้เป็นรูปแบบ Y-m-d เพื่อใช้ในคำสั่ง SQL
                                $latestDateFormatted = date("Y-m-d", strtotime($latestDate));

                                // นับจำนวนแถวที่มีวันที่เป็นวันที่ล่าสุด
                                $sql_count = "SELECT COUNT(*) as total FROM monitor_lists WHERE DATE(created_at) = '$latestDateFormatted'";
                                $result_count = $conn->query($sql_count);

                                if ($result_count->num_rows > 0) {
                                    $row_count = $result_count->fetch_assoc();
                                    $totalRows = $row_count["total"];
                                } else {
                                    $totalRows = 0;
                                }
                            } else {
                                $totalRows = 0;
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $totalRows; ?> Mach
                            </p>

                            <?php
                            include('../../../../system/database/DB_monitor.php');

                            // ดึงข้อมูลเวลาจากฐานข้อมูล
                            $sql = "SELECT created_at FROM monitor_lists ORDER BY id DESC LIMIT 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $createdAt = $row["created_at"];

                                // แปลงเวลาให้เป็นรูปแบบ 12 ชั่วโมงพร้อม am/pm
                                $formattedTime = date('g:iA', strtotime($createdAt));
                                $formattedTime = strtolower($formattedTime); // แปลง AM/PM ให้เป็น am/pm
                            } else {
                                $formattedTime = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <small class="text-muted">
                                <?php echo $formattedTime; ?>
                            </small>
                        </div>
                    </div>

                    <?php
                    include('../../../../system/database/DB_monitor.php');
                    // การนับจำนวนแถวในตาราง
                    $sql = "SELECT COUNT(*) as total FROM monitor_lists";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // รับค่าผลลัพธ์
                        $row = $result->fetch_assoc();
                        $totalRows = $row["total"];
                    } else {
                        $totalRows = 0;
                    }

                    // ปิดการเชื่อมต่อ
                    $conn->close();
                    ?>
                    <h4>
                        <?php echo $totalRows; ?>
                    </h4>
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
                            <h4>Tablet</h4>
                            <?php
                            include('../../../../system/database/DB_tablet.php');

                            $sql = "SELECT created_at FROM tablet_lists ORDER BY id DESC LIMIT 1"; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่ และ id ด้วยคอลัมน์ที่ใช้เป็น primary key
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // รับค่าผลลัพธ์
                                $row = $result->fetch_assoc();
                                $latestDate = $row["created_at"]; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่
                                // แปลงรูปแบบวันที่เป็นพุทธศักราช
                                $date = new DateTime($latestDate);
                                $year = $date->format('Y') + 543; // แปลงปีเป็นพุทธศักราช
                                $formattedDate = $date->format('d.m.') . $year;
                            } else {
                                $formattedDate = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $formattedDate; ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-dark">
                            <img src="../../../../assets/images/master_card.png">
                        </div>
                        <div class="details">
                            <?php
                            include('../../../../system/database/DB_tablet.php');

                            // ดึงวันที่ล่าสุด
                            $sql_latest_date = "SELECT created_at FROM tablet_lists ORDER BY id DESC LIMIT 1";
                            $result_latest_date = $conn->query($sql_latest_date);

                            if ($result_latest_date->num_rows > 0) {
                                $row_latest_date = $result_latest_date->fetch_assoc();
                                $latestDate = $row_latest_date["created_at"];
                                // แปลงวันที่ให้เป็นรูปแบบ Y-m-d เพื่อใช้ในคำสั่ง SQL
                                $latestDateFormatted = date("Y-m-d", strtotime($latestDate));

                                // นับจำนวนแถวที่มีวันที่เป็นวันที่ล่าสุด
                                $sql_count = "SELECT COUNT(*) as total FROM tablet_lists WHERE DATE(created_at) = '$latestDateFormatted'";
                                $result_count = $conn->query($sql_count);

                                if ($result_count->num_rows > 0) {
                                    $row_count = $result_count->fetch_assoc();
                                    $totalRows = $row_count["total"];
                                } else {
                                    $totalRows = 0;
                                }
                            } else {
                                $totalRows = 0;
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $totalRows; ?> Mach
                            </p>

                            <?php
                            include('../../../../system/database/DB_tablet.php');

                            // ดึงข้อมูลเวลาจากฐานข้อมูล
                            $sql = "SELECT created_at FROM tablet_lists ORDER BY id DESC LIMIT 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $createdAt = $row["created_at"];

                                // แปลงเวลาให้เป็นรูปแบบ 12 ชั่วโมงพร้อม am/pm
                                $formattedTime = date('g:iA', strtotime($createdAt));
                                $formattedTime = strtolower($formattedTime); // แปลง AM/PM ให้เป็น am/pm
                            } else {
                                $formattedTime = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <small class="text-muted">
                                <?php echo $formattedTime; ?>
                            </small>
                        </div>
                    </div>

                    <?php
                    include('../../../../system/database/DB_tablet.php');
                    // การนับจำนวนแถวในตาราง
                    $sql = "SELECT COUNT(*) as total FROM tablet_lists";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // รับค่าผลลัพธ์
                        $row = $result->fetch_assoc();
                        $totalRows = $row["total"];
                    } else {
                        $totalRows = 0;
                    }

                    // ปิดการเชื่อมต่อ
                    $conn->close();
                    ?>
                    <h4>
                        <?php echo $totalRows; ?>
                    </h4>
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
                            <h4>Printer</h4>

                            <?php
                            include('../../../../system/database/DB_printer.php');

                            $sql = "SELECT created_at FROM printer_lists ORDER BY id DESC LIMIT 1"; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่ และ id ด้วยคอลัมน์ที่ใช้เป็น primary key
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // รับค่าผลลัพธ์
                                $row = $result->fetch_assoc();
                                $latestDate = $row["created_at"]; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่
                                // แปลงรูปแบบวันที่เป็นพุทธศักราช
                                $date = new DateTime($latestDate);
                                $year = $date->format('Y') + 543; // แปลงปีเป็นพุทธศักราช
                                $formattedDate = $date->format('d.m.') . $year;
                            } else {
                                $formattedDate = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $formattedDate; ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="../../../../assets/images/visa.png">
                        </div>
                        <div class="details">
                            <?php
                            include('../../../../system/database/DB_printer.php');

                            // ดึงวันที่ล่าสุด
                            $sql_latest_date = "SELECT created_at FROM printer_lists ORDER BY id DESC LIMIT 1";
                            $result_latest_date = $conn->query($sql_latest_date);

                            if ($result_latest_date->num_rows > 0) {
                                $row_latest_date = $result_latest_date->fetch_assoc();
                                $latestDate = $row_latest_date["created_at"];
                                // แปลงวันที่ให้เป็นรูปแบบ Y-m-d เพื่อใช้ในคำสั่ง SQL
                                $latestDateFormatted = date("Y-m-d", strtotime($latestDate));

                                // นับจำนวนแถวที่มีวันที่เป็นวันที่ล่าสุด
                                $sql_count = "SELECT COUNT(*) as total FROM printer_lists WHERE DATE(created_at) = '$latestDateFormatted'";
                                $result_count = $conn->query($sql_count);

                                if ($result_count->num_rows > 0) {
                                    $row_count = $result_count->fetch_assoc();
                                    $totalRows = $row_count["total"];
                                } else {
                                    $totalRows = 0;
                                }
                            } else {
                                $totalRows = 0;
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $totalRows; ?> Mach
                            </p>

                            <?php
                            include('../../../../system/database/DB_printer.php');

                            // ดึงข้อมูลเวลาจากฐานข้อมูล
                            $sql = "SELECT created_at FROM printer_lists ORDER BY id DESC LIMIT 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $createdAt = $row["created_at"];

                                // แปลงเวลาให้เป็นรูปแบบ 12 ชั่วโมงพร้อม am/pm
                                $formattedTime = date('g:iA', strtotime($createdAt));
                                $formattedTime = strtolower($formattedTime); // แปลง AM/PM ให้เป็น am/pm
                            } else {
                                $formattedTime = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <small class="text-muted">
                                <?php echo $formattedTime; ?>
                            </small>
                        </div>
                    </div>

                    <?php
                    include('../../../../system/database/DB_printer.php');
                    // การนับจำนวนแถวในตาราง
                    $sql = "SELECT COUNT(*) as total FROM printer_lists";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // รับค่าผลลัพธ์
                        $row = $result->fetch_assoc();
                        $totalRows = $row["total"];
                    } else {
                        $totalRows = 0;
                    }

                    // ปิดการเชื่อมต่อ
                    $conn->close();
                    ?>
                    <h4>
                        <?php echo $totalRows; ?>
                    </h4>
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
                            <h4>Scanner</h4>

                            <?php
                            include('../../../../system/database/DB_scanner.php');

                            $sql = "SELECT created_at FROM scanner_lists ORDER BY id DESC LIMIT 1"; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่ และ id ด้วยคอลัมน์ที่ใช้เป็น primary key
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // รับค่าผลลัพธ์
                                $row = $result->fetch_assoc();
                                $latestDate = $row["created_at"]; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่
                                // แปลงรูปแบบวันที่เป็นพุทธศักราช
                                $date = new DateTime($latestDate);
                                $year = $date->format('Y') + 543; // แปลงปีเป็นพุทธศักราช
                                $formattedDate = $date->format('d.m.') . $year;
                            } else {
                                $formattedDate = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $formattedDate; ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-primary">
                            <img src="../../../../assets/images/visa.png">
                        </div>
                        <div class="details">

                            <?php
                            include('../../../../system/database/DB_scanner.php');

                            // ดึงวันที่ล่าสุด
                            $sql_latest_date = "SELECT created_at FROM scanner_lists ORDER BY id DESC LIMIT 1";
                            $result_latest_date = $conn->query($sql_latest_date);

                            if ($result_latest_date->num_rows > 0) {
                                $row_latest_date = $result_latest_date->fetch_assoc();
                                $latestDate = $row_latest_date["created_at"];
                                // แปลงวันที่ให้เป็นรูปแบบ Y-m-d เพื่อใช้ในคำสั่ง SQL
                                $latestDateFormatted = date("Y-m-d", strtotime($latestDate));

                                // นับจำนวนแถวที่มีวันที่เป็นวันที่ล่าสุด
                                $sql_count = "SELECT COUNT(*) as total FROM scanner_lists WHERE DATE(created_at) = '$latestDateFormatted'";
                                $result_count = $conn->query($sql_count);

                                if ($result_count->num_rows > 0) {
                                    $row_count = $result_count->fetch_assoc();
                                    $totalRows = $row_count["total"];
                                } else {
                                    $totalRows = 0;
                                }
                            } else {
                                $totalRows = 0;
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $totalRows; ?> Mach
                            </p>

                            <?php
                            include('../../../../system/database/DB_scanner.php');

                            // ดึงข้อมูลเวลาจากฐานข้อมูล
                            $sql = "SELECT created_at FROM scanner_lists ORDER BY id DESC LIMIT 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $createdAt = $row["created_at"];

                                // แปลงเวลาให้เป็นรูปแบบ 12 ชั่วโมงพร้อม am/pm
                                $formattedTime = date('g:iA', strtotime($createdAt));
                                $formattedTime = strtolower($formattedTime); // แปลง AM/PM ให้เป็น am/pm
                            } else {
                                $formattedTime = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <small class="text-muted">
                                <?php echo $formattedTime; ?>
                            </small>
                        </div>
                    </div>

                    <?php
                    include('../../../../system/database/DB_scanner.php');
                    // การนับจำนวนแถวในตาราง
                    $sql = "SELECT COUNT(*) as total FROM scanner_lists";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // รับค่าผลลัพธ์
                        $row = $result->fetch_assoc();
                        $totalRows = $row["total"];
                    } else {
                        $totalRows = 0;
                    }

                    // ปิดการเชื่อมต่อ
                    $conn->close();
                    ?>
                    <h4>
                        <?php echo $totalRows; ?>
                    </h4>
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
                            <h4>UPS</h4>

                            <?php
                            include('../../../../system/database/DB_ups.php');

                            $sql = "SELECT created_at FROM ups_lists ORDER BY id DESC LIMIT 1"; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่ และ id ด้วยคอลัมน์ที่ใช้เป็น primary key
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // รับค่าผลลัพธ์
                                $row = $result->fetch_assoc();
                                $latestDate = $row["created_at"]; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่
                                // แปลงรูปแบบวันที่เป็นพุทธศักราช
                                $date = new DateTime($latestDate);
                                $year = $date->format('Y') + 543; // แปลงปีเป็นพุทธศักราช
                                $formattedDate = $date->format('d.m.') . $year;
                            } else {
                                $formattedDate = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $formattedDate; ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-primary">
                            <img src="../../../../assets/images/visa.png">
                        </div>
                        <div class="details">
                            <?php
                            include('../../../../system/database/DB_ups.php');

                            // ดึงวันที่ล่าสุด
                            $sql_latest_date = "SELECT created_at FROM ups_lists ORDER BY id DESC LIMIT 1";
                            $result_latest_date = $conn->query($sql_latest_date);

                            if ($result_latest_date->num_rows > 0) {
                                $row_latest_date = $result_latest_date->fetch_assoc();
                                $latestDate = $row_latest_date["created_at"];
                                // แปลงวันที่ให้เป็นรูปแบบ Y-m-d เพื่อใช้ในคำสั่ง SQL
                                $latestDateFormatted = date("Y-m-d", strtotime($latestDate));

                                // นับจำนวนแถวที่มีวันที่เป็นวันที่ล่าสุด
                                $sql_count = "SELECT COUNT(*) as total FROM ups_lists WHERE DATE(created_at) = '$latestDateFormatted'";
                                $result_count = $conn->query($sql_count);

                                if ($result_count->num_rows > 0) {
                                    $row_count = $result_count->fetch_assoc();
                                    $totalRows = $row_count["total"];
                                } else {
                                    $totalRows = 0;
                                }
                            } else {
                                $totalRows = 0;
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $totalRows; ?> Mach
                            </p>

                            <?php
                            include('../../../../system/database/DB_ups.php');

                            // ดึงข้อมูลเวลาจากฐานข้อมูล
                            $sql = "SELECT created_at FROM ups_lists ORDER BY id DESC LIMIT 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $createdAt = $row["created_at"];

                                // แปลงเวลาให้เป็นรูปแบบ 12 ชั่วโมงพร้อม am/pm
                                $formattedTime = date('g:iA', strtotime($createdAt));
                                $formattedTime = strtolower($formattedTime); // แปลง AM/PM ให้เป็น am/pm
                            } else {
                                $formattedTime = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <small class="text-muted">
                                <?php echo $formattedTime; ?>
                            </small>
                        </div>
                    </div>

                    <?php
                    include('../../../../system/database/DB_ups.php');
                    // การนับจำนวนแถวในตาราง
                    $sql = "SELECT COUNT(*) as total FROM ups_lists";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // รับค่าผลลัพธ์
                        $row = $result->fetch_assoc();
                        $totalRows = $row["total"];
                    } else {
                        $totalRows = 0;
                    }

                    // ปิดการเชื่อมต่อ
                    $conn->close();
                    ?>
                    <h4>
                        <?php echo $totalRows; ?>
                    </h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->
            </div>
            <!-------------------------- END OF TRANSACTIONS -------------------------->
        </section>
        <!---------------------------------------- END OF RIGHT ---------------------------------------->
    </main>
    <!--================================== END OF ASIDE ==================================-->



    <script src="../../../../assets/js/serial_number.js"></script>
    <script src="../../../../assets/js/year_equipment.js"></script>


    <script src="../../../../assets/js/connect_list.js"></script>

    <script src="../../../../assets/js/monitor/db_monitor.js"></script>


</body>

</html>