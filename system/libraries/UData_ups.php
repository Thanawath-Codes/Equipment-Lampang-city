<?php
// เชื่อมต่อฐานข้อมูล
require_once '../../system/database/DB_ups.php';

// รับค่าจาก GET
$serial_number = $_GET['serial_number'] ?? '';
$year_equipment = $_GET['year_equipment'] ?? '';
$ups_brand = $_GET['ups_brand'] ?? '';
$ups_model = $_GET['ups_model'] ?? '';
$electrical_capacity = $_GET['electrical_capacity'] ?? '';
$status_equipment = $_GET['status_equipment'] ?? '';
$department = $_GET['department'] ?? '';
$segment = $_GET['segment'] ?? '';
$division = $_GET['division'] ?? '';
$working = $_GET['working'] ?? '';
$owner_scanner = $_GET['owner_scanner'] ?? '';


$where = [];

if (!empty($serial_number)) {
    $where[] = "ul.serial_number LIKE '%" . mysqli_real_escape_string($conn, $serial_number) . "%'";
}
if (!empty($year_equipment)) {
    $where[] = "ul.year_equipment = '" . mysqli_real_escape_string($conn, $year_equipment) . "'";
}
if (!empty($ups_brand)) {
    $where[] = "ul.ups_brand = '" . mysqli_real_escape_string($conn, $ups_brand) . "'";
}
if (!empty($ups_model)) {
    $where[] = "ul.ups_model = '" . mysqli_real_escape_string($conn, $ups_model) . "'";
}
if (!empty($electrical_capacity)) {
    $where[] = "ul.electrical_capacity = '" . mysqli_real_escape_string($conn, $electrical_capacity) . "'";
}
if (!empty($status_equipment)) {
    $where[] = "ul.status_equipment = '" . mysqli_real_escape_string($conn, $status_equipment) . "'";
}
if (!empty($department)) {
    $where[] = "ul.department = '" . mysqli_real_escape_string($conn, $department) . "'";
}
if (!empty($segment)) {
    $where[] = "ul.segment = '" . mysqli_real_escape_string($conn, $segment) . "'";
}
if (!empty($division)) {
    $where[] = "ul.division = '" . mysqli_real_escape_string($conn, $division) . "'";
}
if (!empty($working)) {
    $where[] = "ul.working = '" . mysqli_real_escape_string($conn, $working) . "'";
}
if (!empty($owner_ups)) {
    $where[] = "ul.owner_ups LIKE '%" . mysqli_real_escape_string($conn, $owner_ups) . "%'";
}

