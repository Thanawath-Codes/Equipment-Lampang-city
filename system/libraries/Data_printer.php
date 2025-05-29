<?php
// เชื่อมต่อฐานข้อมูล
require_once '../../system/database/DB_printer.php';

// รับค่าจาก GET
$serial_number = $_GET['serial_number'] ?? '';
$year_equipment = $_GET['year_equipment'] ?? '';
$printer_brand = $_GET['printer_brand'] ?? '';
$printer_model = $_GET['printer_model'] ?? '';
$printer_type = $_GET['printer_type'] ?? '';
$printer_kind = $_GET['printer_kind'] ?? '';
$connecting_printer = $_POST['connecting_printer'] ?? '';
$color_printing = $_POST['color_printing'] ?? '';
$paper_size_printing = $_POST['paper_size_printing'] ?? '';
$status_equipment = $_GET['status_equipment'] ?? '';
$department = $_GET['department'] ?? '';
$segment = $_GET['segment'] ?? '';
$division = $_GET['division'] ?? '';
$working = $_GET['working'] ?? '';
$owner_printer = $_GET['owner_printer'] ?? '';

$where = [];

if (!empty($serial_number)) {
    $where[] = "pl.serial_number LIKE '%" . mysqli_real_escape_string($conn, $serial_number) . "%'";
}
if (!empty($year_equipment)) {
    $where[] = "pl.year_equipment = '" . mysqli_real_escape_string($conn, $year_equipment) . "'";
}
if (!empty($printer_brand)) {
    $where[] = "pl.printer_brand = '" . mysqli_real_escape_string($conn, $printer_brand) . "'";
}
if (!empty($printer_model)) {
    $where[] = "pl.printer_model = '" . mysqli_real_escape_string($conn, $printer_model) . "'";
}
if (!empty($printer_type)) {
    $where[] = "pl.printer_type = '" . mysqli_real_escape_string($conn, $printer_type) . "'";
}
if (!empty($printer_kind)) {
    $where[] = "pl.printer_kind = '" . mysqli_real_escape_string($conn, $printer_kind) . "'";
}
if (!empty($connecting_printer)) {
    $where[] = "pl.connecting_printer = '" . mysqli_real_escape_string($conn, $connecting_printer) . "'";
}
if (!empty($color_printing)) {
    $where[] = "pl.color_printing = '" . mysqli_real_escape_string($conn, $color_printing) . "'";
}
if (!empty($paper_size_printing)) {
    $where[] = "pl.paper_size_printing = '" . mysqli_real_escape_string($conn, $paper_size_printing) . "'";
}

if (!empty($status_equipment)) {
    $where[] = "pl.status_equipment = '" . mysqli_real_escape_string($conn, $status_equipment) . "'";
}
if (!empty($department)) {
    $where[] = "pl.department = '" . mysqli_real_escape_string($conn, $department) . "'";
}
if (!empty($segment)) {
    $where[] = "pl.segment = '" . mysqli_real_escape_string($conn, $segment) . "'";
}
if (!empty($division)) {
    $where[] = "pl.division = '" . mysqli_real_escape_string($conn, $division) . "'";
}
if (!empty($working)) {
    $where[] = "pl.working = '" . mysqli_real_escape_string($conn, $working) . "'";
}
if (!empty($owner_printer)) {
    $where[] = "pl.owner_printer LIKE '%" . mysqli_real_escape_string($conn, $owner_printer) . "%'";
}