$sql = "SELECT ul.id, ul.serial_number, ul.year_equipment,
        ub.name AS ups_brand_name, um.name AS ups_model_name, 
        el.name AS electrical_capacity_name, st.name AS status_equipment_name,
        d.name AS department_name, s.name AS segment_name, v.name AS division_name, 
        w.name AS working_name, ul.owner_ups, ul.created_at
        FROM `ups_lists` AS ul
        LEFT JOIN `ups_brands` AS ub ON ul.ups_brand = ub.id
        LEFT JOIN `ups_models` AS um ON ul.ups_model = um.id
        LEFT JOIN `electrical_capacitys` AS el ON ul.electrical_capacity = el.id
        LEFT JOIN `status_equipments` AS st ON ul.status_equipment = st.id
        LEFT JOIN `departments` AS d ON ul.department = d.id
        LEFT JOIN `segments` AS s ON ul.segment = s.id
        LEFT JOIN `divisions` AS v ON ul.division = v.id
        LEFT JOIN `workings` AS w ON ul.working = w.id";

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
    <title>EQUIP | Data Equipment Ups.</title>
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
                <a href="../../application/controllers/user/Dashboard.php" class="active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h4>แผงควบคุม</h4>
                </a>
                <a href="../../application/controllers/user/Equip_ups.php">
                    <span class="material-icons-sharp primary">
                        charging_station
                    </span>
                    <h4>เครื่องสำรองไฟ</h4>
                </a>
                <a href="../../application/controllers/user/Equip_computer.php">
                    <span class="material-icons-sharp">
                        screenshot_monitor
                    </span>
                    <h4>คอมพิวเตอร์</h4>
                </a>
                <a href="../../application/controllers/user/Equip_monitor.php">
                    <span class="material-icons-sharp">
                        laptop_chromebook
                    </span>
                    <h4>จอคอมพิวเตอร์</h4>
                </a>
                <a href="../../application/controllers/user/Equip_tablet.php">
                    <span class="material-icons-sharp">
                        tablet_mac
                    </span>
                    <h4>แท็บเล็ต</h4>
                </a>
                <a href="../../application/controllers/user/Equip_printer.php">
                    <span class="material-icons-sharp">
                        print
                    </span>
                    <h4>ปริ้นเตอร์</h4>
                </a>
                <a href="../../application/controllers/user/Equip_scanner.php">
                    <span class="material-icons-sharp">
                        document_scanner
                    </span>
                    <h4>สแกนเนอร์</h4>
                </a>
                <a href="../../application/controllers/user/account/Profile.php">
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
    'ups_brand' => 'แบรนด์',
    'ups_model' => 'รุ่น/โมเดล',
    'electrical_capacity' => 'ความจุไฟฟ้า',
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
            case 'ups_brand':
                $displayValue = getNameById($conn, 'ups_brands', $value);
                break;
            case 'ups_model':
                $displayValue = getNameById($conn, 'ups_models', $value);
                break;
            case 'electrical_capacity':
                $displayValue = getNameById($conn, 'electrical_capacitys', $value);
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

                  
                <a href="../../application/controllers/user/search/Search_ups.php">ค้นหาข้อมูล</a>     
            </div>
        </aside>
        <!------------------- END OF ASIDE ------------------->
        <section class="middle">
            
            <div class="wrapper">
                <div class="btns">
                    <a href="../../application/controllers/user/add/Add_ups.php">เพิ่มข้อมูลผู้ใช้งาน</a>
                    <a href="../database/download/export_ups.php">ดาวน์โหลดข้อมูล</a>
                </div>
            </div>
            <div class="content_wrapper">
    <div id="ups_list_container" class="data_equipment_ups">
        <div class="table_equipment_ups">
            <table>
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>เลขครุภัณฑ์</th>
                        <th>ปีงบประมาณ</th>
                        <th>แบรนด์</th>
                        <th>รุ่น/โมเดล</th>
                        <th>ความจุไฟฟ้า</th>
                        <th>สถานะครุภัณฑ์</th>
                        <th>กอง/สำนัก</th>
                        <th>ส่วน</th>
                        <th>ฝ่าย</th>
                        <th>งาน</th>
                        <th>ผู้ใช้งาน</th>
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
                                <td>{$row['serial_number']}</td>
                                <td>{$row['year_equipment']}</td>
                                <td>{$row['ups_brand_name']}</td>
                                <td>{$row['ups_model_name']}</td>
                                <td>{$row['electrical_capacity_name']}</td>
                                <td>{$row['status_equipment_name']}</td>
                                <td>{$row['department_name']}</td>
                                <td>{$row['segment_name']}</td>
                                <td>{$row['division_name']}</td>
                                <td>{$row['working_name']}</td>
                                <td>{$row['owner_ups']}</td>
                                <td>{$row['created_at']}</td>
                                <td><a href='/Equipment-Lampang-city//application/controllers/admin/update/Update_ups.php?id=" . $row['id'] . "'>
                                    <span class='material-icons-sharp'>drive_file_rename_outline</span>
                                </a></td>
                                <td><a href='delete_ups.php?id=" . $row['id'] . "'>
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
                    <h2>แบรนด์เครื่องสำรองไฟ</h2>
                    <a href="../../application/controllers/user/search/Search_ups.php">เพิ่มเติม<span class="material-icons-sharp">
                            chevron_right
                        </span></a>
                </div>

                <div class="investment">
                    <img src="../../assets/images/icon-zircon.png">
                    <h4>ZIRCON</h4>
                    <div class="date-time">
                        <p>
                            Ups
                        </p>
                        <small class="text-muted">
                            Lampang city
                        </small>
                    </div>
                    <div class="bonds">
                        <p>Model</p>
                        <small class="text-muted">Standard</small>
                    </div>
                    <div class="amount">
                        <?php
                        include('../../system/database/DB_ups.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM ups_lists ul
            JOIN ups_brands ub ON ul.ups_brand = ub.id
            WHERE ub.name = 'ZIRCON'
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

                        
                    </div>
                </div>
                <!-- END OF INVESTMENT -->
                <div class="investment">
                    <img src="../../assets/images/icon-chuphotic.png">
                    <h4>CHUPHOTIC</h4>
                    <div class="date-time">
                        <p>
                            Ups
                        </p>
                        <small class="text-muted">
                           Lampang city 
                        </small>
                    </div>
                    <div class="bonds">
                        
                        <p>Model</p>
                        <small class="text-muted">Standard</small>
                    </div>
                    <div class="amount">
                        <?php
                        include('../../system/database/DB_ups.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM ups_lists ul
            JOIN ups_brands ub ON ul.ups_brand = ub.id
            WHERE ub.name = 'CHUPHOTIC'
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

                        
                    </div>
                </div>
                <!-- END OF INVESTMENT -->
                <div class="investment">
                    <img src="../../assets/images/icon-empow.png">
                    <h4>EMPOW</h4>
                    <div class="date-time">
                        <p>
                            Ups
                        </p>
                        <small class="text-muted">
                           Lampang city 
                        </small>
                    </div>
                    <div class="bonds">
                        <p>Model</p>
                        <small class="text-muted">Standard</small>
                    </div>
                    <div class="amount">
                        <?php
                        include('../../system/database/DB_ups.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM ups_lists ul
            JOIN ups_brands ub ON ul.ups_brand = ub.id
            WHERE ub.name = 'EMPOW'
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

                    </div>
                </div>
                <!-- END OF INVESTMENT -->
                <div class="investment">
                    <img src="../../assets/images/icon-cleanline.png">
                    <h4>CLEANLINE</h4>
                    <div class="date-time">
                        <p>
                            Ups
                        </p>
                        <small class="text-muted">
                            Lampang city 
                        </small>
                    </div>
                    <div class="bonds">
                        <p>Model</p>
                        <small class="text-muted">Standard</small>
                    </div>
                    <div class="amount">
                        <?php
                        include('../../system/database/DB_ups.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM ups_lists ul
            JOIN ups_brands ub ON ul.ups_brand = ub.id
            WHERE ub.name = 'CLEANLINE'
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
                <p>Lampang city</p>
              </div>
            </div>
            <div class="card-details">
              <div class="card bg-danger">
                <img src="../../assets/images/visa.png">
              </div>
              <div class="details">                
              </div>
            </div>

            <?php
            include('../../system/database/DB_computer.php');
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
              <p>
                Lampang city
              </p>
            </div>
          </div>
          <div class="card-details">
            <div class="card bg-primary">
              <img src="../../assets/images/visa.png">
            </div>
            <div class="details">
            </div>
          </div>

          <?php
          include('../../system/database/DB_monitor.php');
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
              <p>
                Lampang city 
              </p>
            </div>
          </div>
          <div class="card-details">
            <div class="card bg-dark">
              <img src="../../assets/images/master_card.png">
            </div>
            <div class="details">
            </div>
          </div>

          <?php
          include('../../system/database/DB_tablet.php');
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
              <p>
                Lampang city 
              </p>
            </div>
          </div>
          <div class="card-details">
            <div class="card bg-danger">
              <img src="../../assets/images/visa.png">
            </div>
            <div class="details">
            </div>
          </div>

          <?php
          include('../../system/database/DB_printer.php');
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
              <p>
                Lampang city 
              </p>
            </div>
          </div>
          <div class="card-details">
            <div class="card bg-primary">
              <img src="../../assets/images/visa.png">
            </div>
            <div class="details">
            </div>
          </div>

          <?php
          include('../../system/database/DB_scanner.php');
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

              
              <p>
                Lampang city 
              </p>
            </div>
          </div>
          <div class="card-details">
            <div class="card bg-primary">
              <img src="../../assets/images/visa.png">
            </div>
            <div class="details">
            </div>
          </div>

          <?php
          include('../../system/database/DB_ups.php');
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