$sql = "SELECT pl.id, pl.serial_number, pl.year_equipment,
        pb.name AS printer_brand_name, pm.name AS printer_model_name, 
        pt.name AS printer_type_name, pk.name AS printer_kind_name,
        cn.name AS connecting_printer_name, cl.name AS color_printing_name,
        ps.name AS paper_size_printing_name,
        st.name AS status_equipment_name, d.name AS department_name, 
        s.name AS segment_name, v.name AS division_name, 
        w.name AS working_name, pl.owner_printer, pl.created_at
        FROM `printer_lists` AS pl
        LEFT JOIN `printer_brands` AS pb ON pl.printer_brand = pb.id
        LEFT JOIN `printer_models` AS pm ON pl.printer_model = pm.id
        LEFT JOIN `printer_types` AS pt ON pl.printer_type = pt.id
        LEFT JOIN `printer_kinds` AS pk ON pl.printer_kind = pk.id
        LEFT JOIN `connecting_printers` AS cn ON pl.connecting_printer = cn.id
        LEFT JOIN `color_printings` AS cl ON pl.color_printing = cl.id
        LEFT JOIN `paper_size_printings` AS ps ON pl.paper_size_printing = ps.id
        LEFT JOIN `status_equipments` AS st ON pl.status_equipment = st.id
        LEFT JOIN `departments` AS d ON pl.department = d.id
        LEFT JOIN `segments` AS s ON pl.segment = s.id
        LEFT JOIN `divisions` AS v ON pl.division = v.id
        LEFT JOIN `workings` AS w ON pl.working = w.id";

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
    <title>EQUIP | Data Equipment Printer.</title>
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
                <a href="../../application/controllers/admin/Equip_printer.php">
                    <span class="material-icons-sharp primary">
                        print
                    </span>
                    <h4>ปริ้นเตอร์</h4>
                </a>
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
    'serial_number' => 'เลขครุภัณฑ์',
    'year_equipment' => 'ปีงบประมาณ',
    'printer_brand' => 'แบรนด์',
    'printer_model' => 'รุ่น/โมเดล',
    'printer_type' => 'ประเภท',
    'printer_kind' => 'ชนิด',
    'connecting_printer' => 'การเชื่อมต่อ',
    'color_printing' => 'สี',
    'paper_size_printing' => 'ขนาดกระดาษ',
    'status_equipment' => 'สถานะ',
    'department' => 'กอง/สำนัก',
    'segment' => 'ส่วน',
    'division' => 'ฝ่าย',
    'working' => 'งาน',
    'owner_ups' => 'ผู้ใช้งาน',
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
            case 'printer_brand':
                $displayValue = getNameById($conn, 'printer_brands', $value);
                break;
            case 'printer_model':
                $displayValue = getNameById($conn, 'printer_models', $value);
                break;
            case 'printer_type':
                $displayValue = getNameById($conn, 'printer_types', $value);
                break;
            case 'printer_kind':
                $displayValue = getNameById($conn, 'printer_kinds', $value);
                break;
            case 'connecting_printer':
                $displayValue = getNameById($conn, 'connecting_printers', $value);
                break;
            case 'color_printing':
                $displayValue = getNameById($conn, 'color_printings', $value);
                break;
            case 'paper_size_printing':
                $displayValue = getNameById($conn, 'paper_size_printings', $value);
                break;
            case 'status_equipment':
                $displayValue = getNameById($conn, 'status_equipments', $value);
                break;
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

                  
                <a href="../../application/controllers/admin/search/Search_printer.php">ค้นหาข้อมูล</a>     
            </div>
        </aside>
        <!------------------- END OF ASIDE ------------------->
        <section class="middle">
            
            <div class="wrapper">
                <div class="btns">
                    <a href="../../application/controllers/admin/add/Add_printer.php">เพิ่มข้อมูลผู้ใช้งาน</a>
                    <a href="../database/download/export_printer.php">ดาวน์โหลดข้อมูล</a>
                </div>
            </div>
            <div class="content_wrapper">
    <div id="ups_list_container" class="data_equipment_printer">
        <div class="table_equipment_printer">
            <table>
                <thead>
                    <tr>
                    <th>ลำดับ</th>
                                    <th>เลขครุภัณฑ์</th>
                                    <th>ปีงบประมาณ</th>
                                    <th>แบรนด์</th>
                                    <th>รุ่น/โมเดล</th>
                                    <th>ประเภท</th>
                                    <th>ชนิด</th>
                                    <th>การเชื่อมต่อ</th>
                                    <th>สี</th>
                                    <th>ขนาดกระดาษ</th>
                                    <th>สถานะครุภัณฑ์</th>
                                    <th>กอง/สำนัก</th>
                                    <th>ส่วน</th>
                                    <th>ฝ่าย</th>
                                    <th>งาน</th>
                                    <th>ผู้ใช้งานครุภัณฑ์</th>
                                    <th>วันที่และเวลา</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['serial_number']}</td>
                                <td>{$row['year_equipment']}</td>
                                <td>{$row['printer_brand_name']}</td>
                                <td>{$row['printer_model_name']}</td>
                                <td>{$row['printer_type_name']}</td>
                                <td>{$row['printer_kind_name']}</td>
                                <td>{$row['connecting_printer_name']}</td>
                                <td>{$row['color_printing_name']}</td>
                                <td>{$row['paper_size_printing_name']}</td>
                                <td>{$row['status_equipment_name']}</td>
                                <td>{$row['department_name']}</td>
                                <td>{$row['segment_name']}</td>
                                <td>{$row['division_name']}</td>
                                <td>{$row['working_name']}</td>
                                <td>{$row['owner_printer']}</td>
                                <td>{$row['created_at']}</td>
                                <td><a href='/Equipment-Lampang-city//application/controllers/admin/update/Update_printer.php?id=" . $row['id'] . "'>
                                    <span class='material-icons-sharp'>drive_file_rename_outline</span>
                                </a></td>
                                <td><a href='delete_printer.php?id=" . $row['id'] . "'>
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
        

        <!-- END OF MIDDLE -->
        <section class="right">
            <div class="investments">
                <div class="header">
                    <h2>แบรนด์เครื่องพิมพ์เอกสาร</h2>
                    <a href="../../application/controllers/admin/search/Search_printer.php">เพิ่มเติม<span class="material-icons-sharp">
                            chevron_right
                        </span></a>
                </div>

                <div class="investment">
                    <img src="../../assets/images/icon-hp.svg">
                    <h4>HP</h4>
                    <div class="date-time">
                        <p>
                            <?php
                            include('../database/DB_printer.php');

                            // สร้าง query
                            $sql = "
                          SELECT 
                              printer_brands.name,
                              MAX(printer_lists.created_at) AS latest_date
                          FROM 
                              printer_lists
                          JOIN 
                              printer_brands ON printer_lists.printer_brand = printer_brands.id
                          WHERE 
                              printer_brands.name = 'HP'
                          GROUP BY 
                              printer_brands.name
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
                            include('../database/DB_printer.php');

                            // สร้าง query
                            $sql = "
                        SELECT 
                            printer_brands.name,
                            MAX(printer_lists.created_at) AS latest_date
                        FROM 
                            printer_lists
                        JOIN 
                            printer_brands ON printer_lists.printer_brand = printer_brands.id
                        WHERE 
                            printer_brands.name = 'HP'
                        GROUP BY 
                            printer_brands.name
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

                        include('../database/DB_printer.php');

                        // SQL Query
                        $sql = "
    SELECT pm.name 
    FROM printer_lists pl
    JOIN printer_models pm ON pl.printer_model = pm.id
    JOIN printer_brands pb ON pl.printer_brand = pb.id
    WHERE pb.name = 'HP'
    ORDER BY pl.created_at DESC -- เรียงวันที่จากล่าสุดไปเก่าสุด
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
                        include('../database/DB_printer.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM printer_lists pl
            JOIN printer_brands pb ON pl.printer_brand = pb.id
            WHERE pb.name = 'HP'
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
                        include('../database/DB_printer.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล WINDOWS 10
                        $sql_date = "
                  SELECT DATE(MAX(pl.created_at)) AS latest_date
                  FROM printer_lists pl
                  JOIN printer_brands pb ON pl.printer_brand = pb.id
                  WHERE pb.name = 'HP'
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
                    FROM printer_lists pl
                    JOIN printer_brands pb ON pl.printer_brand = pb.id
                    WHERE pb.name = 'HP' AND DATE(pl.created_at) = '$latest_date'
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
                    <img src="../../assets/images/icon-acer.svg">
                    <h4>BROTHER</h4>
                    <div class="date-time">
                        <p>
                            <?php
                            include('../database/DB_printer.php');

                            // สร้าง query
                            $sql = "
                          SELECT 
                              printer_brands.name,
                              MAX(printer_lists.created_at) AS latest_date
                          FROM 
                              printer_lists
                          JOIN 
                              printer_brands ON printer_lists.printer_brand = printer_brands.id
                          WHERE 
                              printer_brands.name = 'BROTHER'
                          GROUP BY 
                              printer_brands.name
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
                            include('../database/DB_printer.php');

                            // สร้าง query
                            $sql = "
                        SELECT 
                            printer_brands.name,
                            MAX(printer_lists.created_at) AS latest_date
                        FROM 
                            printer_lists
                        JOIN 
                            printer_brands ON printer_lists.printer_brand = printer_brands.id
                        WHERE 
                            printer_brands.name = 'BROTHER'
                        GROUP BY 
                            printer_brands.name
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

                        include('../database/DB_printer.php');

                        // SQL Query
                        $sql = "
    SELECT pm.name 
    FROM printer_lists pl
    JOIN printer_models pm ON pl.printer_model = pm.id
    JOIN printer_brands pb ON pl.printer_brand = pb.id
    WHERE pb.name = 'BROTHER'
    ORDER BY pl.created_at DESC -- เรียงวันที่จากล่าสุดไปเก่าสุด
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
                        include('../database/DB_printer.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM printer_lists pl
            JOIN printer_brands pb ON pl.printer_brand = pb.id
            WHERE pb.name = 'BROTHER'
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
                        include('../database/DB_printer.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล WINDOWS 10
                        $sql_date = "
                  SELECT DATE(MAX(pl.created_at)) AS latest_date
                  FROM printer_lists pl
                  JOIN printer_brands pb ON pl.printer_brand = pb.id
                  WHERE pb.name = 'BROTHER'
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
                    FROM printer_lists pl
                    JOIN printer_brands pb ON pl.printer_brand = pb.id
                    WHERE pb.name = 'BROTHER' AND DATE(pl.created_at) = '$latest_date'
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
                    <img src="../../assets/images/icon-aoc.svg">
                    <h4>CANON</h4>
                    <div class="date-time">
                        <p>
                            <?php
                            include('../database/DB_printer.php');

                            // สร้าง query
                            $sql = "
                          SELECT 
                              printer_brands.name,
                              MAX(printer_lists.created_at) AS latest_date
                          FROM 
                              printer_lists
                          JOIN 
                              printer_brands ON printer_lists.printer_brand = printer_brands.id
                          WHERE 
                              printer_brands.name = 'CANON'
                          GROUP BY 
                              printer_brands.name
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
                            include('../database/DB_printer.php');

                            // สร้าง query
                            $sql = "
                        SELECT 
                            printer_brands.name,
                            MAX(printer_lists.created_at) AS latest_date
                        FROM 
                            printer_lists
                        JOIN 
                            printer_brands ON printer_lists.printer_brand = printer_brands.id
                        WHERE 
                            printer_brands.name = 'CANON'
                        GROUP BY 
                            printer_brands.name
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

                        include('../database/DB_printer.php');

                        // SQL Query
                        $sql = "
    SELECT pm.name 
    FROM printer_lists pl
    JOIN printer_models pm ON pl.printer_model = pm.id
    JOIN printer_brands pb ON pl.printer_brand = pb.id
    WHERE pb.name = 'CANON'
    ORDER BY pl.created_at DESC -- เรียงวันที่จากล่าสุดไปเก่าสุด
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
                        include('../database/DB_printer.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM printer_lists pl
            JOIN printer_brands pb ON pl.printer_brand = pb.id
            WHERE pb.name = 'CANON'
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
                        include('../database/DB_printer.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล WINDOWS 10
                        $sql_date = "
                  SELECT DATE(MAX(pl.created_at)) AS latest_date
                  FROM printer_lists pl
                  JOIN printer_brands pb ON pl.printer_brand = pb.id
                  WHERE pb.name = 'CANON'
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
                    FROM printer_lists pl
                    JOIN printer_brands pb ON pl.printer_brand = pb.id
                    WHERE pb.name = 'CANON' AND DATE(pl.created_at) = '$latest_date'
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
                    <img src="../../assets/images/icon-benq.svg">
                    <h4>EPSON</h4>
                    <div class="date-time">
                        <p>
                            <?php
                            include('../database/DB_printer.php');

                            // สร้าง query
                            $sql = "
                          SELECT 
                              printer_brands.name,
                              MAX(printer_lists.created_at) AS latest_date
                          FROM 
                              printer_lists
                          JOIN 
                              printer_brands ON printer_lists.printer_brand = printer_brands.id
                          WHERE 
                              printer_brands.name = 'EPSON'
                          GROUP BY 
                              printer_brands.name
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
                            include('../database/DB_printer.php');

                            // สร้าง query
                            $sql = "
                        SELECT 
                            printer_brands.name,
                            MAX(printer_lists.created_at) AS latest_date
                        FROM 
                            printer_lists
                        JOIN 
                            printer_brands ON printer_lists.printer_brand = printer_brands.id
                        WHERE 
                            printer_brands.name = 'EPSON'
                        GROUP BY 
                            printer_brands.name
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

                        include('../database/DB_printer.php');

                        // SQL Query
                        $sql = "
    SELECT pm.name 
    FROM printer_lists pl
    JOIN printer_models pm ON pl.printer_model = pm.id
    JOIN printer_brands pb ON pl.printer_brand = pb.id
    WHERE pb.name = 'EPSON'
    ORDER BY pl.created_at DESC -- เรียงวันที่จากล่าสุดไปเก่าสุด
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
                        include('../database/DB_printer.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM printer_lists pl
            JOIN printer_brands pb ON pl.printer_brand = pb.id
            WHERE pb.name = 'EPSON'
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
                        include('../database/DB_printer.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล WINDOWS 10
                        $sql_date = "
                  SELECT DATE(MAX(pl.created_at)) AS latest_date
                  FROM printer_lists pl
                  JOIN printer_brands pb ON pl.printer_brand = pb.id
                  WHERE pb.name = 'EPSON'
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
                    FROM printer_lists pl
                    JOIN printer_brands pb ON pl.printer_brand = pb.id
                    WHERE pb.name = 'EPSON' AND DATE(pl.created_at) = '$latest_date'
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
                    <a href="../../application/controllers/user/Dashboard.php">เพิ่มเติม<span class="material-icons-sharp">
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
                            include('../database/DB_computer.php');

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
                            <img src="../../assets/images/visa.png">
                        </div>
                        <div class="details">
                            <?php
                            include('../database/DB_computer.php');

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
                            include('../database/DB_computer.php');

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
                    include('../database/DB_computer.php');
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
                            include('../database/DB_monitor.php');

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
                            <img src="../../assets/images/visa.png">
                        </div>
                        <div class="details">
                            <?php
                            include('../database/DB_monitor.php');

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
                            include('../database/DB_monitor.php');

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
                    include('../database/DB_monitor.php');
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
                            include('../database/DB_tablet.php');

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
                            <img src="../../assets/images/master_card.png">
                        </div>
                        <div class="details">
                            <?php
                            include('../database/DB_tablet.php');

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
                            include('../database/DB_tablet.php');

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
                    include('../database/DB_tablet.php');
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
                            include('../database/DB_printer.php');

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
                            <img src="../../assets/images/visa.png">
                        </div>
                        <div class="details">
                            <?php
                            include('../database/DB_printer.php');

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
                            include('../database/DB_printer.php');

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
                    include('../database/DB_printer.php');
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
                            include('../database/DB_scanner.php');

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
                            <img src="../../assets/images/visa.png">
                        </div>
                        <div class="details">

                            <?php
                            include('../database/DB_scanner.php');

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
                            include('../database/DB_scanner.php');

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
                    include('../database/DB_scanner.php');
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
                            include('../database/DB_ups.php');

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
                            <img src="../../assets/images/visa.png">
                        </div>
                        <div class="details">
                            <?php
                            include('../database/DB_ups.php');

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
                            include('../database/DB_ups.php');

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
                    include('../database/DB_ups.php');
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

    <script src="../../assets/js/btn_wrapper.js"></script>


</body>

</html>